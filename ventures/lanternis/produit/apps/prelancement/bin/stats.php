<?php
/*
 * Lanternis · compteurs de la liste d'attente (source de vérité des inscriptions,
 * validation.md § 7.2, point 9), par source, variante, public et qualification ; répartition par
 * palier et part d'intention d'essai (grille D, validation.md v2 § 6.3 et § 7.1).
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

// Grille D : intérêt par palier et intention d'essai (déclarations facultatives).
$pct = static fn($n, $d): string => $d > 0 ? sprintf('%d %%', (int) round(100 * $n / $d)) : '-';
$conf = "statut = 'confirme'";
$g = $db->query("SELECT COUNT(*) AS n, SUM(essai) AS e, SUM(qualifie AND essai) AS qe FROM inscriptions WHERE $conf")->fetch();
printf("\nIntention d'essai (confirmées) : %d sur %d (%s) ; qualifiées avec intention d'essai : %d\n",
    $g['e'] ?? 0, $g['n'], $pct($g['e'] ?? 0, $g['n']), $g['qe'] ?? 0);

printf("\nPar palier (confirmées)\n%-16s %10s %8s %10s\n", 'palier', 'confirmées', 'essai', 'qualifiées');
foreach ($db->query("SELECT COALESCE(palier, '(non renseigné)') AS p, COUNT(*) AS n, SUM(essai) AS e, SUM(qualifie) AS q
    FROM inscriptions WHERE $conf GROUP BY palier ORDER BY palier") as $l) {
    printf("%-16s %10d %8s %10d\n", $l['p'], $l['n'], $pct($l['e'], $l['n']), $l['q']);
}

printf("\nPar variante et source (confirmées)\n%-8s %-14s %10s %9s %9s %8s %9s %8s\n",
    'variante', 'source', 'confirmées', 'essentiel', 'pilotage', 'pilot.+', 'ne-sait', 'essai');
foreach ($db->query("SELECT variante, source, COUNT(*) AS n,
        SUM(palier = 'essentiel') AS pe, SUM(palier = 'pilotage') AS pp, SUM(palier = 'pilotage-plus') AS ppp,
        SUM(palier = 'ne-sait-pas') AS pn, SUM(essai) AS e
    FROM inscriptions WHERE $conf GROUP BY variante, source ORDER BY variante, source") as $l) {
    printf("%-8s %-14s %10d %9d %9d %8d %9d %8s\n", $l['variante'], $l['source'], $l['n'],
        $l['pe'] ?? 0, $l['pp'] ?? 0, $l['ppp'] ?? 0, $l['pn'] ?? 0, $pct($l['e'], $l['n']));
}
