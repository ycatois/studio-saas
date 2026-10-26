<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * confirm.php (validation.md § 7.2, point 6).
 * GET : page avec un bouton ; POST : confirmation effective. Les messageries professionnelles
 * (filtres antivirus, aperçus de liens) ouvrent souvent les liens reçus : une confirmation sur
 * simple GET ferait confirmer des adresses par des robots et fausserait le signal de demande.
 */
final class Confirmation
{
    public static function traiter(App $app, array $server, array $get, array $post): Reponse
    {
        $methode = $server['REQUEST_METHOD'] ?? 'GET';
        $maintenant = $app->maintenant();

        if ($methode === 'GET' || $methode === 'HEAD') {
            $jeton = $get['jeton'] ?? null;
            if (!App::jetonValide($jeton) || self::trouver($app->db, $jeton, $maintenant) === null) {
                return Pages::lienInvalide();
            }
            return Reponse::html(200, Pages::page('Confirmez votre inscription',
                '<p>Un dernier clic pour confirmer votre inscription à la liste d\'attente de Lanternis.</p>'
                . Pages::formulaireBouton('confirm.php', $jeton, 'Confirmer mon inscription')));
        }
        if ($methode !== 'POST') {
            return Pages::methodeNonAutorisee('GET, POST');
        }

        $jeton = $post['jeton'] ?? null;
        if (!App::jetonValide($jeton)) {
            return Pages::lienInvalide();
        }

        $db = $app->db;
        $date = Base::date($maintenant);
        $db->exec('BEGIN IMMEDIATE');
        try {
            $avant = self::trouver($db, $jeton, $maintenant);
            if ($avant === null) {
                $db->exec('COMMIT');
                return Pages::lienInvalide();
            }
            $id = (int) $avant['id'];
            $premiere = $avant['statut'] === 'en_attente';
            $ajouts = json_decode((string) ($avant['ajouts_en_attente'] ?? ''), true);
            ListeAttente::appliquerAjouts($db, $id, is_array($ajouts) ? $ajouts : []);
            $db->prepare(<<<'SQL'
                UPDATE inscriptions SET statut = 'confirme', confirme_le = COALESCE(confirme_le, ?), qualifie = ?,
                    dernier_contact_le = ?, jeton_confirmation = NULL, jeton_confirmation_expire = NULL,
                    ajouts_en_attente = NULL
                WHERE id = ?
                SQL)->execute([$date, Formulaire::qualifie($avant['type'], $avant['effectif']) ? 1 : 0, $date, $id]);
            $db->exec('COMMIT');
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->exec('ROLLBACK');
            }
            throw $e;
        }

        $apres = ListeAttente::lire($db, $id);
        $nouvelEchange = (int) $apres['echange'] === 1 && ($premiere || (int) $avant['echange'] === 0);
        $emails = [];
        if ($nouvelEchange && $apres['echange_origine'] === 'autodiag') {
            $emails[] = Gabarits::echange($app, $apres);
        } elseif ($premiere) {
            $emails[] = Gabarits::bienvenue($app, $apres);
        }
        if ($nouvelEchange && $app->config['NOTIFY_TO'] !== '') {
            $emails[] = Gabarits::notification($app, $apres);
        }
        foreach ($emails as $email) {
            try {
                $app->mailer->envoyer($email);
            } catch (\Throwable $e) {
                // La confirmation est acquise ; l'email manquant est journalisé (sans adresse).
                error_log('[lanternis-prelancement] email « ' . $email->categorie . ' » non envoyé : ' . $e->getMessage());
            }
        }
        return Reponse::redirection($app->url('confirme.html'));
    }

    private static function trouver(\PDO $db, string $jeton, int $maintenant): ?array
    {
        $st = $db->prepare('SELECT * FROM inscriptions WHERE jeton_confirmation = ? AND jeton_confirmation_expire >= ?');
        $st->execute([App::hacherJeton($jeton), Base::date($maintenant)]);
        $ligne = $st->fetch();
        return $ligne === false ? null : $ligne;
    }
}
