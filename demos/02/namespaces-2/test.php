<?php

//The require statements are needed (since we do not use an autoloader).
require_once './Zoo/Zoo.php';
require_once './Zoo/Enclosure/Enclosure.php';
require_once './Zoo/Animal/Reptile/Alligator.php';
require_once './Zoo/Animal/Mammal/Bear.php';

//The use statements define aliases.
use Zoo\Zoo;
use Zoo\Enclosure\Enclosure;
use Zoo\Animal\Mammal\Bear as B;

//Create an instance of Zoo.
$zoo = new Zoo('Frankfurt Zoo');
echo $zoo->name . PHP_EOL;

//Create an instance of Enclosure.
$enclosure = new Enclosure('Alligator Pond');
echo $enclosure->name . PHP_EOL;

//Create an instance of Alligator without use.
$alligator = new \Zoo\Animal\Reptile\Alligator();
echo $alligator->name . PHP_EOL;

//Create an instance of Bear with use and as.
$bear = new B();
echo $bear->name . PHP_EOL;
