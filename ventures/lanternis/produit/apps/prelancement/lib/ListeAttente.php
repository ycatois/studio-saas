<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Traitement du formulaire de liste d'attente (waitlist.php), validation.md § 7.2,
 * et de la demande d'échange de l'autodiagnostic (autodiagnostic.md § 5).
 *
 * Réponses sans fuite d'information : une adresse déjà inscrite, un robot pris au piège
 * et une nouvelle inscription reçoivent exactement la même redirection.
 */
final class ListeAttente
{
    public const DELAI_RENVOI = 86400;          // au plus un email de confirmation par 24 h
    public const VALIDITE_JETON = 7 * 86400;    // lien de confirmation valable 7 jours

    public static function traiter(App $app, array $server, array $post): Reponse
    {
        if (($server['REQUEST_METHOD'] ?? '') !== 'POST') {
            return Pages::methodeNonAutorisee('POST');
        }
        $retour = ($post['retour'] ?? '') === 'autodiag' ? 'autodiag' : 'landing';
        $js = ($post['js'] ?? '') === '1';

        if (!Http::origineAutorisee($server, $app->config)) {
            return Pages::interdit();
        }

        $maintenant = $app->maintenant();
        Purge::executer($app->db, $maintenant);

        $cleIp = Limiteur::cleIp(Http::ipPourLimite($server), (string) $app->config['IP_SALT']);
        if (!Limiteur::autoriser($app->db, $cleIp, (int) $app->config['LIMITE_PAR_IP_HEURE'], $maintenant)) {
            return self::erreur($app, 'technique', $retour, $js, $post);
        }

        // Champ piège rempli : même réponse qu'un succès, rien n'est enregistré ni envoyé.
        $piege = $post['site_web'] ?? '';
        if (!is_string($piege) || trim($piege) !== '') {
            return self::succes($app, $retour, $js, $post);
        }

        $resultat = Formulaire::valider($post);
        if (!$resultat['ok']) {
            return self::erreur($app, $resultat['code'], $retour, $js, $post);
        }

        $envoi = self::enregistrer($app, $resultat['donnees'], $retour, $maintenant);
        if ($envoi !== null) {
            [$inscription, $jeton] = $envoi;
            if (!Limiteur::autoriser($app->db, 'emails', (int) $app->config['LIMITE_EMAILS_HEURE'], $maintenant)) {
                error_log('[lanternis-prelancement] plafond horaire d\'emails atteint');
                return self::erreur($app, 'technique', $retour, $js, $post);
            }
            try {
                $app->mailer->envoyer(Gabarits::confirmation($app, $inscription, $jeton));
            } catch (\Throwable $e) {
                error_log('[lanternis-prelancement] email de confirmation non envoyé : ' . $e->getMessage());
                return self::erreur($app, 'technique', $retour, $js, $post);
            }
            $app->db->prepare('UPDATE inscriptions SET dernier_envoi_confirmation_le = ? WHERE id = ?')
                ->execute([Base::date($maintenant), $inscription['id']]);
        }
        return self::succes($app, $retour, $js, $post);
    }

    /**
     * Crée ou met à jour l'inscription. Renvoie [inscription, jeton de confirmation en clair]
     * si un email de confirmation doit partir, null sinon.
     */
    public static function enregistrer(App $app, array $d, string $retour, int $maintenant): ?array
    {
        $db = $app->db;
        $date = Base::date($maintenant);
        $version = self::versionMention($app, $retour);
        $db->exec('BEGIN IMMEDIATE');
        try {
            $st = $db->prepare('SELECT * FROM inscriptions WHERE email = ?');
            $st->execute([$d['email']]);
            $existante = $st->fetch();

            if ($existante === false) {
                $jeton = App::jeton();
                $db->prepare(<<<'SQL'
                    INSERT INTO inscriptions (email, email_generique, structure, type, effectif, douleur, douleur_autre,
                        nouvelles, nouvelles_le, nouvelles_version, echange, echange_le, echange_origine,
                        variante, public, source, score, profil, reponses, statut, qualifie, version_mention,
                        jeton_confirmation, jeton_confirmation_expire, jeton_desinscription, cree_le, dernier_contact_le)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'en_attente', 0, ?, ?, ?, ?, ?, ?)
                    SQL)->execute([
                    $d['email'], $d['email_generique'], $d['structure'], $d['type'], $d['effectif'], $d['douleur'], $d['douleur_autre'],
                    $d['nouvelles'] ? 1 : 0, $d['nouvelles'] ? $date : null, $d['nouvelles'] ? $version : null,
                    $d['echange'] ? 1 : 0, $d['echange'] ? $date : null, $d['echange'] ? $retour : null,
                    $d['variante'], $d['public'], $d['source'], $d['score'], $d['profil'], $d['reponses'], $version,
                    App::hacherJeton($jeton), Base::date($maintenant + self::VALIDITE_JETON), App::jeton(), $date, $date,
                ]);
                $id = (int) $db->lastInsertId();
                $db->exec('COMMIT');
                return [self::lire($db, $id), $jeton];
            }

            // Adresse déjà connue : seuls des ajouts sont possibles (jamais de retrait silencieux).
            $ajouts = [];
            if ($d['nouvelles'] && (int) $existante['nouvelles'] === 0) {
                $ajouts['nouvelles'] = ['le' => $date, 'version' => $version];
            }
            if ($d['echange'] && (int) $existante['echange'] === 0) {
                $ajouts['echange'] = ['le' => $date, 'origine' => $retour];
            }
            if ($d['reponses'] !== null) {
                $ajouts['resultat'] = ['score' => $d['score'], 'profil' => $d['profil'], 'reponses' => $d['reponses']];
            }

            $id = (int) $existante['id'];
            if ($existante['statut'] === 'en_attente') {
                // Non confirmée : les ajouts seront prouvés par la confirmation elle-même.
                self::appliquerAjouts($db, $id, $ajouts);
                $aConfirmer = true;
            } else {
                // Déjà confirmée : un ajout de consentement demandé par un tiers ne doit pas valoir
                // consentement ; il reste en attente jusqu'au clic sur un nouveau lien de confirmation.
                $enAttente = json_decode((string) ($existante['ajouts_en_attente'] ?? ''), true);
                $enAttente = is_array($enAttente) ? array_merge($enAttente, $ajouts) : $ajouts;
                if ($ajouts !== []) {
                    $db->prepare('UPDATE inscriptions SET ajouts_en_attente = ? WHERE id = ?')
                        ->execute([json_encode($enAttente, JSON_THROW_ON_ERROR), $id]);
                }
                $aConfirmer = $enAttente !== [];
            }

            $dernierEnvoi = $existante['dernier_envoi_confirmation_le'];
            $renvoyer = $aConfirmer && ($dernierEnvoi === null || $dernierEnvoi <= Base::date($maintenant - self::DELAI_RENVOI));
            $jeton = null;
            if ($renvoyer) {
                $jeton = App::jeton();
                $db->prepare('UPDATE inscriptions SET jeton_confirmation = ?, jeton_confirmation_expire = ? WHERE id = ?')
                    ->execute([App::hacherJeton($jeton), Base::date($maintenant + self::VALIDITE_JETON), $id]);
            }
            $db->exec('COMMIT');
            return $renvoyer ? [self::lire($db, $id), $jeton] : null;
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->exec('ROLLBACK');
            }
            throw $e;
        }
    }

    /**
     * Identifiant du texte d'information affiché sous le formulaire (preuve du consentement).
     * Par défaut : empreinte calculée par build.php (lib/mentions.generated.php ; textes archivés
     * dans mentions/). VERSION_MENTION dans config.php la remplace si elle est renseignée.
     */
    public static function versionMention(App $app, string $retour): string
    {
        if ((string) $app->config['VERSION_MENTION'] !== '') {
            return (string) $app->config['VERSION_MENTION'];
        }
        static $versions = null;
        if ($versions === null) {
            $f = __DIR__ . '/mentions.generated.php';
            $versions = is_file($f) ? (array) require $f : [];
        }
        return (string) ($versions[$retour] ?? 'inconnue');
    }

    /** @param array<string,array> $ajouts */
    public static function appliquerAjouts(\PDO $db, int $id, array $ajouts): void
    {
        if (isset($ajouts['nouvelles'])) {
            $db->prepare('UPDATE inscriptions SET nouvelles = 1, nouvelles_le = ?, nouvelles_version = ? WHERE id = ? AND nouvelles = 0')
                ->execute([$ajouts['nouvelles']['le'], $ajouts['nouvelles']['version'], $id]);
        }
        if (isset($ajouts['echange'])) {
            $db->prepare('UPDATE inscriptions SET echange = 1, echange_le = ?, echange_origine = ? WHERE id = ? AND echange = 0')
                ->execute([$ajouts['echange']['le'], $ajouts['echange']['origine'], $id]);
        }
        if (isset($ajouts['resultat'])) {
            $db->prepare('UPDATE inscriptions SET score = ?, profil = ?, reponses = ? WHERE id = ?')
                ->execute([$ajouts['resultat']['score'], $ajouts['resultat']['profil'], $ajouts['resultat']['reponses'], $id]);
        }
    }

    public static function lire(\PDO $db, int $id): array
    {
        $st = $db->prepare('SELECT * FROM inscriptions WHERE id = ?');
        $st->execute([$id]);
        $ligne = $st->fetch();
        if ($ligne === false) {
            throw new \RuntimeException('Inscription introuvable');
        }
        return $ligne;
    }

    /** Paramètres de suivi conservés dans l'URL de retour (variante et source, jamais de donnée personnelle). */
    private static function parametresSuivi(array $post): array
    {
        $p = [];
        if (($post['public'] ?? '') === 'ess') {
            $p['public'] = 'ess';
        } elseif (($post['variante'] ?? '') === 'b') {
            $p['v'] = 'b';
        }
        $src = $post['source'] ?? '';
        if (is_string($src) && in_array($src, Formulaire::SOURCES, true) && $src !== 'direct') {
            $p['src'] = $src;
        }
        return $p;
    }

    private static function succes(App $app, string $retour, bool $js, array $post): Reponse
    {
        if ($retour === 'landing' && $js) {
            $q = http_build_query(self::parametresSuivi($post) + ['inscription' => 'ok']);
            return Reponse::redirection($app->url('?' . $q) . '#liste-attente');
        }
        return Reponse::redirection($app->url('merci.html'));
    }

    private static function erreur(App $app, string $code, string $retour, bool $js, array $post): Reponse
    {
        if ($retour === 'landing' && $js) {
            $q = http_build_query(self::parametresSuivi($post) + ['erreur' => $code]);
            return Reponse::redirection($app->url('?' . $q) . '#liste-attente');
        }
        $q = ['code' => $code] + ($retour === 'autodiag' ? ['retour' => 'autodiag'] : []);
        return Reponse::redirection($app->url('erreur.html?' . http_build_query($q)));
    }
}
