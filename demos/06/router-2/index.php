<?php

require_once('Router.php');
require_once('HomeController.php');
require_once('AnimalController.php');
require_once('EnclosureController.php');

$router = new Router2\Router();

//Homepage
$router->register('/', [Router2\HomeController::class, 'index']);

//Animals
$router->register('/animals', [Router2\AnimalController::class, 'index']);
$router->register('/animals/create', [Router2\AnimalController::class, 'create']);

//Enclosures
$router->register('/enclosures', [Router2\EnclosureController::class, 'index']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME']);
