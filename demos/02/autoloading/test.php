<?php

use Farm\Farm;
use Farm\Animal\Horse;

//Create a simple autoloader.
spl_autoload_register(function ($class) {
    //This is the logic of our very simple autoloader.
    //Due to the same hierarchy used for the namespace and the filesystem, 
    //we can easily autoload the required classes. 
    $file =  str_replace('\\', '/', __DIR__ . '/' . $class) . '.php';
    require_once $file;
    echo "I autoloaded $class from $file." . PHP_EOL;
});

//Use the classes.
$farm = new Farm('My farm');
echo $farm->name . PHP_EOL;

$horse = new Horse();
echo $horse->name . PHP_EOL;
