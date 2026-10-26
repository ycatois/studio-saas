<?php
/*
 * Lanternis · compteurs de la liste d'attente (source de vérité des inscriptions,
 * validation.md § 7.2, point 9), par source, variante, public et qualification.
 *   php bin/stats.php
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

$total = $db->query("SELECT COUNT(*) AS envoyees, SUM(statut = 'confirme') AS confirmees,
    SUM(qualifie) AS qualifiees, SUM(statut = 'confirme' AND echange = 1) AS echanges,
    SUM(statut = 'confirme' AND nouvelles = 1) AS nouvelles FROM inscriptions")->fetch();
printf("Inscriptions envoyées (non expirées) : %d\nConfirmées : %d\nQualifiées (confirmées) : %d\n"
    . "Demandes d'échange confirmées : %d\nAccord pour les nouvelles (confirmé) : %d\n\n",
    $total['envoyees'], $total['confirmees'] ?? 0, $total['qualifiees'] ?? 0, $total['echanges'] ?? 0, $total['nouvelles'] ?? 0);

printf("%-14s %-8s %-6s %9s %10s %9s\n", 'source', 'variante', 'public', 'envoyées', 'confirmées', 'qualifiées');
$st = $db->query("SELECT source, variante, public, COUNT(*) AS n, SUM(statut = 'confirme') AS c, SUM(qualifie) AS q
    FROM inscriptions GROUP BY source, variante, public ORDER BY source, variante, public");
foreach ($st as $l) {
    printf("%-14s %-8s %-6s %9d %10d %9d\n", $l['source'], $l['variante'], $l['public'], $l['n'], $l['c'], $l['q']);
}
