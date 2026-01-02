<?php
//Arrow function are anonymous functions (which behave slightly differently compared to
//functions defined with the "normal" syntax).
$greet = fn($name) => "Hello "  . $name . PHP_EOL;

function call($function)
{
    echo $function("Peter");
}

//The following lines call the anonymous function.
echo $greet("Max");
echo $greet("Sonja");

//An anonymous function can also be passed to another function.
//...either via the variable it is assigned to
call($greet);

//...or directly as shown in the following example
echo call(fn($name) => "Good Morning " . $name . PHP_EOL);
