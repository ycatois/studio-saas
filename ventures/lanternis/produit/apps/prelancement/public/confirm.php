<?php
/* Lanternis · liste d'attente : confirmation de l'adresse (double opt-in). Logique : ../lib/Confirmation.php */
declare(strict_types=1);

require (getenv('LANTERNIS_APP_DIR') ?: dirname(__DIR__)) . '/lib/bootstrap.php';

use Lanternis\Prelancement as L;

L\executer(
    static fn(L\App $app): L\Reponse => L\Confirmation::traiter($app, $_SERVER, $_GET, $_POST),
    static fn(): L\Reponse => L\Pages::erreurTechnique(),
);
