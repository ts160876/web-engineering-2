<?php

require_once('Router.php');
require_once('HomeController.php');
require_once('AnimalController.php');
require_once('EnclosureController.php');

try {
    $router = new Router3\Router();

    //Homepage
    $router->registerGet('/', [Router3\HomeController::class, 'index']);

    //Animals
    $router->registerGet('/animals', [Router3\AnimalController::class, 'index']);
    $router->registerGet('/animals/create', [Router3\AnimalController::class, 'create']);
    $router->registerPost('/animals/create', [Router3\AnimalController::class, 'handleCreate']);

    //Enclosures
    $router->registerGet('/enclosures', [Router3\EnclosureController::class, 'index']);

    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_SERVER['SCRIPT_NAME']);
} catch (Exception $e) {
    http_response_code(404);
    echo $e->getMessage();
}
