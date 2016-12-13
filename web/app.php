<?php
use Silex\Application;

require __DIR__ . '/../vendor/autoload.php';

ini_set('date.timezone', 'Europe/Paris');

$app = new Application();
$app['debug'] = true;


// ROUTES
$app->get('/', 'Bookify\Controller\DummyController::get');
$app->post('/analyze', 'Bookify\Controller\AnalyzerController::post');
// END ROUTES


$app->run();
