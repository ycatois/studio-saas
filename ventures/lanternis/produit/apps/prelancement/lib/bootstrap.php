<?php
/*
 * Lanternis · liste d'attente de pré-lancement · amorçage.
 * PHP 8.2+, sans framework ni dépendance Composer. Extensions : pdo_sqlite, curl (mode mailjet).
 */
declare(strict_types=1);

namespace Lanternis\Prelancement;

ini_set('display_errors', '0');
ini_set('log_errors', '1');

require __DIR__ . '/Config.php';
require __DIR__ . '/Base.php';
require __DIR__ . '/Http.php';
require __DIR__ . '/Formulaire.php';
require __DIR__ . '/Autodiag.php';
require __DIR__ . '/Limiteur.php';
require __DIR__ . '/Mailer.php';
require __DIR__ . '/Gabarits.php';
require __DIR__ . '/Pages.php';
require __DIR__ . '/App.php';
require __DIR__ . '/Purge.php';
require __DIR__ . '/ListeAttente.php';
require __DIR__ . '/Confirmation.php';
require __DIR__ . '/Desinscription.php';

/**
 * Point d'entrée commun des scripts publics : construit l'application, appelle le
 * traitement et émet la réponse. Toute exception est journalisée sans détail pour
 * le visiteur (aucune fuite d'information) ; $secours fournit la réponse de repli.
 *
 * @param callable(App):Reponse $traitement
 * @param callable():Reponse $secours
 */
function executer(callable $traitement, callable $secours): void
{
    try {
        $app = App::depuisConfiguration();
        $reponse = $traitement($app);
    } catch (\Throwable $e) {
        error_log('[lanternis-prelancement] ' . get_class($e) . ' : ' . $e->getMessage()
            . ' (' . basename($e->getFile()) . ':' . $e->getLine() . ')');
        $reponse = $secours();
    }
    Http::emettre($reponse);
}
