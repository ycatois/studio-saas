<?php
/*
 * Lanternis · tests du back-end de liste d'attente (sans PHPUnit, sans dépendance).
 *   php tests/run.php
 * Code de sortie 0 si tout passe, 1 sinon. Base SQLite en mémoire, horloge simulée,
 * emails capturés en mémoire (aucun envoi, aucun réseau).
 */
declare(strict_types=1);

require dirname(__DIR__) . '/lib/bootstrap.php';

use Lanternis\Prelancement as L;

ini_set('display_errors', '1');
error_reporting(E_ALL);
// Les erreurs journalisées volontairement (échec d'envoi simulé) ne polluent pas la sortie.
ini_set('error_log', sys_get_temp_dir() . '/lanternis-tests-error.log');

final class MailerMemoire implements L\Mailer
{
    /** @var L\Email[] */
    public array $envoyes = [];
    public bool $enPanne = false;

    public function envoyer(L\Email $email): void
    {
        if ($this->enPanne) {
            throw new RuntimeException('panne simulée');
        }
        $this->envoyes[] = $email;
    }
}

$tests = [];
$echecs = 0;
$assertions = 0;

function test(string $nom, callable $f): void
{
    global $tests;
    $tests[$nom] = $f;
}

function verifier(bool $condition, string $message): void
{
    global $assertions;
    $assertions++;
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function egal(mixed $attendu, mixed $obtenu, string $message): void
{
    verifier($attendu === $obtenu, $message . ' (attendu ' . var_export($attendu, true) . ', obtenu ' . var_export($obtenu, true) . ')');
}

const BASE = 'https://lanternis.test';
const T0 = 1793000000; // date fixe (UTC) pour des tests reproductibles

/** Application de test : base en mémoire, horloge réglable, emails en mémoire. */
function app(array $config = []): array
{
    $horloge = new stdClass();
    $horloge->t = T0;
    $mailer = new MailerMemoire();
    $cfg = L\Config::valider($config + [
        'BASE_URL' => BASE,
        'DB_PATH' => ':memory:',
        'MAIL_MODE' => 'log',
        'MAIL_LOG_PATH' => '/dev/null',
        'MAIL_FROM_EMAIL' => 'bonjour@lanternis.test',
        'IP_SALT' => str_repeat('s', 40),
        'VERSION_MENTION' => '',
    ]);
    $app = new L\App($cfg, L\Base::ouvrir(':memory:'), $mailer, static fn(): int => $horloge->t);
    return [$app, $mailer, $horloge];
}

function serveur(array $plus = []): array
{
    return $plus + ['REQUEST_METHOD' => 'POST', 'REMOTE_ADDR' => '203.0.113.7', 'HTTP_ORIGIN' => BASE];
}

function formulaire(array $plus = []): array
{
    return $plus + [
        'email' => 'Direction@Exemple-PME.fr',
        'structure' => 'Exemple PME',
        'type' => 'entreprise',
        'effectif' => '50-99',
        'douleur' => 'couts',
        'variante' => 'a',
        'public' => 'pme',
        'source' => 'direct',
        'site_web' => '',
        'js' => '1',
    ];
}

function envoyer(L\App $app, array $post = [], array $server = []): L\Reponse
{
    return L\ListeAttente::traiter($app, serveur($server), formulaire($post));
}

function lignes(L\App $app): array
{
    return $app->db->query('SELECT * FROM inscriptions ORDER BY id')->fetchAll();
}

/** Extrait le jeton d'un lien « page.php?jeton=… » dans le texte d'un email. */
function jetonDe(L\Email $e, string $page): string
{
    verifier(preg_match('~/' . preg_quote($page, '~') . '\?jeton=([a-f0-9]{64})~', $e->texte, $m) === 1, "lien $page absent de l'email");
    return $m[1];
}

function confirmer(L\App $app, string $jeton): L\Reponse
{
    return L\Confirmation::traiter($app, ['REQUEST_METHOD' => 'POST'], [], ['jeton' => $jeton]);
}

// ---------------------------------------------------------------------------------------
// Validation et nettoyage
// ---------------------------------------------------------------------------------------
test('validation : formulaire valide normalisé', function () {
    $r = L\Formulaire::valider(formulaire(['email' => '  Direction @Exemple-PME.FR ', 'structure' => "  <b>Exemple</b>\t PME \x07 ", 'douleur_autre' => 'ignoré']));
    verifier($r['ok'], 'formulaire refusé');
    $d = $r['donnees'];
    egal('direction@exemple-pme.fr', $d['email'], 'email normalisé');
    egal('Exemple PME', $d['structure'], 'structure nettoyée');
    egal(null, $d['douleur_autre'], 'douleur_autre ignoré si douleur ≠ autre');
    egal(0, $d['email_generique'], 'domaine professionnel');
    egal(false, $d['nouvelles'], 'case nouvelles décochée par défaut');
});

test('validation : messageries grand public acceptées et marquées', function () {
    foreach (['a@gmail.com', 'b@orange.fr', 'c@hotmail.fr', 'd@outlook.com', 'e@yahoo.fr', 'f@laposte.net'] as $email) {
        $r = L\Formulaire::valider(formulaire(['email' => $email]));
        verifier($r['ok'], "$email refusé");
        egal(1, $r['donnees']['email_generique'], "$email marqué générique");
    }
});

test('validation : codes d\'erreur email et champs', function () {
    $cas = [
        [['email' => ''], 'champs'],
        [['email' => 'pas-un-email'], 'email'],
        [['email' => 'a@b'], 'email'],
        [['email' => str_repeat('a', 250) . '@x.fr'], 'email'],
        [['structure' => 'A'], 'champs'],
        [['structure' => str_repeat('é', 121)], 'champs'],
        [['structure' => '<p></p>'], 'champs'],
        [['type' => 'particulier'], 'champs'],
        [['effectif' => '10'], 'champs'],
        [['douleur' => 'autre-chose'], 'champs'],
        [['douleur' => 'autre', 'douleur_autre' => str_repeat('x', 201)], 'champs'],
        [['nouvelles' => 'yes'], 'champs'],
        [['email' => ['tableau@exemple.fr']], 'champs'],
        [['structure' => "Exemple \xC3\x28 invalide"], 'champs'],
    ];
    foreach ($cas as $i => [$plus, $code]) {
        $r = L\Formulaire::valider(formulaire($plus));
        verifier(!$r['ok'], "cas $i accepté à tort");
        egal($code, $r['code'], "code du cas $i");
    }
});

test('validation : 120 caractères accentués acceptés, douleur_autre nettoyé', function () {
    $r = L\Formulaire::valider(formulaire(['structure' => str_repeat('é', 120), 'douleur' => 'autre', 'douleur_autre' => '<script>x</script> Notre  référent ']));
    verifier($r['ok'], '120 caractères refusés');
    egal('x Notre référent', $r['donnees']['douleur_autre'], 'balises retirées');
});

test('validation : champs techniques ramenés à la liste blanche', function () {
    $d = L\Formulaire::valider(formulaire(['variante' => 'z', 'public' => 'x', 'source' => 'Facebook']))['donnees'];
    egal('a', $d['variante'], 'variante');
    egal('pme', $d['public'], 'public');
    egal('facebook', $d['source'], 'source en minuscules');
    egal('autre', L\Formulaire::valider(formulaire(['source' => 'inconnue']))['donnees']['source'], 'source hors liste');
    egal('autre', L\Formulaire::valider(formulaire(['source' => '<x>']))['donnees']['source'], 'source invalide');
    egal('direct', L\Formulaire::valider(formulaire(['source' => '']))['donnees']['source'], 'source vide');
});

test('validation : résultat d\'autodiagnostic cohérent exigé', function () {
    $ok = L\Formulaire::valider(formulaire(['joindre_resultat' => 'oui', 'score' => '12', 'profil' => 'penombre', 'reponses' => '0123012300']));
    verifier($ok['ok'], 'résultat cohérent refusé');
    egal(12, $ok['donnees']['score'], 'score');
    foreach ([['score' => '13'], ['profil' => 'bien-eclaire'], ['reponses' => '01230123004'], ['reponses' => '0123412300']] as $i => $faux) {
        $r = L\Formulaire::valider(formulaire($faux + ['joindre_resultat' => 'oui', 'score' => '12', 'profil' => 'penombre', 'reponses' => '0123012300']));
        verifier(!$r['ok'], "résultat incohérent $i accepté");
    }
    $sans = L\Formulaire::valider(formulaire(['score' => '30', 'profil' => 'bien-eclaire', 'reponses' => '3333333333']));
    egal(null, $sans['donnees']['reponses'], 'résultat ignoré sans la case « Joindre »');
});

test('autodiagnostic : profils, axes et priorité en cas d\'égalité', function () {
    egal('boite-noire', L\Autodiag::profil(9), 'seuil 9');
    egal('penombre', L\Autodiag::profil(10), 'seuil 10');
    egal('carte-a-completer', L\Autodiag::profil(18), 'seuil 18');
    egal('bien-eclaire', L\Autodiag::profil(25), 'seuil 25');
    egal('continuite', L\Autodiag::axePrioritaire('0000000000'), 'égalité : continuité d\'abord');
    egal('echeance', L\Autodiag::axePrioritaire('3303333333'), 'question 3 faible : échéance');
    egal(L\Autodiag::ACTION_BIEN_ECLAIRE, L\Autodiag::premiereAction('3333333333'), 'bien éclairé sans axe sous 70 %');
    egal(L\Autodiag::ACTIONS_AXES['payez'], L\Autodiag::premiereAction('3133333033'), 'bien éclairé avec un axe sous 70 %');
});

// ---------------------------------------------------------------------------------------
// Contrôle d'origine, méthode, champ piège, limitation de débit
// ---------------------------------------------------------------------------------------
test('origine : requêtes d\'un autre site refusées', function () {
    [$app] = app();
    egal(403, envoyer($app, [], ['HTTP_ORIGIN' => 'https://attaquant.example'])->statut, 'Origin étrangère');
    egal(403, envoyer($app, [], ['HTTP_ORIGIN' => 'null'])->statut, 'Origin null');
    egal(403, L\ListeAttente::traiter($app, ['REQUEST_METHOD' => 'POST', 'REMOTE_ADDR' => '1.2.3.4'], formulaire())->statut, 'sans Origin ni Referer');
    egal(403, envoyer($app, [], ['HTTP_SEC_FETCH_SITE' => 'cross-site'])->statut, 'Sec-Fetch-Site cross-site');
    $parReferer = L\ListeAttente::traiter($app, ['REQUEST_METHOD' => 'POST', 'REMOTE_ADDR' => '1.2.3.4', 'HTTP_REFERER' => BASE . '/?v=b'], formulaire());
    egal(303, $parReferer->statut, 'Referer du site accepté');
    egal(405, L\ListeAttente::traiter($app, ['REQUEST_METHOD' => 'GET'], [])->statut, 'GET refusé');
    egal(1, count(lignes($app)), 'seule la requête légitime est enregistrée');
});

test('piège : réponse de succès, rien d\'enregistré ni d\'envoyé', function () {
    [$app, $mailer] = app();
    $r = envoyer($app, ['site_web' => 'http://spam.example']);
    $normal = envoyer(app()[0]);
    egal(303, $r->statut, 'redirection');
    egal($normal->entetes['Location'], $r->entetes['Location'], 'même réponse qu\'une vraie inscription');
    egal(0, count(lignes($app)), 'aucune ligne');
    egal(0, count($mailer->envoyes), 'aucun email');
});

test('débit : 5 envois par heure et par IP, IP jamais en clair', function () {
    [$app, , $h] = app();
    for ($i = 0; $i < 5; $i++) {
        $r = envoyer($app, ['email' => "p$i@exemple-pme.fr"]);
        verifier(str_contains($r->entetes['Location'], 'inscription=ok'), "envoi $i refusé");
    }
    $r = envoyer($app, ['email' => 'p6@exemple-pme.fr']);
    verifier(str_contains($r->entetes['Location'], 'erreur=technique'), '6e envoi accepté');
    $autre = envoyer($app, ['email' => 'p7@exemple-pme.fr'], ['REMOTE_ADDR' => '198.51.100.9']);
    verifier(str_contains($autre->entetes['Location'], 'inscription=ok'), 'autre IP bloquée');
    $h->t += 3601;
    verifier(str_contains(envoyer($app, ['email' => 'p8@exemple-pme.fr'])->entetes['Location'], 'inscription=ok'), 'IP toujours bloquée après 1 h');
    $dump = json_encode($app->db->query('SELECT * FROM limites')->fetchAll()) . json_encode(lignes($app));
    verifier(!str_contains($dump, '203.0.113') && !str_contains($dump, '198.51.100'), 'IP en clair dans la base');
    $ipv6a = L\Http::ipPourLimite(['REMOTE_ADDR' => '2001:db8:1:2::1']);
    egal($ipv6a, L\Http::ipPourLimite(['REMOTE_ADDR' => '2001:db8:1:2:ffff::9']), 'IPv6 regroupée par /64');
});

// ---------------------------------------------------------------------------------------
// Double opt-in
// ---------------------------------------------------------------------------------------
test('double opt-in : inscription en attente puis confirmation', function () {
    [$app, $mailer] = app();
    $r = envoyer($app, ['nouvelles' => 'oui', 'variante' => 'b', 'source' => 'blog']);
    egal(BASE . '/?v=b&src=blog&inscription=ok#liste-attente', $r->entetes['Location'], 'redirection 303 vers la landing');
    $l = lignes($app)[0];
    egal('en_attente', $l['statut'], 'statut initial');
    egal(0, (int) $l['qualifie'], 'non qualifié avant confirmation');
    egal(1, (int) $l['nouvelles'], 'consentement nouvelles');
    verifier($l['nouvelles_le'] !== null && $l['nouvelles_version'] !== '', 'horodatage et version du consentement');
    verifier(str_starts_with($l['version_mention'], 'landing-'), 'version_mention générée par le build');
    egal(1, count($mailer->envoyes), 'un email de confirmation');
    $email = $mailer->envoyes[0];
    egal('direction@exemple-pme.fr', $email->a, 'destinataire');
    egal('Confirmez votre inscription à la liste d\'attente Lanternis', $email->sujet, 'objet (validation.md § 9)');
    $jeton = jetonDe($email, 'confirm.php');
    verifier(!str_contains(json_encode(lignes($app)), $jeton), 'jeton de confirmation stocké en clair');
    egal(hash('sha256', $jeton), $l['jeton_confirmation'], 'jeton stocké haché');
    verifier(isset($email->entetes['List-Unsubscribe'], $email->entetes['List-Unsubscribe-Post']), 'en-têtes de désinscription');
    verifier(str_contains($email->texte, 'desinscription.php?jeton=' . $l['jeton_desinscription']), 'lien de désinscription dans l\'email');

    $page = L\Confirmation::traiter($app, ['REQUEST_METHOD' => 'GET'], ['jeton' => $jeton], []);
    egal(200, $page->statut, 'GET affiche un bouton');
    egal('en_attente', lignes($app)[0]['statut'], 'GET ne confirme pas');

    $c = confirmer($app, $jeton);
    egal(BASE . '/confirme.html', $c->entetes['Location'], 'redirection après confirmation');
    $l = lignes($app)[0];
    egal('confirme', $l['statut'], 'statut confirmé');
    egal(1, (int) $l['qualifie'], 'entreprise 50-99 qualifiée');
    egal(null, $l['jeton_confirmation'], 'jeton consommé');
    egal(2, count($mailer->envoyes), 'email de bienvenue');
    egal('Votre place est réservée. Une question pour vous', $mailer->envoyes[1]->sujet, 'objet bienvenue');
    verifier(str_contains($mailer->envoyes[1]->texte, '/autodiagnostic.html?src=confirmation'), 'lien autodiagnostic');
    egal(404, confirmer($app, $jeton)->statut, 'jeton à usage unique');
    egal(2, count($mailer->envoyes), 'pas de second email de bienvenue');
});

test('double opt-in : qualification, cœur de cible entreprises et ESS de 20 à 249', function () {
    $cas = [['entreprise', '20-49', 1], ['entreprise', '50-99', 1], ['entreprise', '100-249', 1], ['ess', '20-49', 1],
        ['ess', '100-249', 1], ['entreprise', 'moins-20', 0], ['ess', 'moins-20', 0], ['entreprise', '250-plus', 0], ['ess', '250-plus', 0]];
    foreach ($cas as [$type, $eff, $attendu]) {
        [$app, $mailer] = app();
        envoyer($app, ['type' => $type, 'effectif' => $eff]);
        confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'));
        egal($attendu, (int) lignes($app)[0]['qualifie'], "qualifié $type $eff");
    }
});

test('double opt-in : jeton expiré après 7 jours, jeton mal formé', function () {
    [$app, $mailer, $h] = app();
    envoyer($app);
    $jeton = jetonDe($mailer->envoyes[0], 'confirm.php');
    $h->t += 7 * 86400 + 1;
    egal(404, confirmer($app, $jeton)->statut, 'jeton expiré');
    egal(404, confirmer($app, 'abc')->statut, 'jeton mal formé');
    egal(404, confirmer($app, str_repeat('0', 64))->statut, 'jeton inconnu');
    egal('en_attente', lignes($app)[0]['statut'], 'toujours en attente');
});

test('doublon : rien n\'est révélé, renvoi au plus une fois par 24 h, aucun retrait', function () {
    [$app, $mailer, $h] = app();
    $r1 = envoyer($app, ['nouvelles' => 'oui']);
    $r2 = envoyer($app, ['structure' => 'Autre nom']);
    egal($r1->entetes['Location'], $r2->entetes['Location'], 'même réponse');
    egal(1, count(lignes($app)), 'pas de doublon');
    egal(1, count($mailer->envoyes), 'pas de renvoi avant 24 h');
    egal('Exemple PME', lignes($app)[0]['structure'], 'champs obligatoires non modifiés');
    egal(1, (int) lignes($app)[0]['nouvelles'], 'consentement non retiré');
    $h->t += 86400;
    envoyer($app, ['echange' => 'oui']);
    egal(2, count($mailer->envoyes), 'renvoi après 24 h');
    egal(1, (int) lignes($app)[0]['echange'], 'ajout de consentement possible');
    egal(404, confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'))->statut, 'ancien lien remplacé');
    egal(303, confirmer($app, jetonDe($mailer->envoyes[1], 'confirm.php'))->statut, 'nouveau lien valide');
});

test('doublon confirmé : un ajout de consentement attend une nouvelle confirmation', function () {
    [$app, $mailer, $h] = app();
    envoyer($app);
    confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'));
    $h->t += 60;
    envoyer($app); // rien de nouveau : aucun email
    egal(2, count($mailer->envoyes), 'aucun email sans ajout');
    $h->t += 86400;
    envoyer($app, ['nouvelles' => 'oui']);
    egal(0, (int) lignes($app)[0]['nouvelles'], 'consentement non appliqué sans confirmation');
    egal(3, count($mailer->envoyes), 'lien de confirmation envoyé');
    confirmer($app, jetonDe($mailer->envoyes[2], 'confirm.php'));
    $l = lignes($app)[0];
    egal(1, (int) $l['nouvelles'], 'consentement appliqué après confirmation');
    egal(null, $l['ajouts_en_attente'], 'ajouts vidés');
    egal(3, count($mailer->envoyes), 'pas de second email de bienvenue');
});

test('emails : échappement, structure ressemblant à un lien omise, pied de page', function () {
    [$app, $mailer] = app();
    envoyer($app, ['structure' => 'Café & Fils "SARL"']);
    $e = $mailer->envoyes[0];
    verifier(str_contains($e->html, 'Café &amp; Fils &quot;SARL&quot;'), 'structure échappée en HTML');
    verifier(str_contains($e->texte, 'Lanternis est une marque d\'Hasteria SASU, SASU au capital de 300 €'), 'pied de page § 4.3');
    verifier(str_contains($e->texte, 'Me désinscrire en un clic'), 'lien de désinscription');
    [$app2, $mailer2] = app();
    envoyer($app2, ['email' => 'x@exemple.fr', 'structure' => 'Gagnez sur www.arnaque.example']);
    verifier(!str_contains($mailer2->envoyes[0]->texte, 'arnaque'), 'structure-lien omise');
    verifier(str_contains($mailer2->envoyes[0]->texte, 'liste d\'attente de Lanternis. Pour confirmer'), 'phrase sans la structure');
});

test('redirections : sans JavaScript et depuis l\'autodiagnostic', function () {
    [$app] = app();
    egal(BASE . '/merci.html', envoyer($app, ['js' => ''])->entetes['Location'], 'succès sans JS');
    egal(BASE . '/erreur.html?code=email', envoyer($app, ['js' => '', 'email' => 'x'])->entetes['Location'], 'erreur sans JS');
    egal(BASE . '/?public=ess&erreur=champs#liste-attente', envoyer($app, ['public' => 'ess', 'type' => ''])->entetes['Location'], 'erreur avec JS');
    egal(BASE . '/erreur.html?code=champs&retour=autodiag', envoyer($app, ['retour' => 'autodiag', 'effectif' => ''])->entetes['Location'], 'erreur autodiag');
});

test('panne d\'envoi : erreur technique, renvoi possible ensuite', function () {
    [$app, $mailer] = app();
    $mailer->enPanne = true;
    verifier(str_contains(envoyer($app)->entetes['Location'], 'erreur=technique'), 'erreur technique');
    egal(null, lignes($app)[0]['dernier_envoi_confirmation_le'], 'envoi non marqué');
    $mailer->enPanne = false;
    verifier(str_contains(envoyer($app)->entetes['Location'], 'inscription=ok'), 'nouvel essai réussi');
    egal(1, count($mailer->envoyes), 'email envoyé au second essai');
});

test('plafond global d\'emails par heure', function () {
    [$app, $mailer] = app(['LIMITE_EMAILS_HEURE' => 2]);
    envoyer($app, ['email' => 'a@exemple.fr'], ['REMOTE_ADDR' => '10.0.0.1']);
    envoyer($app, ['email' => 'b@exemple.fr'], ['REMOTE_ADDR' => '10.0.0.2']);
    $r = envoyer($app, ['email' => 'c@exemple.fr'], ['REMOTE_ADDR' => '10.0.0.3']);
    verifier(str_contains($r->entetes['Location'], 'erreur=technique'), '3e email refusé');
    egal(2, count($mailer->envoyes), 'deux emails seulement');
});

test('demande d\'échange depuis l\'autodiagnostic : email dédié et notification minimale', function () {
    [$app, $mailer] = app(['NOTIFY_TO' => 'fondateur@hasteria.test']);
    $r = envoyer($app, ['retour' => 'autodiag', 'echange' => 'oui', 'source' => 'autodiag', 'douleur' => 'depart-referent', 'js' => '',
        'joindre_resultat' => 'oui', 'score' => '5', 'profil' => 'boite-noire', 'reponses' => '1100110010']);
    egal(BASE . '/merci.html', $r->entetes['Location'], 'redirection merci.html');
    $l = lignes($app)[0];
    egal('autodiag', $l['echange_origine'], 'origine de l\'échange');
    verifier(str_starts_with($l['version_mention'], 'autodiag-'), 'version de la clause du formulaire d\'échange');
    confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'));
    egal(3, count($mailer->envoyes), 'confirmation, échange, notification');
    $echange = $mailer->envoyes[1];
    egal('Votre échange de 30 minutes : nous revenons vers vous sous 2 jours ouvrés', $echange->sujet, 'objet (autodiagnostic.md § 6)');
    verifier(str_contains($echange->texte, 'Informatique en boîte noire, 5 sur 30'), 'résultat rappelé');
    $notif = $mailer->envoyes[2];
    egal('fondateur@hasteria.test', $notif->a, 'notification interne');
    verifier(!str_contains($notif->texte, 'depart-referent') && !str_contains($notif->texte, '1100110010'), 'ni douleur ni réponses envoyées à Mailjet');
});

test('grille D : palier et intention d\'essai validés et enregistrés', function () {
    foreach (L\Formulaire::PALIERS as $p) {
        egal($p, L\Formulaire::valider(formulaire(['palier' => $p]))['donnees']['palier'], "palier $p");
    }
    foreach ([null, '', 'premium', 'Pilotage', ['pilotage']] as $i => $faux) {
        $r = L\Formulaire::valider(formulaire($faux === null ? [] : ['palier' => $faux]));
        verifier($r['ok'], "palier invalide $i : le formulaire ne doit pas être rejeté");
        egal(null, $r['donnees']['palier'], "palier invalide $i ramené à null");
    }
    egal(true, L\Formulaire::valider(formulaire(['essai' => 'oui']))['donnees']['essai'], 'essai coché');
    egal(false, L\Formulaire::valider(formulaire())['donnees']['essai'], 'essai absent');
    egal('champs', L\Formulaire::valider(formulaire(['essai' => 'yes']))['code'], 'essai : autre valeur refusée');

    [$app, $mailer] = app();
    envoyer($app, ['palier' => 'pilotage', 'essai' => 'oui']);
    $l = lignes($app)[0];
    egal('pilotage', $l['palier'], 'palier enregistré');
    egal(1, (int) $l['essai'], 'essai enregistré');
    [$app2] = app();
    envoyer($app2, ['palier' => 'inconnu']);
    egal(null, lignes($app2)[0]['palier'], 'palier hors liste enregistré à null');
    egal(0, (int) lignes($app2)[0]['essai'], 'essai par défaut à 0');
});

test('grille D : doublon, le palier change, l\'intention d\'essai ne se retire pas', function () {
    [$app, $mailer, $h] = app();
    envoyer($app, ['palier' => 'essentiel', 'essai' => 'oui']);
    envoyer($app, ['palier' => 'pilotage']);
    $l = lignes($app)[0];
    egal('pilotage', $l['palier'], 'palier mis à jour (inscription non confirmée)');
    egal(1, (int) $l['essai'], 'intention d\'essai conservée');
    confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'));
    $h->t += 86401;
    envoyer($app, ['palier' => 'pilotage-plus']);
    egal('pilotage', lignes($app)[0]['palier'], 'inscription confirmée : changement en attente de confirmation');
    confirmer($app, jetonDe(end($mailer->envoyes), 'confirm.php'));
    egal('pilotage-plus', lignes($app)[0]['palier'], 'changement appliqué après confirmation');
});

test('migration SQLite v1 -> v2 non destructive', function () {
    $f = sys_get_temp_dir() . '/lanternis-migration-' . bin2hex(random_bytes(4)) . '.sqlite';
    $pdo = new PDO('sqlite:' . $f, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    L\Base::migrer($pdo, 1);
    egal(1, (int) $pdo->query('PRAGMA user_version')->fetchColumn(), 'base en version 1');
    $pdo->exec("INSERT INTO inscriptions (email, structure, type, effectif, douleur, variante, public, source, statut, qualifie,
        version_mention, jeton_desinscription, cree_le, dernier_contact_le, confirme_le)
        VALUES ('ancien@exemple.fr', 'Ancienne SA', 'entreprise', '50-99', 'couts', 'a', 'pme', 'direct', 'confirme', 1,
        'landing-v1', '" . str_repeat('b', 64) . "', '2026-10-27 10:00:00', '2026-10-27 10:00:00', '2026-10-27 10:05:00')");
    $pdo = null;
    $pdo = L\Base::ouvrir($f); // migration automatique à l'ouverture
    egal(2, (int) $pdo->query('PRAGMA user_version')->fetchColumn(), 'base en version 2');
    $l = $pdo->query('SELECT * FROM inscriptions')->fetch();
    egal('ancien@exemple.fr', $l['email'], 'inscription existante conservée');
    egal('landing-v1', $l['version_mention'], 'données existantes intactes');
    egal(null, $l['palier'], 'palier null par défaut');
    egal(0, (int) $l['essai'], 'essai 0 par défaut');
    L\Base::migrer($pdo);
    egal(1, (int) $pdo->query('SELECT COUNT(*) FROM inscriptions')->fetchColumn(), 'migration idempotente');
    $leve = false;
    try {
        $pdo->exec("UPDATE inscriptions SET palier = 'premium'");
    } catch (PDOException) {
        $leve = true;
    }
    verifier($leve, 'contrainte CHECK sur palier');
    $pdo = null;
    foreach (glob($f . '*') as $x) {
        unlink($x);
    }
});

test('notification interne : cœur de cible signalé', function () {
    [$app, $mailer] = app(['NOTIFY_TO' => 'fondateur@hasteria.test']);
    envoyer($app, ['echange' => 'oui', 'retour' => 'autodiag', 'effectif' => '20-49', 'palier' => 'essentiel']);
    confirmer($app, jetonDe($mailer->envoyes[0], 'confirm.php'));
    $notif = end($mailer->envoyes);
    egal('fondateur@hasteria.test', $notif->a, 'notification envoyée');
    verifier(str_contains($notif->texte, 'Cœur de cible (entreprise ou ESS, 20 à 249 personnes) : oui'), 'entreprise 20-49 signalée dans la cible');
    verifier(!str_contains($notif->texte, 'essentiel'), 'palier non transmis à Mailjet');
});

// ---------------------------------------------------------------------------------------
// Désinscription
// ---------------------------------------------------------------------------------------
test('désinscription : bouton, suppression complète, réponse identique si inconnu', function () {
    [$app, $mailer] = app();
    envoyer($app);
    $jeton = jetonDe($mailer->envoyes[0], 'desinscription.php');
    egal(200, L\Desinscription::traiter($app, ['REQUEST_METHOD' => 'GET'], ['jeton' => $jeton], [])->statut, 'page de confirmation');
    egal(1, count(lignes($app)), 'GET ne supprime rien');
    $r = L\Desinscription::traiter($app, ['REQUEST_METHOD' => 'POST'], [], ['jeton' => $jeton]);
    egal(BASE . '/desinscrit.html', $r->entetes['Location'], 'redirection');
    egal(0, count(lignes($app)), 'inscription supprimée');
    $inconnu = L\Desinscription::traiter($app, ['REQUEST_METHOD' => 'POST'], [], ['jeton' => str_repeat('a', 64)]);
    egal($r->entetes['Location'], $inconnu->entetes['Location'], 'aucune fuite sur l\'existence');
    egal(404, L\Desinscription::traiter($app, ['REQUEST_METHOD' => 'GET'], ['jeton' => '../x'], [])->statut, 'jeton mal formé');
});

test('désinscription en un clic (RFC 8058)', function () {
    [$app, $mailer] = app();
    envoyer($app);
    $jeton = jetonDe($mailer->envoyes[0], 'desinscription.php');
    $r = L\Desinscription::traiter($app, ['REQUEST_METHOD' => 'POST'], ['jeton' => $jeton], ['List-Unsubscribe' => 'One-Click']);
    egal(200, $r->statut, 'réponse 200');
    egal(0, count(lignes($app)), 'supprimée');
});

// ---------------------------------------------------------------------------------------
// Purge
// ---------------------------------------------------------------------------------------
test('purge : 30 jours, 3 ans, 12 mois pour l\'échange, traces de débit', function () {
    [$app, $mailer, $h] = app();
    envoyer($app, ['email' => 'nonconfirme@exemple.fr'], ['REMOTE_ADDR' => '10.0.0.1']);
    envoyer($app, ['email' => 'confirme@exemple.fr'], ['REMOTE_ADDR' => '10.0.0.2']);
    envoyer($app, ['email' => 'echange@exemple.fr', 'retour' => 'autodiag', 'echange' => 'oui'], ['REMOTE_ADDR' => '10.0.0.3']);
    confirmer($app, jetonDe($mailer->envoyes[1], 'confirm.php'));
    confirmer($app, jetonDe($mailer->envoyes[2], 'confirm.php'));

    $h->t += 30 * 86400 - 60;
    L\Purge::executer($app->db, $h->t);
    egal(3, count(lignes($app)), 'rien avant 30 jours');
    egal(0, (int) $app->db->query('SELECT COUNT(*) FROM limites')->fetchColumn(), 'traces de débit purgées après 1 h');

    $h->t += 120;
    L\Purge::executer($app->db, $h->t);
    egal(['confirme@exemple.fr', 'echange@exemple.fr'], array_column(lignes($app), 'email'), 'non confirmée supprimée après 30 jours');

    $h->t = (new DateTimeImmutable('@' . T0))->modify('+12 months')->getTimestamp() + 60;
    L\Purge::executer($app->db, $h->t);
    egal(['confirme@exemple.fr'], array_column(lignes($app), 'email'), 'demande d\'échange autodiag supprimée après 12 mois');

    $h->t = (new DateTimeImmutable('@' . T0))->modify('+3 years')->getTimestamp() - 60;
    L\Purge::executer($app->db, $h->t);
    egal(1, count(lignes($app)), 'confirmée conservée avant 3 ans');
    $h->t += 120;
    L\Purge::executer($app->db, $h->t);
    egal(0, count(lignes($app)), 'confirmée supprimée 3 ans après le dernier contact');
});

test('purge automatique à chaque envoi du formulaire', function () {
    [$app, , $h] = app();
    envoyer($app, ['email' => 'vieux@exemple.fr']);
    $h->t += 31 * 86400;
    envoyer($app, ['email' => 'neuf@exemple.fr']);
    egal(['neuf@exemple.fr'], array_column(lignes($app), 'email'), 'ancienne inscription purgée');
});

test('configuration : refus d\'une configuration dangereuse', function () {
    $base = ['BASE_URL' => BASE, 'DB_PATH' => ':memory:', 'MAIL_LOG_PATH' => '/tmp/x', 'MAIL_FROM_EMAIL' => 'a@b.fr', 'IP_SALT' => str_repeat('s', 40)];
    foreach ([['BASE_URL' => 'http://lanternis.fr'], ['IP_SALT' => 'court'], ['MAIL_MODE' => 'mailjet'], ['MAIL_MODE' => 'smtp']] as $i => $faux) {
        $leve = false;
        try {
            L\Config::valider($faux + $base);
        } catch (RuntimeException) {
            $leve = true;
        }
        verifier($leve, "configuration $i acceptée");
    }
    L\Config::valider(['BASE_URL' => 'http://localhost:8080'] + $base);
});

// ---------------------------------------------------------------------------------------
foreach ($tests as $nom => $f) {
    try {
        $f();
        fwrite(STDOUT, "ok    $nom\n");
    } catch (Throwable $e) {
        $echecs++;
        fwrite(STDOUT, "ÉCHEC $nom\n      " . $e->getMessage() . ' (' . basename($e->getFile()) . ':' . $e->getLine() . ")\n");
    }
}
fwrite(STDOUT, sprintf("\n%d tests, %d assertions, %d échec(s)\n", count($tests), $assertions, $echecs));
exit($echecs === 0 ? 0 : 1);
