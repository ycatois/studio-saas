<?php
/*
 * Lanternis · purge des données expirées (durées : lib/Purge.php).
 * À lancer par le cron de cPanel, toutes les heures :
 *   php /home/<utilisateur>/lanternis-prelancement/bin/purge.php
 */
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
require dirname(__DIR__) . '/lib/bootstrap.php';

use Lanternis\Prelancement as L;

$config = L\Config::charger();
$db = L\Base::ouvrir((string) $config['DB_PATH']);
$r = L\Purge::executer($db, time());
$db->exec('PRAGMA wal_checkpoint(TRUNCATE)');
fwrite(STDOUT, sprintf("purge : %d non confirmée(s), %d confirmée(s) expirée(s), %d demande(s) d'échange expirée(s), %d trace(s) de limitation\n",
    $r['non_confirmees'], $r['confirmees_expirees'], $r['echanges_expires'], $r['limites']));
