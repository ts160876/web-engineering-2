<?php
//Define a variable (integer).
$aVariable = 5;

//Define a second variable (string).
$bVariableName = "bVariable";
//Use the value of this variable to define a third variable which has the name of the value of the second variable.
$$bVariableName = 6;

echo $aVariable . PHP_EOL;
echo $bVariableName . PHP_EOL;
echo $$bVariableName . PHP_EOL;
//Yes. $bVariable does "really" exists.
echo $bVariable . PHP_EOL;

//Ask the user which variable they like to access.
echo "Enter the variable you like to access (without $): ";
$input = trim(fgets(STDIN));
//Then access this variable.
echo $input . " has the value " . $$input;
