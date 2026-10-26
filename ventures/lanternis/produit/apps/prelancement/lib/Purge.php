<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Durées de conservation (validation.md § 7.2, point 8 ; hypothèse à valider par juriste-rgpd) :
 *  - inscription non confirmée : supprimée 30 jours après sa création ;
 *  - inscription confirmée : supprimée 3 ans après le dernier contact de la personne ;
 *  - demande d'échange venue de l'autodiagnostic : supprimée 12 mois après la demande
 *    (clause du formulaire, conformite-prelancement.md § 4.2) ;
 *  - traces de limitation de débit (IP hachées) : supprimées après 1 heure (≤ 24 h exigé).
 * Appelée à chaque envoi du formulaire et par le cron (bin/purge.php).
 */
final class Purge
{
    public const JOURS_NON_CONFIRMEE = 30;
    public const ANS_CONFIRMEE = 3;
    public const MOIS_ECHANGE_AUTODIAG = 12;

    /** @return array{non_confirmees:int,confirmees_expirees:int,echanges_expires:int,limites:int} */
    public static function executer(\PDO $db, int $maintenant): array
    {
        $limiteNonConfirmee = Base::date($maintenant - self::JOURS_NON_CONFIRMEE * 86400);
        $limiteConfirmee = (new \DateTimeImmutable('@' . $maintenant))
            ->modify('-' . self::ANS_CONFIRMEE . ' years')->format('Y-m-d H:i:s');

        $a = $db->prepare("DELETE FROM inscriptions WHERE statut = 'en_attente' AND cree_le < ?");
        $a->execute([$limiteNonConfirmee]);
        $b = $db->prepare("DELETE FROM inscriptions WHERE statut = 'confirme' AND dernier_contact_le < ?");
        $b->execute([$limiteConfirmee]);
        $limiteEchange = (new \DateTimeImmutable('@' . $maintenant))
            ->modify('-' . self::MOIS_ECHANGE_AUTODIAG . ' months')->format('Y-m-d H:i:s');
        $e = $db->prepare("DELETE FROM inscriptions WHERE echange_origine = 'autodiag' AND echange_le < ?");
        $e->execute([$limiteEchange]);
        $c = $db->prepare('DELETE FROM limites WHERE ts <= ?');
        $c->execute([$maintenant - Limiteur::FENETRE]);
        return [
            'non_confirmees' => $a->rowCount(),
            'confirmees_expirees' => $b->rowCount(),
            'echanges_expires' => $e->rowCount(),
            'limites' => $c->rowCount(),
        ];
    }
}
