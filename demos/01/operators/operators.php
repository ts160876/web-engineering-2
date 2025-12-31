<?php
//Define a few variables to demonstrate various operators.
$aVariable = 4;
$bVariable = 5;
$cVariable = "Hello ";
$dVariable = "World";

//Arithmetic operators
echo "Arithmetic operators:" . PHP_EOL;
echo "a = " . $aVariable . PHP_EOL;
echo "b = " . $bVariable . PHP_EOL;
echo "a + b = " . $aVariable + $bVariable . PHP_EOL;
echo "a - b = " . $aVariable - $bVariable . PHP_EOL;
echo "a * b = " . $aVariable * $bVariable . PHP_EOL;
echo "a / b = " . $aVariable / $bVariable . PHP_EOL;
echo "a % b = " . $aVariable % $bVariable . PHP_EOL;
echo "a ** b = " . $aVariable ** $bVariable . PHP_EOL;

//Assignment operators (in addition to =, +=, -=...)
echo "Assignment operators:" . PHP_EOL;
$cVariable .= $dVariable;
echo $cVariable . PHP_EOL;
$dVariable = $cVariable = $bVariable = $aVariable = 6;
echo $aVariable . " " . $bVariable . " " . $cVariable . " " . $dVariable . PHP_EOL;

//Null coalescing operator
echo "Null coalescing operator:" . PHP_EOL;
$aVariable = null ?? 7;
echo $aVariable . PHP_EOL;
$aVariable = 8 ?? 9;
echo $aVariable . PHP_EOL;

//Spaceship operator
echo "Spaceship operator: " . PHP_EOL;
echo "1 <=> 2 = " . (1 <=> 2);
echo PHP_EOL;
echo "2 <=> 2 = " . (2 <=> 2);
echo PHP_EOL;
echo "3 <=> 2 = " . (3 <=> 2);
echo PHP_EOL;

//Logic operators
echo "Logical operators: " . PHP_EOL;
echo ((true and true) ? "true and true is true." : "true and true is false.") . PHP_EOL;
echo ((true and false) ? "true and false is true." : "true and false is false.") . PHP_EOL;
echo ((false and true) ? "false and true is true." : "false and true is false.") . PHP_EOL;
echo ((false and false) ? "false and false is true." : "false and false is false.") . PHP_EOL;
echo "You can also use &&, but the precedence will be different." . PHP_EOL;

echo ((true or true) ? "true or true is true." : "true or true is false.") . PHP_EOL;
echo ((true or false) ? "true or false is true." : "true or false is false.") . PHP_EOL;
echo ((false or true) ? "false or true is true." : "false or true is false.") . PHP_EOL;
echo ((false or false) ? "false or false is true." : "false or false is false.") . PHP_EOL;
echo "You can also use ||, but the precedence will be different." . PHP_EOL;

echo ((true xor true) ? "true xor true is true." : "true xor true is false.") . PHP_EOL;
echo ((true xor false) ? "true xor false is true." : "true xor false is false.") . PHP_EOL;
echo ((false xor true) ? "false xor true is true." : "false xor true is false.") . PHP_EOL;
echo ((false xor false) ? "false xor false is true." : "false xor false is false.") . PHP_EOL;

echo ((!true) ? "!true is true." : "!true is false.") . PHP_EOL;
echo ((!false) ? "!false is true." : "!false is false.") . PHP_EOL;

//Operator precedence... just one example by using
//More information: https://www.php.net/manual/en/language.operators.precedence.php
echo ((true or true and false) ? "true or true and false is true." : "true or true and false is false.") . PHP_EOL;
echo ((true || true and false) ? "true || true and false is true." : "true || true and false is false.") . PHP_EOL;
