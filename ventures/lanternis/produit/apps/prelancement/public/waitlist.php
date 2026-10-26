<?php
/* Lanternis · liste d'attente : réception du formulaire (POST). Logique : ../lib/ListeAttente.php */
declare(strict_types=1);

require (getenv('LANTERNIS_APP_DIR') ?: dirname(__DIR__)) . '/lib/bootstrap.php';

use Lanternis\Prelancement as L;

L\executer(
    static fn(L\App $app): L\Reponse => L\ListeAttente::traiter($app, $_SERVER, $_POST),
    static fn(): L\Reponse => L\Reponse::redirection('erreur.html?code=technique'),
);
