<?php
/*
 * Lanternis · test de bout en bout : serveur intégré de PHP sur public/, MAIL_MODE=log.
 *   php tests/smoke.php
 * Crée une configuration et une base temporaires (hors du dépôt), lance `php -S`, envoie de vraies
 * requêtes HTTP (inscription, confirmation, désinscription, contrôles d'en-têtes), puis les
 * scripts de bin/. Code de sortie 0 si tout passe.
 */
declare(strict_types=1);

$racine = dirname(__DIR__);
$tmp = sys_get_temp_dir() . '/lanternis-smoke-' . bin2hex(random_bytes(4));
mkdir($tmp, 0700, true);
$port = 18000 + random_int(0, 999);
$base = "http://127.0.0.1:$port";
$config = $tmp . '/config.php';
file_put_contents($config, '<?php return ' . var_export([
    'BASE_URL' => $base,
    'DB_PATH' => $tmp . '/data/liste-attente.sqlite',
    'MAIL_MODE' => 'log',
    'MAIL_LOG_PATH' => $tmp . '/emails.log',
    'MAIL_FROM_EMAIL' => 'bonjour@lanternis.test',
    'IP_SALT' => bin2hex(random_bytes(32)),
    'NOTIFY_TO' => '',
], true) . ';');

$env = array_merge(getenv(), ['LANTERNIS_CONFIG' => $config, 'MAIL_MODE' => 'log']);
$serveur = proc_open([PHP_BINARY, '-S', "127.0.0.1:$port", '-t', $racine . '/public'], [
    0 => ['pipe', 'r'], 1 => ['file', $tmp . '/serveur.log', 'a'], 2 => ['file', $tmp . '/serveur.log', 'a'],
], $pipes, $racine, $env);

$echecs = 0;
$n = 0;
function ok(bool $c, string $m): void
{
    global $echecs, $n;
    $n++;
    if (!$c) {
        $echecs++;
    }
    fwrite(STDOUT, ($c ? 'ok    ' : 'ÉCHEC ') . $m . "\n");
}

/** @return array{0:int,1:array<string,string>,2:string} */
function http(string $methode, string $url, array $donnees = [], array $entetes = []): array
{
    $ctx = stream_context_create(['http' => [
        'method' => $methode,
        'header' => implode("\r\n", array_merge(['Content-Type: application/x-www-form-urlencoded'], $entetes)),
        'content' => $donnees ? http_build_query($donnees) : '',
        'follow_location' => 0,
        'ignore_errors' => true,
        'timeout' => 5,
    ]]);
    $corps = @file_get_contents($url, false, $ctx);
    $statut = 0;
    $h = [];
    foreach ($http_response_header ?? [] as $ligne) {
        if (preg_match('~^HTTP/\S+ (\d{3})~', $ligne, $m)) {
            $statut = (int) $m[1];
        } elseif (str_contains($ligne, ':')) {
            [$k, $v] = explode(':', $ligne, 2);
            $h[strtolower(trim($k))] = trim($v);
        }
    }
    return [$statut, $h, (string) $corps];
}

function emails(string $tmp): array
{
    $f = $tmp . '/emails.log';
    return is_file($f) ? array_map(fn($l) => json_decode($l, true), array_filter(explode("\n", file_get_contents($f)))) : [];
}

// Attente du démarrage du serveur
for ($i = 0; $i < 50; $i++) {
    if (@fsockopen('127.0.0.1', $port)) {
        break;
    }
    usleep(100000);
}

try {
    [$s, $h, $c] = http('GET', "$base/");
    ok($s === 200 && str_contains($c, 'action="waitlist.php"'), "GET / : landing servie ($s)");
    ok(str_contains($c, 'assets/pages/index.js') && !str_contains($c, '<style'), 'landing sans style ni script en ligne');
    // Simulateur de prix (grille D) : balisage dans la page, code dans un fichier JS externe (CSP sans unsafe-inline).
    preg_match_all('~<script\b([^>]*)>(.*?)</script>~si', $c, $scripts, PREG_SET_ORDER);
    $enLigne = array_filter($scripts, static fn($m) => !str_contains($m[1], 'src=') && trim($m[2]) !== '');
    ok($enLigne === [] && !preg_match('~\son[a-z]+\s*=~i', $c) && !str_contains($c, ' style="'), 'landing : aucun script, gestionnaire ou style en ligne');
    [$s, $h, $js] = http('GET', "$base/assets/pages/index.js");
    ok($s === 200 && str_contains($h['content-type'] ?? '', 'javascript') && str_contains($js, 'getElementById("simulateur")')
        && str_contains($c, 'id="simulateur"'), "simulateur servi en fichier JS externe ($s, " . ($h['content-type'] ?? '?') . ')');
    foreach (['autodiagnostic.html', 'merci.html', 'confirme.html', 'desinscrit.html', 'erreur.html', 'mentions-legales.html',
                 'confidentialite.html', 'assets/charte/tokens.css', 'assets/site.css', 'assets/autodiagnostic.js',
                 'assets/pages/index.css', 'assets/charte/logo/logo-horizontal-nuit.svg'] as $p) {
        [$s] = http('GET', "$base/$p");
        ok($s === 200, "GET /$p ($s)");
    }

    $form = ['email' => 'Test@Exemple-Asso.org', 'structure' => 'Association Exemple', 'type' => 'ess', 'effectif' => '20-49',
        'douleur' => 'rendre-compte', 'nouvelles' => 'oui', 'palier' => 'pilotage', 'essai' => 'oui', 'variante' => 'ess', 'public' => 'ess', 'source' => 'ess-relais',
        'site_web' => '', 'js' => '1'];

    [$s, $h] = http('POST', "$base/waitlist.php", $form);
    ok($s === 403, "POST sans Origin refusé ($s)");
    [$s, $h] = http('POST', "$base/waitlist.php", $form, ['Origin: https://ailleurs.example']);
    ok($s === 403, "POST d'une autre origine refusé ($s)");

    [$s, $h] = http('POST', "$base/waitlist.php", $form, ["Origin: $base"]);
    ok($s === 303 && ($h['location'] ?? '') === "$base/?public=ess&src=ess-relais&inscription=ok#liste-attente", "inscription : 303 vers " . ($h['location'] ?? '?'));
    ok(!isset($h['set-cookie']), 'aucun cookie déposé');
    ok(str_contains($h['content-security-policy'] ?? '', "script-src 'self'") && ($h['x-content-type-options'] ?? '') === 'nosniff', 'en-têtes de sécurité sur la réponse PHP');
    ok(!isset($h['x-powered-by']), 'X-Powered-By masqué');

    $mails = emails($tmp);
    ok(count($mails) === 1 && $mails[0]['a'] === 'test@exemple-asso.org', 'email de confirmation écrit dans le journal (MAIL_MODE=log)');
    preg_match('~confirm\.php\?jeton=([a-f0-9]{64})~', $mails[0]['texte'] ?? '', $m);
    $jeton = $m[1] ?? '';
    ok($jeton !== '', 'lien de confirmation présent');

    [$s, , $c] = http('GET', "$base/confirm.php?jeton=$jeton");
    ok($s === 200 && str_contains($c, 'method="post"'), "GET confirm.php : bouton de confirmation ($s)");
    [$s, $h] = http('POST', "$base/confirm.php", ['jeton' => $jeton], ["Origin: $base"]);
    ok($s === 303 && ($h['location'] ?? '') === "$base/confirme.html", "POST confirm.php : 303 vers confirme.html ($s)");
    $mails = emails($tmp);
    ok(count($mails) === 2 && $mails[1]['sujet'] === 'Votre place est réservée. Une question pour vous', 'email de bienvenue');
    [$s] = http('POST', "$base/confirm.php", ['jeton' => $jeton]);
    ok($s === 404, "jeton déjà utilisé : 404 ($s)");

    // Doublon : même réponse, pas d'email
    [$s, $h] = http('POST', "$base/waitlist.php", $form, ["Origin: $base"]);
    ok($s === 303 && str_contains($h['location'] ?? '', 'inscription=ok') && count(emails($tmp)) === 2, 'doublon : même réponse, aucun email');

    // Piège
    [$s, $h] = http('POST', "$base/waitlist.php", ['site_web' => 'x', 'email' => 'robot@spam.example', 'js' => '1'] + $form, ["Origin: $base"]);
    ok($s === 303 && str_contains($h['location'] ?? '', 'inscription=ok') && count(emails($tmp)) === 2, 'piège : succès apparent, aucun email');

    // Erreur de validation sans JS
    [$s, $h] = http('POST', "$base/waitlist.php", ['email' => 'faux', 'js' => ''] + $form, ["Origin: $base"]);
    ok(($h['location'] ?? '') === "$base/erreur.html?code=email", 'erreur email sans JS : erreur.html?code=email');

    // Limitation de débit (5 envois par heure : 1 inscription + doublon + piège + erreur = 4 ; le 5e passe, le 6e non)
    [, $h5] = http('POST', "$base/waitlist.php", ['email' => 'cinq@exemple.fr'] + $form, ["Origin: $base"]);
    [, $h6] = http('POST', "$base/waitlist.php", ['email' => 'six@exemple.fr'] + $form, ["Origin: $base"]);
    ok(str_contains($h5['location'] ?? '', 'inscription=ok') && str_contains($h6['location'] ?? '', 'erreur=technique'), 'limitation : 6e envoi de l\'heure refusé');

    // Scripts d'administration (CLI)
    $cli = static function (string $script) use ($racine, $env): string {
        $p = proc_open([PHP_BINARY, $racine . '/bin/' . $script], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $tubes, $racine, $env);
        $out = stream_get_contents($tubes[1]) . stream_get_contents($tubes[2]);
        proc_close($p);
        return $out;
    };
    $stats = $cli('stats.php');
    ok(str_contains($stats, 'Confirmées : 1') && str_contains($stats, 'Qualifiées (confirmées) : 1'), 'bin/stats.php');
    ok(str_contains($stats, "Intention d'essai (confirmées) : 1 sur 1 (100 %)") && preg_match('~^pilotage\s+1\s+100 %\s+1$~m', $stats) === 1,
        'bin/stats.php : palier et intention d\'essai');
    $csv = $cli('export.php');
    ok(str_contains($csv, 'test@exemple-asso.org') && !str_contains($csv, 'jeton') && !str_contains($csv, '127.0.0.1'), 'bin/export.php sans jeton ni IP');
    ok(str_contains($csv, ';palier;essai;') && str_contains($csv, ';pilotage;1;'), 'bin/export.php : colonnes palier et essai');
    ok(str_starts_with($cli('purge.php'), 'purge :'), 'bin/purge.php');
    [$s, , $c] = http('GET', "$base/../bin/export.php");
    ok($s !== 200 || !str_contains($c, '@'), 'bin/ inaccessible depuis le web');

    // Désinscription
    preg_match('~desinscription\.php\?jeton=([a-f0-9]{64})~', emails($tmp)[1]['texte'] ?? '', $m);
    [$s, , $c] = http('GET', "$base/desinscription.php?jeton={$m[1]}");
    ok($s === 200 && str_contains($c, 'Me désinscrire'), "GET desinscription.php : bouton ($s)");
    [$s, $h] = http('POST', "$base/desinscription.php", ['jeton' => $m[1]]);
    ok($s === 303 && ($h['location'] ?? '') === "$base/desinscrit.html", "POST desinscription.php : 303 vers desinscrit.html ($s)");
    ok(!str_contains($cli('export.php'), 'test@exemple-asso.org'), 'inscription supprimée de la base');
} finally {
    proc_terminate($serveur);
    proc_close($serveur);
    // Nettoyage du dossier temporaire (base, journal d'emails : données de test)
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tmp, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($it as $f) {
        $f->isDir() ? rmdir($f->getPathname()) : unlink($f->getPathname());
    }
    rmdir($tmp);
}

fwrite(STDOUT, sprintf("\n%d vérifications, %d échec(s)\n", $n, $echecs));
exit($echecs === 0 ? 0 : 1);
