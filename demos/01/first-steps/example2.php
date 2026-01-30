<?php

//Define a two variables and use them.
$myName = "Thorsten";
$myAge = 49;
echo "My name is $myName. I am $myAge years old." . PHP_EOL;

//Define a function.
function addNumbers($a, $b)
{
    return $a + $b;
}

//Use the function.
echo addNumbers(10, 20);
