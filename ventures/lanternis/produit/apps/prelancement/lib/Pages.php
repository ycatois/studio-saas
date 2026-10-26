<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Pages HTML minimales servies par les scripts (même gabarit que merci.html, confirme.html…).
 * Chemins relatifs : les scripts sont à la racine du site. Aucun style ni script en ligne (CSP).
 * Textes d'interface techniques : à relire par le pôle marketing (voir README, points ouverts).
 */
final class Pages
{
    public static function page(string $titre, string $contenu): string
    {
        $e = static fn(string $v): string => Gabarits::e($v);
        return '<!doctype html>' . "\n"
            . '<html lang="fr"><head><meta charset="utf-8">'
            . '<meta name="viewport" content="width=device-width, initial-scale=1">'
            . '<meta name="robots" content="noindex, nofollow">'
            . '<title>' . $e($titre) . ' · Lanternis</title>'
            . '<link rel="icon" href="assets/charte/logo/favicon.svg" type="image/svg+xml">'
            . '<link rel="stylesheet" href="assets/charte/tokens.css">'
            . '<link rel="stylesheet" href="assets/site.css">'
            . '</head><body>'
            . '<a class="evitement" href="#contenu">Aller au contenu</a>'
            . '<header class="entete zone-nuit"><div class="conteneur">'
            . '<a href="./"><img src="assets/charte/logo/logo-horizontal-nuit.svg" width="160" height="34" alt="Lanternis, accueil"></a>'
            . '</div></header>'
            . '<main id="contenu" tabindex="-1"><div class="conteneur texte page-courte">'
            . '<h1>' . $e($titre) . '</h1>' . $contenu
            . '</div></main>'
            . '<footer class="pied zone-nuit"><div class="conteneur">'
            . '<p>Lanternis est une marque d\'Hasteria SASU. Contact : <a href="mailto:contact@hasteria.net">contact@hasteria.net</a>.</p>'
            . '<ul><li><a href="mentions-legales.html">Mentions légales</a></li><li><a href="confidentialite.html">Politique de confidentialité</a></li></ul>'
            . '</div></footer>'
            . '</body></html>';
    }

    /** Formulaire d'un seul bouton (POST) : évite qu'un robot de messagerie qui suit les liens confirme ou désinscrive. */
    public static function formulaireBouton(string $action, string $jeton, string $libelle): string
    {
        return '<form method="post" action="' . Gabarits::e($action) . '">'
            . '<input type="hidden" name="jeton" value="' . Gabarits::e($jeton) . '">'
            . '<button class="bouton" type="submit">' . Gabarits::e($libelle) . '</button></form>';
    }

    public static function lienInvalide(): Reponse
    {
        return Reponse::html(404, self::page('Ce lien n\'est plus valide',
            '<p>Ce lien a peut-être déjà été utilisé, ou il a expiré (un lien de confirmation est valable 7 jours). '
            . 'Si vous avez déjà confirmé votre inscription, il n\'y a rien d\'autre à faire.</p>'
            . '<p><a href="./#liste-attente">Revenir à la page d\'accueil</a></p>'));
    }

    public static function erreurTechnique(): Reponse
    {
        return Reponse::html(500, self::page('Un incident technique est survenu',
            '<p>Votre demande n\'a pas pu être traitée. Réessayez dans quelques minutes ou écrivez à '
            . '<a href="mailto:contact@hasteria.net">contact@hasteria.net</a>.</p>'
            . '<p><a href="./">Revenir à la page d\'accueil</a></p>'));
    }

    public static function methodeNonAutorisee(string $autorisees): Reponse
    {
        return Reponse::html(405, self::page('Action non autorisée',
            '<p>Cette adresse ne s\'utilise pas de cette façon.</p><p><a href="./">Revenir à la page d\'accueil</a></p>'),
            ['Allow' => $autorisees]);
    }

    public static function interdit(): Reponse
    {
        return Reponse::html(403, self::page('Demande refusée',
            '<p>Votre demande n\'a pas pu être vérifiée. Envoyez le formulaire depuis notre site, sans le recopier ailleurs.</p>'
            . '<p><a href="./#liste-attente">Revenir au formulaire</a></p>'));
    }
}
