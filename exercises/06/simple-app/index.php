<?php

//Ensure that errors are propagated to help with troubleshooting.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Router.php');
require_once('AnimalController.php');

//Need a session for the flash memory to work.
session_start();

try {
    $router = new Exercise6\Router();

    //Animals
    $router->registerGet('/animals/create', [Exercise6\AnimalController::class, 'createAnimal']);
    $router->registerPost('/animals/create', [Exercise6\AnimalController::class, 'save']);
    $router->registerGet('/animals/edit', [Exercise6\AnimalController::class, 'editAnimal']);
    $router->registerPost('/animals/edit', [Exercise6\AnimalController::class, 'save']);


    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_SERVER['SCRIPT_NAME']);
} catch (Exception $e) {
    http_response_code(404);
    echo $e->getMessage();
}
