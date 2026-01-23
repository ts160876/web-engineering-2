<?php
//PHP offers a wide range of array functions. We will only look at a few.
//We use the following arrays to explain them.
$animals = [
    "alligator" => 5,
    "bear" => 3,
    "camel" => 7,
    "cheetah" => 1,
    "elephant" => 12,
    "iguana" => 4,
    "snake" => 13,
];
$mammals = ["Bear", "Camel", "Cheetah", "Elephant"];
$reptiles = ["Alligator", "Iguana", "Snake"];

//array_push(), array_pop()
echo "array_push(), array_pop(): Modify the end of an array" . PHP_EOL;
echo "=====================================================" . PHP_EOL;
array_push($mammals, "Giraffe");
array_push($mammals, "Hippo", "Hyena");
var_dump($mammals);
array_pop($mammals);
array_pop($mammals);
array_pop($mammals);
var_dump($mammals);

//array_unshift(), array_shift()
echo "array_unshift(), array_shift(): Modify the end of an array" . PHP_EOL;
echo "=====================================================" . PHP_EOL;
array_unshift($mammals, "Monkey");
var_dump($mammals);
array_shift($mammals);
var_dump($mammals);

//array_map()
echo "array_map(): Apply a functtion to every element" . PHP_EOL;
echo "===============================================" . PHP_EOL;
function buyAnimal($x)
{
    return $x + 1;
}
var_dump($animals);
$animals2 = array_map("buyAnimal", $animals);
var_dump($animals2);
//This also works with anonymous functions.
$animals2 = array_map(fn($x) => $x - 1, $animals);
var_dump($animals2);

//array_filter()
echo "array_filter(): Filter elements" . PHP_EOL;
echo "===============================" . PHP_EOL;
$animals2 = array_filter($animals, fn($x) => $x >= 10 ? true : false);
var_dump($animals2);

//array_reduce()
echo "array_reduce(): Reduce the array to a single value" . PHP_EOL;
echo "==================================================" . PHP_EOL;
var_dump(array_reduce($animals, fn($sum, $x) => $sum + $x, 0));

//count()
echo "count(): Count all elements in an array" . PHP_EOL;
echo "=======================================" . PHP_EOL;
var_dump(count($animals));

//in_array()
echo "in_array(): Check if a value exists" . PHP_EOL;
echo "===================================" . PHP_EOL;
var_dump(in_array("Alligator", $mammals));
var_dump(in_array("Alligator", $reptiles));

//array_key_exists()
echo "array_key_exists(): Check if a key exists" . PHP_EOL;
echo "=========================================" . PHP_EOL;
var_dump(array_key_exists("alligator", $animals));
var_dump(array_key_exists("butterfly", $animals));

//array_merge()
echo "array_merge(): Merge arrays" . PHP_EOL;
echo "===========================" . PHP_EOL;
var_dump(array_merge($mammals, $reptiles));

//array_values()
echo "array_values: Values in the array" . PHP_EOL;
echo "=================================" . PHP_EOL;
var_dump(array_values($animals));

//array_keys()
echo "array_keys: Keys in the array" . PHP_EOL;
echo "=============================" . PHP_EOL;
var_dump(array_keys($animals));

//sort()
echo "sort(): Sort by value, lose keys" . PHP_EOL;
echo "================================" . PHP_EOL;
$animals2 = $animals;
sort($animals2);
var_dump($animals2);

//asort()
echo "asort(): Sort by value, keep keys" . PHP_EOL;
echo "=================================" . PHP_EOL;
$animals2 = $animals;
asort($animals2);
var_dump($animals2);

//ksort()
echo "ksort(): Sort by key (we sort descendng here - krsort)" . PHP_EOL;
echo "======================================================" . PHP_EOL;
$animals2 = $animals;
krsort($animals2);
var_dump($animals2);
