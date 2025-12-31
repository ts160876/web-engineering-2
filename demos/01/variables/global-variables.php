<?php
//Define a global variable.
$globalVariable = 5;

function someFunction()
{
    //Create a local and a static variable.
    $a = 0;
    static $b = 0;
}

function aFunctionAccessingGlobals()
{
    //The global variable is undefined inside function.   
    //echo $globalVariable;
    //It can be accessed via $GLOBALS though.
    echo "Accessing a global variable in a function via the \$GLOBALS array: " . $GLOBALS["globalVariable"];
}

//$GLOBALS references all variables in global scope.
//Iterate over it.
foreach ($GLOBALS as $key => $value) {
    echo $key . " of type " . gettype($value) . PHP_EOL;
}

aFunctionAccessingGlobals();
echo $globalVariable;
