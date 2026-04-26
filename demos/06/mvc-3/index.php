<?php

use mvc3\AnimalModel;
use mvc3\AnimalView;

//Ensure that errors are propagated to help with troubleshooting.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'AnimalModel.php';
include_once 'AnimalView.php';

$animal = AnimalModel::select(1);
$view = new AnimalView($animal);
echo $view->render(AnimalView::EDIT);
