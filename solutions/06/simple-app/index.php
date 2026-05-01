<?php

//Ensure that errors are propagated to help with troubleshooting.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Router.php');
require_once('AnimalController.php');
require_once('SpeciesController.php');

//Need a session for the flash memory to work.
session_start();

try {
    $router = new Solution6\Router();

    //Animals
    $router->registerGet('/animals/create', [Solution6\AnimalController::class, 'createAnimal']);
    $router->registerPost('/animals/create', [Solution6\AnimalController::class, 'save']);
    $router->registerGet('/animals/edit', [Solution6\AnimalController::class, 'editAnimal']);
    $router->registerPost('/animals/edit', [Solution6\AnimalController::class, 'save']);

    //Species
    $router->registerGet('/species/create', [Solution6\SpeciesController::class, 'createSpecies']);
    $router->registerPost('/species/create', [Solution6\SpeciesController::class, 'save']);
    $router->registerGet('/species/edit', [Solution6\SpeciesController::class, 'editSpecies']);
    $router->registerPost('/species/edit', [Solution6\SpeciesController::class, 'save']);

    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_SERVER['SCRIPT_NAME']);
} catch (Exception $e) {
    http_response_code(404);
    echo $e->getMessage();
}
