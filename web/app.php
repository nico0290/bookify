<?php
use Silex\Application;

require __DIR__ . '/../vendor/autoload.php';

ini_set('date.timezone', 'Europe/Paris');

$app = new Application();


// ROUTES
$app->get('/', 'Bookify\Controller\DummyController::get');
// END ROUTES


$app->run();
