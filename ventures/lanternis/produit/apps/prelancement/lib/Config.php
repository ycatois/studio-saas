<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/** Chargement et contrôle de la configuration (config.php, hors racine web). */
final class Config
{
    public const DEFAUTS = [
        'BASE_URL' => '',
        'ORIGINES_AUTORISEES' => [],
        'DB_PATH' => '',
        'MAIL_MODE' => 'log',
        'MAIL_LOG_PATH' => '',
        'MAILJET_API_KEY' => '',
        'MAILJET_API_SECRET' => '',
        'MAIL_FROM_EMAIL' => '',
        'MAIL_FROM_NAME' => 'Lanternis',
        'MAIL_REPLY_TO' => '',
        'NOTIFY_TO' => '',
        'IP_SALT' => '',
        'VERSION_MENTION' => '',
        'LIMITE_PAR_IP_HEURE' => 5,
        'LIMITE_EMAILS_HEURE' => 100,
    ];

    /** Dossier de l'application (parent de public/), surchargeable par LANTERNIS_APP_DIR. */
    public static function dossierApp(): string
    {
        $env = getenv('LANTERNIS_APP_DIR') ?: ($_SERVER['LANTERNIS_APP_DIR'] ?? '');
        return is_string($env) && $env !== '' ? rtrim($env, '/\\') : dirname(__DIR__);
    }

    public static function charger(?string $chemin = null): array
    {
        if ($chemin === null) {
            $env = getenv('LANTERNIS_CONFIG') ?: ($_SERVER['LANTERNIS_CONFIG'] ?? '');
            $chemin = is_string($env) && $env !== '' ? $env : self::dossierApp() . '/config.php';
        }
        if (!is_file($chemin)) {
            throw new \RuntimeException('Fichier de configuration introuvable');
        }
        $config = require $chemin;
        if (!is_array($config)) {
            throw new \RuntimeException('La configuration doit renvoyer un tableau');
        }
        $mode = getenv('MAIL_MODE');
        if (is_string($mode) && $mode !== '') {
            $config['MAIL_MODE'] = $mode;
        }
        return self::valider($config + self::DEFAUTS);
    }

    public static function valider(array $c): array
    {
        $c += self::DEFAUTS;
        $erreurs = [];
        $c['BASE_URL'] = rtrim((string) $c['BASE_URL'], '/');
        $u = parse_url($c['BASE_URL']);
        $hote = is_array($u) ? ($u['host'] ?? '') : '';
        $schema = is_array($u) ? ($u['scheme'] ?? '') : '';
        $local = in_array($hote, ['localhost', '127.0.0.1', '[::1]'], true);
        if ($hote === '' || !($schema === 'https' || ($schema === 'http' && $local))) {
            $erreurs[] = 'BASE_URL doit être une URL https (http seulement pour localhost)';
        }
        if (!is_array($c['ORIGINES_AUTORISEES'])) {
            $erreurs[] = 'ORIGINES_AUTORISEES doit être un tableau';
        }
        if ((string) $c['DB_PATH'] === '') {
            $erreurs[] = 'DB_PATH manquant';
        }
        if (!in_array($c['MAIL_MODE'], ['log', 'mailjet'], true)) {
            $erreurs[] = 'MAIL_MODE doit valoir log ou mailjet';
        }
        if ($c['MAIL_MODE'] === 'log' && (string) $c['MAIL_LOG_PATH'] === '') {
            $erreurs[] = 'MAIL_LOG_PATH manquant (mode log)';
        }
        if ($c['MAIL_MODE'] === 'mailjet'
            && ($c['MAILJET_API_KEY'] === '' || $c['MAILJET_API_SECRET'] === '')) {
            $erreurs[] = 'Clés Mailjet manquantes (mode mailjet)';
        }
        if (!filter_var($c['MAIL_FROM_EMAIL'], FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = 'MAIL_FROM_EMAIL invalide';
        }
        if (strlen((string) $c['IP_SALT']) < 32) {
            $erreurs[] = 'IP_SALT doit contenir au moins 32 caractères';
        }
        $c['LIMITE_PAR_IP_HEURE'] = max(1, (int) $c['LIMITE_PAR_IP_HEURE']);
        $c['LIMITE_EMAILS_HEURE'] = max(1, (int) $c['LIMITE_EMAILS_HEURE']);
        if ($erreurs !== []) {
            throw new \RuntimeException('Configuration invalide : ' . implode(' ; ', $erreurs));
        }
        return $c;
    }
}
