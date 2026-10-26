<?php
declare(strict_types=1);

namespace Lanternis\Prelancement;

/**
 * Limitation de débit à fenêtre glissante, stockée dans SQLite.
 * Les clés d'IP sont des HMAC-SHA256 avec un sel secret : l'IP n'est jamais écrite en clair.
 * Les entrées de plus d'une heure sont purgées (Purge::executer).
 */
final class Limiteur
{
    public const FENETRE = 3600;

    public static function cleIp(string $ip, string $sel): string
    {
        return 'ip:' . hash_hmac('sha256', $ip, $sel);
    }

    /** Enregistre une tentative si la limite n'est pas atteinte ; renvoie false sinon. */
    public static function autoriser(\PDO $db, string $cle, int $max, int $maintenant, int $fenetre = self::FENETRE): bool
    {
        $db->exec('BEGIN IMMEDIATE');
        try {
            $st = $db->prepare('SELECT COUNT(*) FROM limites WHERE cle = ? AND ts > ?');
            $st->execute([$cle, $maintenant - $fenetre]);
            if ((int) $st->fetchColumn() >= $max) {
                $db->exec('COMMIT');
                return false;
            }
            $db->prepare('INSERT INTO limites (cle, ts) VALUES (?, ?)')->execute([$cle, $maintenant]);
            $db->exec('COMMIT');
            return true;
        } catch (\Throwable $e) {
            $db->exec('ROLLBACK');
            throw $e;
        }
    }
}
