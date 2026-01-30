<?php
//PHP is a dynamically typed language. Therefore it is not necessary to specify the type of a variable.
//However, it is possible to statically type some aspects of the language:
//- function parameters
//- return values
//- class properties and constants
//We are looking at the most important types here.

//bool (scalar type)
echo "bool (scalar type):" . PHP_EOL;
echo "===================" . PHP_EOL;
$aBool = true;
var_dump($aBool);

//int (scalar type)
echo "int (scalar type):" . PHP_EOL;
echo "==================" . PHP_EOL;
$anInt = 1000;
$anotherInt = 2000;
var_dump($anInt);
var_dump($anotherInt);
echo "Integer division can lead to a float." . PHP_EOL;
var_dump($anInt / $anotherInt);
echo "To avoid this, you can use intdiv." . PHP_EOL;
var_dump(intdiv($anInt, $anotherInt));

//float (scalar type)
echo "float (scalar type):" . PHP_EOL;
echo "====================" . PHP_EOL;
$aFloat = 0.1;
$anotherFloat = 0.2;
var_dump($aFloat);
var_dump($anotherFloat);
echo "Be aware of floating point precision." . PHP_EOL;
var_dump($aFloat + $anotherFloat);
var_dump($aFloat + $anotherFloat == 0.3 ? true : false);
echo "The result of a floating point operations can be NAN." . PHP_EOL;
var_dump(sqrt(-1.0)); //square root of a negative number not defined
echo "The result of a floating point operations can be INF." . PHP_EOL;
var_dump(exp(1000)); //larger than the maximum value for float in PHP

//string (scalar type)
echo "string (scalar type):" . PHP_EOL;
echo "=====================" . PHP_EOL;
$aString = 'Peter';
echo "You can use single quotes." . PHP_EOL;
echo 'I\'ll call $aName.' . PHP_EOL; //A literal quote can be escaped. Variables do NOT expand. 
echo 'After this \n should be a line break.' . PHP_EOL; //Escape sequences do NOT work.
echo "You can use double quotes." . PHP_EOL;
echo "I'll call $aString." . PHP_EOL; //A literal quote does NOT have to be escaped. Variables do expand.
echo "After this \n should be a line break." . PHP_EOL; //Escape sequences work.

//array - see array.php

//object - see classes subfolder