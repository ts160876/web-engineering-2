<?php
//If you add () to a variable name, then PHP will try to call a function with the name the variable evaluates to.
$f1 = "function1";
$f2 = "function2";

function function1()
{
    echo "Function 1 was called" . PHP_EOL;
}

function function2($x)
{
    echo "Function 2 was called with " . $x . PHP_EOL;
}

//The following line calls function1.
$f1();
//The following lines calls function2 and passes a parameter.
$f2(5);
