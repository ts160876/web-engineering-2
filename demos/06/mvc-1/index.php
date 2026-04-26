<?php

use mvc1\AnimalModel;

//Ensure that errors are propagated to help with troubleshooting.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'AnimalModel.php';

$animalModel = new AnimalModel();

$animals = $animalModel->selectAll();
foreach ($animals as $animal) {
    echo '<p>' . $animal['animalName'] . '</p>';
}
