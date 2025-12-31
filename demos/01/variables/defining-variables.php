<?php
//Define a simple variable (integer).
$aVariable = 4;
echo $aVariable . PHP_EOL;
echo gettype($aVariable) . PHP_EOL;

//Change the type of the variable (string).
$aVariable = "Formerly this was the number 4." . PHP_EOL;
echo $aVariable;
echo gettype($aVariable) . PHP_EOL;

//Create a reference (by using &).
$bVariable = &$aVariable;

//Now change both variables with one assignment.
$aVariable = 7;
echo $aVariable . PHP_EOL;
echo $bVariable . PHP_EOL;

//And do it again.
$bVariable = 9;
echo $aVariable . PHP_EOL;
echo $bVariable . PHP_EOL;

//Use var_dump to get details about the variables.
echo var_dump($aVariable);
echo var_dump($bVariable);

//Destroy one of the variables.
//At this point in time, $bVariable stil points to the value 7. Hence, PHP's garbage collector does not free the memory.
unset($aVariable);
echo var_dump($aVariable);
echo var_dump($bVariable);

//Destroy the second variable.
//PHP's garbage collector can now free the memory occupied by the value 7.
unset($bVariable);
echo var_dump($aVariable);
echo var_dump($bVariable);
