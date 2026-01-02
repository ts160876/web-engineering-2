<?php
//Anonymous functions have no name. They are also known as closures.
//Anonymous functions can be assigned to variables.
$greet = function ($name) {
    echo "Hello "  . $name . PHP_EOL;
};

function call($function)
{
    $function("Peter");
}

//The following lines call the anonymous function.
$greet("Max");
$greet("Sonja");

//An anonymous function can also be passed to another function.
//...either via the variable it is assigned to
call($greet);

//...or directly as shown in the following example
call(function ($name) {
    echo "Good Morning " . $name . PHP_EOL;
});
