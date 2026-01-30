<?php
//Define a global variable.
$globalVariable = 5;

function aFunction()
{
    //Define a local variable (scope of aFunction).
    $localVariableA = 6;
    echo $localVariableA . PHP_EOL;
    //VariableB is undefined in scope of aFunction.
    //echo $localVariableB . PHP_EOL;
    //The global variable is undefined inside function.
    //echo $globalVariable . PHP_EOL;
}

function bFunction()
{
    //Define a local variable (scope of bFunction).
    $localVariableB = 7;
    echo $localVariableB . PHP_EOL;
    //VariableA is undefined in scope of bFunction.
    //echo $localVariableA . PHP_EOL;
    //The global variable is undefined inside function.
    //echo $globalVariable . PHP_EOL;
}

function cFunction()
{
    //Define a local variable which references the global one.
    //If a global variable with the name does not exist, it is created and assigned null.
    global $globalVariable;
    echo $globalVariable . PHP_EOL;
    //The following line changes the global variable.
    $globalVariable = 99;
    //Also the $GLOBALS arrays can be used to access the global variable.
    echo  $GLOBALS["globalVariable"] . PHP_EOL;
}

function dFunction()
{
    //A static variable (in local scope) is initialized only once (in this case with 0).
    //It does not lose its value when the program leaves the scope (in this case dFunction).
    static $localVariableD = 0;
    echo ++$localVariableD . PHP_EOL;
}

echo $globalVariable . PHP_EOL;
aFunction();
bFunction();
cFunction();
echo $globalVariable . PHP_EOL;
dFunction();
dFunction();
dFunction();
