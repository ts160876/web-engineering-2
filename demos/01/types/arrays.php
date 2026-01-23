<?php
//Arrays in PHP are ordered maps, which associate values to keys. 
//We will look at the basics of arrays in PHP.

//Define an ASSOCIATIVE array, i.e. an array that uses keys and values.
//... with the array() language construct
$associativeArray1 = array(
    "alligator" => "Here is an alligator.",
    "giraffe" => "Here is a giraffe.",
    "monkey" => "Here is a monkey.",
);
//... or alternatively with the short syntax
$associativeArray2 = [
    "alligator" => "Here is an alligator.",
    "giraffe" => "Here is a giraffe.",
    "monkey" => "Here is a monkey.",
];
echo "Definition of an associative array:" . PHP_EOL;
echo "===================================" . PHP_EOL;
var_dump($associativeArray1);
var_dump($associativeArray2);

//Define an INDEXED (NUMERIC) array, i.e. an array that uses values only.
//The keys are determined by PHP automatically based on the largest previously int key.
//As a consequence, the following arrays will have keys 0-2.
$indexedArray1 = array("Here is an alligator.", "Here is a giraffe.", "Here is a monkey.");
$indexedArray2 = ["Here is an alligator.", "Here is a giraffe.", "Here is a monkey."];
echo "Definition of an indexed array:" . PHP_EOL;
echo "===============================" . PHP_EOL;
var_dump($indexedArray1);
var_dump($indexedArray2);

//You can mix as you like. The keys have to be int or string, 
//and PHP will convert in case they are not.
$aMixedArray = [
    "This is the first entry.",
    "second" => "This is the second entry.",
    true => "This is the third entry.",
    "fourth" => "This is the fourth entry.",
    "This is the fifth entry.",
];
echo "Mixing entries with and without keys:" . PHP_EOL;
echo "=====================================" . PHP_EOL;
var_dump($aMixedArray);

//Arrays can be multi-dimensional. The example is a mixture of associative
//and indexed arrays. The "outer" array is associative. The "inner" arrays are
//indexed.
$arrayWithTwoDimenions = [
    "mammals" => ["Bear", "Camel", "Cheetah", "Elephant"],
    "reptiles" => ["Alligator", "Iguana", "Snake"],
];
echo "Multi-dimensional arrays:" . PHP_EOL;
echo "=========================" . PHP_EOL;
var_dump($arrayWithTwoDimenions);

//The square bracket syntax can be used to access as well as to create/modify
//array elements.
echo "Squre bracket syntax to access array elements:" . PHP_EOL;
echo "==============================================" . PHP_EOL;
var_dump($associativeArray1["giraffe"]);
var_dump($indexedArray1[0]);
var_dump($arrayWithTwoDimenions["mammals"][2]);

echo "Creating and modifying elements:" . PHP_EOL;
echo "================================" . PHP_EOL;
$associativeArray1["kangaroo"] = "Here is a kangaroo.";
$associativeArray1["monkey"] = $associativeArray1["monkey"] . " And it is naughty.";
var_dump($associativeArray1);
$indexedArray1[3] = "Here is a hippo.";
$indexedArray1[99] = "Here is a hyena.";
$indexedArray1[] = "Here is an iguana.";
var_dump($indexedArray1);

//To remove elements the unset() language construct can be used.
echo "Removing elements:" . PHP_EOL;
echo "==================" . PHP_EOL;
unset($indexedArray1[100]);
var_dump($indexedArray1);

//You can deconstruct arrays, that is extract values from an array into separate variables.
//... indexed arrays
[$a, $b, $c] = $indexedArray2;
echo "Deconstructing an indexed array:" . PHP_EOL;
echo "================================" . PHP_EOL;
var_dump($a);
var_dump($b);
var_dump($c);
var_dump($indexedArray2);

//...associative arrays
["alligator" => $d, "giraffe" => $e, "monkey" => $f] = $associativeArray2;
echo "Deconstructing an asssociative array:" . PHP_EOL;
echo "=====================================" . PHP_EOL;
var_dump($d);
var_dump($e);
var_dump($f);
var_dump($associativeArray2);
