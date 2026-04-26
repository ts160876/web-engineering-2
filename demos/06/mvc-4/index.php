<?php

use mvc4\AnimalController;


//Ensure that errors are propagated to help with troubleshooting.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'AnimalController.php';

$controller = new AnimalController();
$controller->handleRequest();
