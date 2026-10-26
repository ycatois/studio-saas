<?php
/*
 * Lanternis · construction du site de pré-lancement (public/).
 *
 *   php build.php              construit (ou reconstruit) les fichiers générés
 *   php build.php --check      vérifie que les fichiers générés sont à jour (CI) ; code 1 sinon
 *   php build.php --indexable  retire la balise robots « noindex » des pages copiées
 *                              (à n'utiliser qu'à la mise en ligne validée, validation.md § 12)
 *
 * Fichiers GÉNÉRÉS (ne jamais les éditer à la main) :
 *   public/index.html             <- marketing/landing/validation.html
 *   public/mentions-legales.html  <- marketing/landing/mentions-legales.html
 *   public/confidentialite.html   <- marketing/landing/confidentialite.html
 *   public/assets/pages/*         styles et scripts extraits de ces pages
 *   public/assets/charte/*        tokens.css, logos (et police si présente) de marque/charte/
 *   lib/mentions.generated.php    empreinte des textes d'information des formulaires
 *   mentions/*.txt                archive de ces textes (preuve de ce qui était affiché)
 *
 * Transformations, sans toucher aux textes :
 *   - chemins ../../marque/charte/… réécrits en assets/charte/… et fichiers copiés ;
 *   - liens validation.html réécrits vers la racine du site (./) ;
 *   - blocs <style> et <script> en ligne déplacés dans des fichiers (CSP sans 'unsafe-inline') ;
 *   - attributs style="…" convertis en classes générées (déclarations en !important pour
 *     garder la priorité d'un style en ligne) ;
 *   - index.html : ajout d'un champ caché js=1 par script (le serveur sait alors s'il peut
 *     renvoyer vers la page avec ?inscription=ok, ou vers merci.html / erreur.html sans JS) ;
 *   - @font-face retiré de tokens.css si la police n'a pas encore été déposée (évite une 404).
 * Sortie déterministe (aucune date) : deux constructions successives donnent les mêmes octets.
 */
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    exit(1);
}

const RACINE = __DIR__;
$venture = dirname(__DIR__, 3);                 // ventures/lanternis
$landing = $venture . '/marketing/landing';
$charte = $venture . '/marque/charte';

$verifier = in_array('--check', $argv, true);
$indexable = in_array('--indexable', $argv, true);

$PAGES = [
    // source => [cible, obligatoire]
    'validation.html' => ['index.html', true],
    'mentions-legales.html' => ['mentions-legales.html', false],
    'confidentialite.html' => ['confidentialite.html', false],
];
// Ressources de la charte toujours copiées (utilisées par les pages écrites à la main de public/).
$CHARTE_TOUJOURS = ['tokens.css', 'logo/favicon.svg', 'logo/logo-horizontal-nuit.svg', 'logo/symbole-nuit.svg'];

$sortie = [];        // chemin relatif à RACINE => contenu
$avertissements = [];

function avertir(string $m): void
{
    global $avertissements;
    $avertissements[] = $m;
}

function echapperCss(string $decl): string
{
    $out = [];
    foreach (explode(';', $decl) as $d) {
        $d = trim($d);
        if ($d === '') {
            continue;
        }
        $out[] = str_contains($d, '!important') ? $d : $d . ' !important';
    }
    return implode(';', $out);
}

/** Transforme une page de marketing/landing en page publiable. */
function transformerPage(string $html, string $nom, bool $indexable, array &$ressources, bool $injecterJs): array
{
    $css = [];
    $js = [];

    // 1. Blocs <style> -> assets/pages/<nom>.css
    $premierStyle = true;
    $html = preg_replace_callback('~<style\b[^>]*>(.*?)</style>~si', function ($m) use (&$css, &$premierStyle, $nom) {
        $css[] = trim($m[1]);
        if ($premierStyle) {
            $premierStyle = false;
            return '<link rel="stylesheet" href="assets/pages/' . $nom . '.css">';
        }
        return '';
    }, $html);

    // 2. Scripts en ligne exécutables -> assets/pages/<nom>.js (les blocs de données JSON restent en place)
    $premierScript = true;
    $html = preg_replace_callback('~<script\b([^>]*)>(.*?)</script>~si', function ($m) use (&$js, &$premierScript, $nom) {
        $attrs = $m[1];
        if (preg_match('~\bsrc\s*=~i', $attrs) || (preg_match('~\btype\s*=\s*"([^"]*)"~i', $attrs, $t)
                && !in_array(strtolower($t[1]), ['text/javascript', 'module', 'application/javascript'], true))) {
            return $m[0];
        }
        $js[] = trim($m[2]);
        if ($premierScript) {
            $premierScript = false;
            return '<script src="assets/pages/' . $nom . '.js"></script>';
        }
        return '';
    }, $html);

    // 3. Attributs style="…" -> classes générées
    $regles = [];
    $html = preg_replace_callback('~<([a-zA-Z][a-zA-Z0-9-]*)\b([^<>]*?)\sstyle="([^"]*)"([^<>]*)>~s', function ($m) use (&$regles) {
        $decl = html_entity_decode($m[3], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $classe = 's-' . substr(hash('sha256', $decl), 0, 8);
        $regles[$classe] = '.' . $classe . '{' . echapperCss($decl) . '}';
        $attributs = $m[2] . $m[4];
        if (preg_match('~\sclass="([^"]*)"~', $attributs)) {
            $attributs = preg_replace('~\sclass="([^"]*)"~', ' class="$1 ' . $classe . '"', $attributs, 1);
        } else {
            $fermant = str_ends_with(rtrim($attributs), '/') ? '/' : '';
            $attributs = rtrim(rtrim($attributs), '/') . ' class="' . $classe . '"' . ($fermant ? ' /' : '');
        }
        return '<' . $m[1] . $attributs . '>';
    }, $html);
    if ($regles !== []) {
        ksort($regles);
        $css[] = "/* Styles en ligne de la page source, convertis en classes par build.php */\n" . implode("\n", $regles);
    }

    // 4. Gestionnaires d'événements en ligne : interdits par la CSP, on le signale
    if (preg_match_all('~<[^>]*\son[a-z]+\s*=~i', $html, $x)) {
        avertir("$nom : " . count($x[0]) . " gestionnaire(s) d'événement en ligne (onclick…) bloqué(s) par la CSP");
    }

    // 5. Chemins de la charte et liens vers validation.html
    $html = preg_replace_callback('~(\s(?:href|src)=")\.\./\.\./marque/charte/([^"#?]+)~', function ($m) use (&$ressources) {
        $ressources[$m[2]] = true;
        return $m[1] . 'assets/charte/' . $m[2];
    }, $html);
    $html = preg_replace('~(\shref=")validation\.html(?=["#?])~', '$1./', $html);
    if (str_contains($html, '../../')) {
        avertir("$nom : chemin relatif « ../../ » non réécrit");
    }

    // 6. Indexation (noindex conservé tant que la mise en ligne n'est pas validée)
    if ($indexable) {
        $html = preg_replace('~\s*<meta name="robots" content="noindex[^"]*">~i', '', $html);
    }

    // 7. Champ caché js=1 (index uniquement)
    if ($injecterJs) {
        $js[] = "/* Ajouté par build.php : signale au serveur que le script de la page s'exécute. */\n"
            . "(function () {\n  var f = document.querySelector('form[action=\"waitlist.php\"]');\n"
            . "  if (!f) return;\n  var i = document.createElement('input');\n  i.type = 'hidden'; i.name = 'js'; i.value = '1';\n  f.appendChild(i);\n})();";
        if (!str_contains($html, 'assets/pages/' . $nom . '.js')) {
            $html = str_replace('</body>', '<script src="assets/pages/' . $nom . '.js"></script>' . "\n</body>", $html);
        }
    }

    return [$html, implode("\n\n", $css), implode("\n\n", $js)];
}

function entete(string $source, string $type): string
{
    $texte = 'GÉNÉRÉ par build.php depuis ' . $source . ' : ne pas modifier ce fichier, modifier la source puis relancer php build.php.';
    return $type === 'html' ? "<!-- $texte -->\n" : "/* $texte */\n";
}

/** Texte d'information d'un formulaire (paragraphe .mention-form), normalisé. */
function texteMention(string $html): ?string
{
    if (!preg_match('~<p class="mention-form">(.*?)</p>~s', $html, $m)) {
        return null;
    }
    $t = html_entity_decode(strip_tags($m[1]), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return trim(preg_replace('/\s+/u', ' ', $t));
}

// --- Pages de marketing/landing ---------------------------------------------------------
$ressources = array_fill_keys($CHARTE_TOUJOURS, true);
$mentions = [];
foreach ($PAGES as $source => [$cible, $obligatoire]) {
    $chemin = $landing . '/' . $source;
    if (!is_file($chemin)) {
        if ($obligatoire) {
            fwrite(STDERR, "ERREUR : $chemin introuvable\n");
            exit(2);
        }
        avertir("$source absent de marketing/landing : page non publiée (lien mort dans le pied de page)");
        continue;
    }
    $html = file_get_contents($chemin);
    $nom = pathinfo($cible, PATHINFO_FILENAME);
    if ($source === 'validation.html') {
        $mentions['landing'] = texteMention($html);
    }
    [$page, $css, $js] = transformerPage($html, $nom, $indexable, $ressources, $source === 'validation.html');
    $origine = 'marketing/landing/' . $source;
    // L'en-tête de génération est placé après le doctype (sinon mode quirks).
    $page = preg_replace('~^(<!doctype html>\s*)~i', '$1' . entete($origine, 'html'), $page, 1, $n);
    if ($n === 0) {
        $page = entete($origine, 'html') . $page;
    }
    $sortie['public/' . $cible] = $page;
    if ($css !== '') {
        $sortie['public/assets/pages/' . $nom . '.css'] = entete($origine, 'css') . $css . "\n";
    }
    if ($js !== '') {
        $sortie['public/assets/pages/' . $nom . '.js'] = entete($origine, 'js') . $js . "\n";
    }
}

// --- Ressources de la charte ---------------------------------------------------------------
ksort($ressources);
foreach (array_keys($ressources) as $rel) {
    $src = $charte . '/' . $rel;
    if (!is_file($src) || str_contains($rel, '..')) {
        avertir("ressource de charte introuvable : $rel");
        continue;
    }
    $contenu = file_get_contents($src);
    if ($rel === 'tokens.css') {
        if (is_file($charte . '/fonts/fraunces-latin-600.woff2')) {
            $sortie['public/assets/charte/fonts/fraunces-latin-600.woff2'] = file_get_contents($charte . '/fonts/fraunces-latin-600.woff2');
            if (is_file($charte . '/fonts/OFL.txt')) {
                $sortie['public/assets/charte/fonts/OFL.txt'] = file_get_contents($charte . '/fonts/OFL.txt');
            }
        } else {
            $contenu = preg_replace('~@font-face\s*\{[^}]*\}~', '/* @font-face retiré par build.php : fonts/fraunces-latin-600.woff2 pas encore déposé (repli sur les polices système) */', $contenu, 1);
            avertir('police Fraunces absente de marque/charte/fonts/ : @font-face retiré de la copie de tokens.css');
        }
        $contenu = entete('marque/charte/tokens.css', 'css') . $contenu;
    }
    $sortie['public/assets/charte/' . $rel] = $contenu;
}

// --- Textes d'information des formulaires (preuve du consentement) -------------------------
$autodiag = RACINE . '/public/autodiagnostic.html';
$mentions['autodiag'] = is_file($autodiag) ? texteMention(file_get_contents($autodiag)) : null;
$versions = [];
foreach ($mentions as $formulaire => $texte) {
    if ($texte === null) {
        avertir("texte d'information (.mention-form) introuvable pour le formulaire « $formulaire »");
        continue;
    }
    $id = $formulaire . '-' . substr(hash('sha256', $texte), 0, 12);
    $versions[$formulaire] = $id;
    $sortie['mentions/' . $id . '.txt'] = $texte . "\n";
}
ksort($versions);
$php = "<?php\n// GÉNÉRÉ par build.php : identifiant (empreinte SHA-256) du texte d'information affiché sous chaque formulaire.\n"
    . "// Texte correspondant : mentions/<identifiant>.txt\nreturn " . var_export($versions, true) . ";\n";
$sortie['lib/mentions.generated.php'] = $php;

// --- Écriture ou vérification -----------------------------------------------------------
$dossiersGeneres = ['public/assets/pages', 'public/assets/charte'];
$fichiersGeneres = ['public/index.html', 'public/mentions-legales.html', 'public/confidentialite.html', 'lib/mentions.generated.php'];

function lister(string $dossier): array
{
    if (!is_dir($dossier)) {
        return [];
    }
    $res = [];
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dossier, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $f) {
        $res[] = str_replace('\\', '/', substr($f->getPathname(), strlen(RACINE) + 1));
    }
    sort($res);
    return $res;
}

$existants = [];
foreach ($dossiersGeneres as $d) {
    $existants = array_merge($existants, lister(RACINE . '/' . $d));
}
foreach ($fichiersGeneres as $f) {
    if (is_file(RACINE . '/' . $f)) {
        $existants[] = $f;
    }
}

foreach ($avertissements as $a) {
    fwrite(STDERR, "attention : $a\n");
}

// Textes en fins de ligne LF (le dépôt peut être extrait en CRLF sous Windows : la comparaison les ignore).
$estTexte = static fn(string $rel): bool => preg_match('~\.(html|css|js|php|txt|svg)$~', $rel) === 1;
foreach ($sortie as $rel => $contenu) {
    if ($estTexte($rel)) {
        $sortie[$rel] = str_replace("
", "
", $contenu);
    }
}

if ($verifier) {
    $ecarts = [];
    foreach ($sortie as $rel => $contenu) {
        $f = RACINE . '/' . $rel;
        $actuel = is_file($f) ? file_get_contents($f) : null;
        if ($actuel !== null && $estTexte($rel)) {
            $actuel = str_replace("
", "
", $actuel);
        }
        if ($actuel !== $contenu) {
            $ecarts[] = "à régénérer : $rel";
        }
    }
    foreach ($existants as $rel) {
        if (!isset($sortie[$rel])) {
            $ecarts[] = "obsolète : $rel";
        }
    }
    if ($ecarts !== []) {
        fwrite(STDERR, implode("\n", $ecarts) . "\nLancer : php build.php\n");
        exit(1);
    }
    fwrite(STDOUT, "build à jour (" . count($sortie) . " fichiers générés)\n");
    exit(0);
}

foreach ($existants as $rel) {
    if (!isset($sortie[$rel])) {
        unlink(RACINE . '/' . $rel);
    }
}
ksort($sortie);
foreach ($sortie as $rel => $contenu) {
    $f = RACINE . '/' . $rel;
    if (!is_dir(dirname($f))) {
        mkdir(dirname($f), 0755, true);
    }
    file_put_contents($f, $contenu);
    fwrite(STDOUT, "écrit : $rel (" . strlen($contenu) . " octets)\n");
}
fwrite(STDOUT, "build terminé : " . count($sortie) . " fichiers\n");
