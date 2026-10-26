<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Contenu des emails. Les textes sont repris SANS RÉÉCRITURE de :
 *  - marketing/landing/validation.md § 9 (email 1 : confirmation ; email 2 : bienvenue) ;
 *  - marketing/landing/autodiagnostic.md § 6 (confirmation de la demande d'échange) ;
 *  - marketing/landing/conformite-prelancement.md § 4.3 (pied de page commun, juriste-rgpd).
 * Toute modification de texte se fait d'abord dans ces fichiers (pôle marketing), puis ici.
 * Seule la notification interne (NOTIFY_TO) est un texte technique propre à ce script.
 */
final class Gabarits
{
    private const MOIS = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août',
        'septembre', 'octobre', 'novembre', 'décembre'];

    public static function e(string $v): string
    {
        return htmlspecialchars($v, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    }

    /** Date en français, heure de Paris (« 26 octobre 2026 »). */
    public static function dateFr(string $dateUtc): string
    {
        $d = new \DateTimeImmutable($dateUtc, new \DateTimeZone('UTC'));
        $d = $d->setTimezone(new \DateTimeZone('Europe/Paris'));
        return $d->format('j') . ' ' . self::MOIS[(int) $d->format('n') - 1] . ' ' . $d->format('Y');
    }

    /**
     * Le nom de structure est saisi par un tiers et renvoyé à l'adresse saisie : s'il ressemble
     * à un lien (protocole, « www. » ou nom de domaine), il est omis pour ne pas servir de vecteur
     * d'hameçonnage.
     */
    public static function structureAffichable(string $structure): ?string
    {
        if (preg_match('~(://|www\.|@|[a-z0-9-]\.(?:[a-z]{2,})(?:\b|/))~iu', $structure) === 1) {
            return null;
        }
        return $structure;
    }

    private static function hote(App $app): string
    {
        return (string) parse_url($app->config['BASE_URL'], PHP_URL_HOST);
    }

    /** Pied commun des emails automatiques (conformite-prelancement.md § 4.3, qui remplace le § 4 de liste-attente-remerciement.md). */
    private static function pied(App $app, array $ins, string $lienDesinscription): array
    {
        $phrase = 'Vous recevez cet email parce que vous vous êtes inscrit(e) à la liste d\'attente de Lanternis le '
            . self::dateFr($ins['cree_le']) . '.';
        $societe = 'Lanternis est une marque d\'Hasteria SASU, SASU au capital de 300 €, 99 avenue Achille Peretti, 92200 Neuilly-sur-Seine, RCS Nanterre 981 178 429. Contact : contact@hasteria.net.';
        $lienConf = $app->url('confidentialite.html');
        $texte = "--\n" . $phrase . "\nMe désinscrire en un clic : " . $lienDesinscription
            . "\nPolitique de confidentialité : " . $lienConf . "\n\n" . $societe;
        $html = '<hr style="border:0;border-top:1px solid #D9D2C3;margin:32px 0 16px">'
            . '<p style="font-size:13px;line-height:1.5;color:#4A5260;margin:0 0 8px">' . self::e($phrase) . '<br>'
            . '<a href="' . self::e($lienDesinscription) . '" style="color:#8A5300">Me désinscrire en un clic</a> · '
            . '<a href="' . self::e($lienConf) . '" style="color:#8A5300">Politique de confidentialité</a></p>'
            . '<p style="font-size:13px;line-height:1.5;color:#4A5260;margin:0">' . self::e($societe) . '</p>';
        return [$texte, $html];
    }

    private static function enveloppe(string $sujet, string $contenu): string
    {
        return '<!doctype html><html lang="fr"><head><meta charset="utf-8">'
            . '<meta name="viewport" content="width=device-width, initial-scale=1"><title>' . self::e($sujet) . '</title></head>'
            . '<body style="margin:0;padding:0;background:#FAF6EE;color:#1B2330;font-family:system-ui,-apple-system,\'Segoe UI\',Roboto,Arial,sans-serif">'
            . '<div style="max-width:600px;margin:0 auto;padding:32px 24px;font-size:16px;line-height:1.55">'
            . '<p style="font-family:Georgia,serif;font-size:22px;font-weight:600;margin:0 0 24px">Lanternis</p>'
            . $contenu . '</div></body></html>';
    }

    private static function bouton(string $url, string $libelle): string
    {
        return '<p style="margin:24px 0"><a href="' . self::e($url) . '" style="display:inline-block;background:#1B2330;color:#FAF6EE;'
            . 'text-decoration:none;font-weight:600;padding:12px 20px;border-radius:8px">' . self::e($libelle) . '</a></p>';
    }

    /** En-têtes de désinscription en un clic (RFC 2369 et RFC 8058). */
    private static function entetesDesinscription(string $lien): array
    {
        return [
            'List-Unsubscribe' => '<' . $lien . '>',
            'List-Unsubscribe-Post' => 'List-Unsubscribe=One-Click',
        ];
    }

    public static function lienDesinscription(App $app, string $jeton): string
    {
        return $app->url('desinscription.php?jeton=' . $jeton);
    }

    /** Email 1 : confirmation (double opt-in), validation.md § 9. */
    public static function confirmation(App $app, array $ins, string $jetonConfirmation): Email
    {
        $sujet = 'Confirmez votre inscription à la liste d\'attente Lanternis';
        $lien = $app->url('confirm.php?jeton=' . $jetonConfirmation);
        $desinscription = self::lienDesinscription($app, $ins['jeton_desinscription']);
        $structure = self::structureAffichable($ins['structure']);
        $pour = $structure !== null ? ' pour ' . $structure : '';
        [$piedTexte, $piedHtml] = self::pied($app, $ins, $desinscription);

        $texte = 'Bonjour, vous avez demandé à rejoindre la liste d\'attente de Lanternis' . $pour . '. '
            . "Pour confirmer, cliquez sur ce lien : Confirmer mon inscription\n" . $lien . "\n\n"
            . 'Si vous n\'êtes pas à l\'origine de cette demande, ignorez cet email : rien ne sera conservé.' . "\n\n"
            . '— Lanternis est une marque d\'Hasteria SASU.' . "\n\n" . $piedTexte;
        $html = self::enveloppe($sujet,
            '<p style="margin:0 0 16px">Bonjour, vous avez demandé à rejoindre la liste d\'attente de Lanternis' . self::e($pour)
            . '. Pour confirmer, cliquez sur ce lien :</p>'
            . self::bouton($lien, 'Confirmer mon inscription')
            . '<p style="margin:0 0 16px">Si vous n\'êtes pas à l\'origine de cette demande, ignorez cet email : rien ne sera conservé.</p>'
            . '<p style="margin:0">— Lanternis est une marque d\'Hasteria SASU.</p>' . $piedHtml);
        return new Email($ins['email'], $sujet, $texte, $html, self::entetesDesinscription($desinscription), 'confirmation');
    }

    /** Email 2 : bienvenue après confirmation, validation.md § 9. */
    public static function bienvenue(App $app, array $ins): Email
    {
        $sujet = 'Votre place est réservée. Une question pour vous';
        $autodiag = $app->url('autodiagnostic.html?src=confirmation');
        $desinscription = self::lienDesinscription($app, $ins['jeton_desinscription']);
        [$piedTexte, $piedHtml] = self::pied($app, $ins, $desinscription);

        $texte = 'Merci. Nous ouvrirons Lanternis d\'abord aux inscrits, par petits groupes, et nous vous préviendrons avant. '
            . 'En attendant, une question, à laquelle vous pouvez répondre simplement à cet email : '
            . 'quel est aujourd\'hui votre plus gros problème avec votre informatique ?' . "\n\n"
            . 'Et si vous avez 5 minutes : faire l\'autodiagnostic SI en 10 questions' . "\n" . $autodiag . "\n\n"
            . '— Lanternis est une marque d\'Hasteria SASU.' . "\n" . 'Me désinscrire : ' . $desinscription . "\n\n" . $piedTexte;
        $html = self::enveloppe($sujet,
            '<p style="margin:0 0 16px">Merci. Nous ouvrirons Lanternis d\'abord aux inscrits, par petits groupes, et nous vous préviendrons avant. '
            . 'En attendant, une question, à laquelle vous pouvez répondre simplement à cet email : '
            . '<strong>quel est aujourd\'hui votre plus gros problème avec votre informatique ?</strong></p>'
            . '<p style="margin:0 0 16px">Et si vous avez 5 minutes : <a href="' . self::e($autodiag) . '" style="color:#8A5300">faire l\'autodiagnostic SI en 10 questions</a>.</p>'
            . '<p style="margin:0">— Lanternis est une marque d\'Hasteria SASU. <a href="' . self::e($desinscription) . '" style="color:#8A5300">Me désinscrire</a></p>'
            . $piedHtml);
        return new Email($ins['email'], $sujet, $texte, $html, self::entetesDesinscription($desinscription), 'bienvenue');
    }

    /** Confirmation de la demande d'échange de 30 minutes, autodiagnostic.md § 6. */
    public static function echange(App $app, array $ins): Email
    {
        $sujet = 'Votre échange de 30 minutes : nous revenons vers vous sous 2 jours ouvrés';
        $desinscription = self::lienDesinscription($app, $ins['jeton_desinscription']);
        [$piedTexte, $piedHtml] = self::pied($app, $ins, $desinscription);
        $resultat = '';
        if ($ins['reponses'] !== null && $ins['profil'] !== null) {
            $axe = Autodiag::axePrioritaire($ins['reponses']);
            $resultat = 'Votre résultat : ' . Autodiag::LIBELLES_PROFILS[$ins['profil']] . ', ' . (int) $ins['score']
                . ' sur 30 ; votre axe prioritaire : ' . Autodiag::LIBELLES_AXES[$axe] . '. '
                . 'D\'ici là, votre première action : ' . Autodiag::premiereAction($ins['reponses']);
        }
        $intro = 'Bonjour, merci pour votre demande. Nous vous proposerons trois créneaux par retour d\'email sous 2 jours ouvrés.';
        $texte = $intro . "\n\n" . ($resultat !== '' ? $resultat . "\n\n" : '')
            . '— Lanternis est une marque d\'Hasteria SASU.' . "\n" . 'Me désinscrire : ' . $desinscription . "\n\n" . $piedTexte;
        $html = self::enveloppe($sujet,
            '<p style="margin:0 0 16px">' . self::e($intro) . '</p>'
            . ($resultat !== '' ? '<p style="margin:0 0 16px">' . self::e($resultat) . '</p>' : '')
            . '<p style="margin:0">— Lanternis est une marque d\'Hasteria SASU. <a href="' . self::e($desinscription) . '" style="color:#8A5300">Me désinscrire</a></p>'
            . $piedHtml);
        return new Email($ins['email'], $sujet, $texte, $html, self::entetesDesinscription($desinscription), 'echange');
    }

    /**
     * Notification interne : une demande d'échange vient d'être confirmée (texte technique).
     * Minimisation (conformite-prelancement.md § 5.3) : ni douleur, ni source, ni résultat ne
     * transitent par Mailjet ; le détail se lit sur le serveur avec bin/export.php.
     */
    public static function notification(App $app, array $ins): Email
    {
        $sujet = '[Lanternis] Demande d\'échange confirmée';
        $texte = implode("\n", [
            'Une demande d\'échange de 30 minutes vient d\'être confirmée (réponse attendue sous 2 jours ouvrés).',
            '',
            'Email : ' . $ins['email'],
            'Structure : ' . $ins['structure'],
            'Type : ' . $ins['type'] . ' · effectif : ' . $ins['effectif'],
            'Cœur de cible (entreprise ou ESS, 20 à 249 personnes) : ' . ((int) $ins['qualifie'] === 1 ? 'oui' : 'non'),
            '',
            'Détail (préoccupation, résultat de l\'autodiagnostic) : php bin/export.php sur le serveur.',
        ]);
        $html = '<pre style="font-family:monospace;white-space:pre-wrap">' . self::e($texte) . '</pre>';
        return new Email($app->config['NOTIFY_TO'], $sujet, $texte, $html, [], 'notification');
    }
}
