<?php
//A function can be called before it is defined. Hence the following call works.
echo "Function call before definition:" . PHP_EOL;
echo addTwoNumbers(2, 3) . PHP_EOL;

function addTwoNumbers($a, $b)
{
    return $a + $b;
}

//It can (of course!) also be called after it is defined.
echo "Function call after definition:" . PHP_EOL;
echo addTwoNumbers(4, 5) . PHP_EOL;

//Exception: Functions defined in a conditional manner can only be called after the definition has been processed.
echo "Conditional functions:" . PHP_EOL;
$createFunction1 = false;
$createFunction2 = true;

if ($createFunction1) {
    function function1()
    {
        echo "This line is created by function1" . PHP_EOL;
    }
}

if ($createFunction2) {
    function function2()
    {
        echo "This line is created by function2" . PHP_EOL;
    }
}

//Function1 cannot be called, since the definition has not been processed.
//function1();
//Function2 can be called.
function2();

//A function in a function has global scope!
echo "Functions in functions:" . PHP_EOL;

function outerFunction()
{
    function innerFunction()
    {
        echo "This line is created by innerFunction" . PHP_EOL;
    }

    innerFunction();
}

//innerFunction can be called (also) outside outerFunction. 
//But be careful: This only works after calling outFunction (see conditional functions).
outerFunction();
innerFunction();
