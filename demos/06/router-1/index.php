<?php

require_once('Router.php');

$router = new Router1\Router();

//Homepage
$router->register('/', function () {
    return 'Welcome to our Zoo!';
});

//Animals
$router->register('/animals', function () {
    return 'Animals';
});

//Enclosures
$router->register('/enclosures', function () {
    return 'Enclosures';
});

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME']);
