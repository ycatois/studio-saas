<?php
/*
 * Lanternis · export CSV des inscriptions pour le fondateur (validation.md § 7.2, point 9).
 * Accès protégé par l'authentification SSH : aucun export par le web.
 * Aucune adresse IP (elles ne sont jamais stockées) ; aucun jeton.
 *   php bin/export.php [--confirmes] > liste-attente.csv
 * Le fichier produit contient des données personnelles : ne pas le versionner, le supprimer après usage.
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
$colonnes = ['email', 'email_generique', 'structure', 'type', 'effectif', 'douleur', 'douleur_autre',
    'nouvelles', 'nouvelles_le', 'nouvelles_version', 'echange', 'echange_le', 'echange_origine', 'palier', 'essai',
    'variante', 'public', 'source', 'score', 'profil', 'reponses', 'statut', 'qualifie',
    'version_mention', 'cree_le', 'confirme_le', 'dernier_contact_le'];
$sql = 'SELECT ' . implode(', ', $colonnes) . ' FROM inscriptions'
    . (in_array('--confirmes', $argv, true) ? " WHERE statut = 'confirme'" : '') . ' ORDER BY cree_le';

$sortie = fopen('php://stdout', 'wb');
fwrite($sortie, "\xEF\xBB\xBF"); // BOM : lecture correcte des accents par un tableur
fputcsv($sortie, $colonnes, ';', '"', '');
foreach ($db->query($sql) as $ligne) {
    // Neutralise l'injection de formules dans un tableur (=, +, -, @, tabulation, retour chariot).
    $ligne = array_map(static function ($v) {
        $v = (string) $v;
        return ($v !== '' && strpbrk($v[0], "=+-@\t\r") !== false) ? "'" . $v : $v;
    }, $ligne);
    fputcsv($sortie, $ligne, ';', '"', '');
}
