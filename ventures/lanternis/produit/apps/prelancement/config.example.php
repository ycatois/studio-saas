<?php
/*
 * Lanternis · liste d'attente de pré-lancement · modèle de configuration.
 *
 * Copier ce fichier en config.php, À CÔTÉ de ce modèle (donc HORS du dossier public/),
 * puis le remplir sur le serveur. config.php n'est JAMAIS versionné (.gitignore) et
 * ne doit jamais être déposé dans la racine web. Droits conseillés : chmod 600.
 *
 * Aucun secret dans ce modèle : les valeurs vides sont à renseigner sur le serveur.
 */
declare(strict_types=1);

return [
    // URL publique du site, sans barre finale. Sert aux liens des emails, aux redirections
    // et au contrôle de l'en-tête Origin. En local : 'http://localhost:8080'.
    'BASE_URL' => 'https://lanternis.fr',

    // Origines supplémentaires acceptées pour le formulaire (ex. 'https://www.lanternis.fr'
    // si le www n'est pas redirigé vers le domaine nu).
    'ORIGINES_AUTORISEES' => [],

    // Base SQLite, HORS de la racine web. Le dossier est créé au premier appel (droits 700).
    'DB_PATH' => __DIR__ . '/data/liste-attente.sqlite',

    // 'mailjet' en production ; 'log' pour les tests (les emails sont écrits dans MAIL_LOG_PATH,
    // une ligne JSON par email, avec les données personnelles : jamais en production).
    // La variable d'environnement MAIL_MODE, si elle est définie, remplace cette valeur.
    'MAIL_MODE' => 'log',
    'MAIL_LOG_PATH' => __DIR__ . '/var/emails.log',

    // Mailjet, API v3.1 (clés du compte ou du sous-compte de la marque, domaine authentifié
    // SPF + DKIM + DMARC avant le premier envoi).
    'MAILJET_API_KEY' => '',
    'MAILJET_API_SECRET' => '',
    'MAIL_FROM_EMAIL' => 'bonjour@lanternis.fr', // hypothèse : adresse à créer
    'MAIL_FROM_NAME' => 'Lanternis',
    'MAIL_REPLY_TO' => '',                       // vide = même adresse que l'expéditeur

    // Adresse interne prévenue quand une demande d'échange de 30 minutes est confirmée
    // (vide = aucune notification ; les demandes restent visibles avec bin/export.php).
    'NOTIFY_TO' => '',

    // Sel secret du hachage des adresses IP (limitation de débit). Au moins 32 caractères.
    // Générer : php -r "echo bin2hex(random_bytes(32)), PHP_EOL;"
    'IP_SALT' => '',

    // Identifiant du texte d'information affiché sous le formulaire (preuve du consentement).
    // Laisser vide : build.php calcule une empreinte du texte réellement publié
    // (lib/mentions.generated.php) et archive ce texte dans mentions/. Ne renseigner que pour forcer.
    'VERSION_MENTION' => '',

    // Limites
    'LIMITE_PAR_IP_HEURE' => 5,     // envois de formulaire par heure et par IP (hachée)
    'LIMITE_EMAILS_HEURE' => 100,   // plafond global d'emails de confirmation par heure
];
