<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Barème de l'autodiagnostic (autodiagnostic.md § 3), recalculé côté serveur pour contrôler
 * un résultat joint à une demande d'échange et rédiger l'email de suite.
 * Même logique que public/assets/autodiagnostic.js (le calcul affiché reste dans le navigateur).
 */
final class Autodiag
{
    /** Questions (numérotées de 1 à 10) par axe. */
    public const AXES = [
        'avez' => [1, 5, 6],
        'payez' => [2, 8],
        'echeance' => [3, 9],
        'continuite' => [4, 7, 10],
    ];
    /** Ordre de priorité en cas d'égalité (autodiagnostic.md § 3). */
    public const ORDRE_EGALITE = ['continuite', 'echeance', 'payez', 'avez'];

    public const LIBELLES_AXES = [
        'avez' => 'Ce que vous avez',
        'payez' => 'Ce que vous payez',
        'echeance' => 'Ce qui arrive à échéance',
        'continuite' => 'Continuité',
    ];
    public const LIBELLES_PROFILS = [
        'boite-noire' => 'Informatique en boîte noire',
        'penombre' => 'Pénombre',
        'carte-a-completer' => 'Carte à compléter',
        'bien-eclaire' => 'Bien éclairé',
    ];
    /** Première action selon l'axe prioritaire (autodiagnostic.md § 4). */
    public const ACTIONS_AXES = [
        'avez' => 'Faites la liste de vos comptes administrateur (messagerie, nom de domaine, site, sauvegardes) et de qui les détient. Rangez-la en lieu sûr, accessible à la direction.',
        'payez' => 'Exportez de votre comptabilité les dépenses informatiques des 12 derniers mois et classez-les : matériel, logiciels, prestataires, télécoms.',
        'echeance' => 'Listez vos cinq plus gros contrats informatiques avec leur date de préavis, et mettez un rappel deux mois avant chacune.',
        'continuite' => 'Bloquez une heure avec votre référent ou votre prestataire pour écrire ensemble ce que vous avez, ce que vous payez et ce qui arrive à échéance.',
    ];
    public const ACTION_BIEN_ECLAIRE = 'Vérifiez que la documentation ne dépend pas d\'une seule personne.';

    public static function score(string $reponses): int
    {
        return array_sum(array_map('intval', str_split($reponses)));
    }

    public static function profil(int $score): string
    {
        return match (true) {
            $score <= 9 => 'boite-noire',
            $score <= 17 => 'penombre',
            $score <= 24 => 'carte-a-completer',
            default => 'bien-eclaire',
        };
    }

    /** @return array<string,array{score:int,max:int}> */
    public static function axes(string $reponses): array
    {
        $r = array_map('intval', str_split($reponses));
        $res = [];
        foreach (self::AXES as $axe => $questions) {
            $s = 0;
            foreach ($questions as $q) {
                $s += $r[$q - 1] ?? 0;
            }
            $res[$axe] = ['score' => $s, 'max' => 3 * count($questions)];
        }
        return $res;
    }

    public static function axePrioritaire(string $reponses): string
    {
        $axes = self::axes($reponses);
        $meilleur = null;
        $taux = INF;
        foreach (self::ORDRE_EGALITE as $axe) {
            $t = $axes[$axe]['score'] / $axes[$axe]['max'];
            if ($t < $taux) { // strictement inférieur : l'ordre d'égalité est respecté
                $taux = $t;
                $meilleur = $axe;
            }
        }
        return (string) $meilleur;
    }

    /** Première action : celle de l'axe prioritaire ; pour « Bien éclairé », seulement si un axe est sous 70 %. */
    public static function premiereAction(string $reponses): string
    {
        $axe = self::axePrioritaire($reponses);
        if (self::profil(self::score($reponses)) === 'bien-eclaire') {
            $a = self::axes($reponses)[$axe];
            if ($a['score'] / $a['max'] >= 0.7) {
                return self::ACTION_BIEN_ECLAIRE;
            }
        }
        return self::ACTIONS_AXES[$axe];
    }
}
