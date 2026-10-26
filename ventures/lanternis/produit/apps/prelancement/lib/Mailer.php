<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

final class Email
{
    /** @param array<string,string> $entetes */
    public function __construct(
        public readonly string $a,
        public readonly string $sujet,
        public readonly string $texte,
        public readonly string $html,
        public readonly array $entetes = [],
        public readonly string $categorie = '',
    ) {
    }
}

interface Mailer
{
    /** Envoie l'email ou lève une exception. */
    public function envoyer(Email $email): void;
}

/**
 * Envoi par l'API Mailjet v3.1 (POST /v3.1/send, authentification HTTP Basic).
 * Suivi des ouvertures et des clics désactivé (pas de pixel, liens non réécrits).
 */
final class MailerMailjet implements Mailer
{
    public const URL = 'https://api.mailjet.com/v3.1/send';

    public function __construct(private readonly array $config)
    {
    }

    public function envoyer(Email $email): void
    {
        if (!function_exists('curl_init')) {
            throw new \RuntimeException('Extension cURL absente');
        }
        $message = [
            'From' => ['Email' => $this->config['MAIL_FROM_EMAIL'], 'Name' => $this->config['MAIL_FROM_NAME']],
            'To' => [['Email' => $email->a]],
            'Subject' => $email->sujet,
            'TextPart' => $email->texte,
            'HTMLPart' => $email->html,
            'TrackOpens' => 'disabled',
            'TrackClicks' => 'disabled',
        ];
        if ($this->config['MAIL_REPLY_TO'] !== '') {
            $message['ReplyTo'] = ['Email' => $this->config['MAIL_REPLY_TO']];
        }
        if ($email->entetes !== []) {
            $message['Headers'] = $email->entetes;
        }
        if ($email->categorie !== '') {
            $message['CustomID'] = 'lanternis-' . $email->categorie;
        }
        $corps = json_encode(['Messages' => [$message]], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);

        $ch = curl_init(self::URL);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $corps,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_USERPWD => $this->config['MAILJET_API_KEY'] . ':' . $this->config['MAILJET_API_SECRET'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
        ]);
        $reponse = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $erreur = curl_error($ch);
        curl_close($ch);
        if ($reponse === false) {
            throw new \RuntimeException('Mailjet injoignable : ' . $erreur);
        }
        $json = json_decode((string) $reponse, true);
        $statut = is_array($json) ? ($json['Messages'][0]['Status'] ?? null) : null;
        if ($code !== 200 || $statut !== 'success') {
            // Le détail de la réponse peut contenir l'adresse : seul le code est journalisé.
            throw new \RuntimeException('Envoi Mailjet refusé (HTTP ' . $code . ', statut ' . var_export($statut, true) . ')');
        }
    }
}

/**
 * Mode MAIL_MODE=log : chaque email est ajouté au fichier de journal, une ligne JSON par email.
 * Réservé au développement et aux tests (le fichier contient des données personnelles).
 */
final class MailerJournal implements Mailer
{
    public function __construct(private readonly string $chemin)
    {
    }

    public function envoyer(Email $email): void
    {
        $dossier = dirname($this->chemin);
        if (!is_dir($dossier) && !mkdir($dossier, 0700, true) && !is_dir($dossier)) {
            throw new \RuntimeException('Dossier du journal des emails impossible à créer');
        }
        $ligne = json_encode([
            'date' => gmdate('c'),
            'a' => $email->a,
            'sujet' => $email->sujet,
            'categorie' => $email->categorie,
            'entetes' => $email->entetes,
            'texte' => $email->texte,
            'html' => $email->html,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
        if (file_put_contents($this->chemin, $ligne . "\n", FILE_APPEND | LOCK_EX) === false) {
            throw new \RuntimeException('Écriture du journal des emails impossible');
        }
        @chmod($this->chemin, 0600);
    }
}
