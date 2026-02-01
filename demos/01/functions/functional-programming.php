<?php
//Functions as first class citizens can be used just like variables.
//Define a function.
function sendGreeting($name)
{
    echo "Hello "  . $name . PHP_EOL;
}
//Assign the function to a variable.
$greet1 = "sendGreeting";
//Call the function via the variable.
$greet1("Gabriel");

//Anonymous functions have no name. They are also known as closures.
//Anonymous functions can be assigned to variables.
$greet2 = function ($name) {
    echo "Hello "  . $name . PHP_EOL;
};

//The following lines call the anonymous function.
$greet2("Max");
$greet2("Sonja");

//Functions of higher order have other functions as parameter or
//return value.
function call($function)
{
    $function("Peter");
}

//Call the higher order function.
//...use a named function
call("sendGreeting");

//...use an anonymous function assigned to a variable
call($greet2);

//...use an anonymous function
call(function ($name) {
    echo "Good Morning " . $name . PHP_EOL;
});
