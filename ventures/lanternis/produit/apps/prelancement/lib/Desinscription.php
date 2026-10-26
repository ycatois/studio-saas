<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * desinscription.php (validation.md § 7.2, point 7) : suppression complète de l'inscription,
 * sans connexion. GET affiche un bouton (protection contre les robots qui suivent les liens) ;
 * POST supprime. Le POST « List-Unsubscribe=One-Click » des messageries (RFC 8058) supprime
 * directement. La réponse est identique que le jeton corresponde à une inscription ou non.
 */
final class Desinscription
{
    public static function traiter(App $app, array $server, array $get, array $post): Reponse
    {
        $methode = $server['REQUEST_METHOD'] ?? 'GET';

        if ($methode === 'GET' || $methode === 'HEAD') {
            $jeton = $get['jeton'] ?? null;
            if (!App::jetonValide($jeton)) {
                return Pages::lienInvalide();
            }
            return Reponse::html(200, Pages::page('Se désinscrire',
                '<p>Cliquez sur le bouton pour vous désinscrire de la liste d\'attente de Lanternis. '
                . 'Votre inscription et les informations associées seront supprimées.</p>'
                . Pages::formulaireBouton('desinscription.php', $jeton, 'Me désinscrire')));
        }
        if ($methode !== 'POST') {
            return Pages::methodeNonAutorisee('GET, POST');
        }

        $unClic = ($post['List-Unsubscribe'] ?? '') === 'One-Click';
        $jeton = $post['jeton'] ?? ($get['jeton'] ?? null);
        if (!App::jetonValide($jeton)) {
            return $unClic ? Reponse::texte(400, 'Lien invalide') : Pages::lienInvalide();
        }
        $app->db->prepare('DELETE FROM inscriptions WHERE jeton_desinscription = ?')->execute([$jeton]);
        return $unClic ? Reponse::texte(200, 'Désinscription effectuée') : Reponse::redirection($app->url('desinscrit.html'));
    }
}
