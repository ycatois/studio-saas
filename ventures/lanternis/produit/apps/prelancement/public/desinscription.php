<?php
/* Lanternis · liste d'attente : désinscription en un clic. Logique : ../lib/Desinscription.php */
declare(strict_types=1);

require (getenv('LANTERNIS_APP_DIR') ?: dirname(__DIR__)) . '/lib/bootstrap.php';

use Lanternis\Prelancement as L;

L\executer(
    static fn(L\App $app): L\Reponse => L\Desinscription::traiter($app, $_SERVER, $_GET, $_POST),
    static fn(): L\Reponse => L\Pages::erreurTechnique(),
);
