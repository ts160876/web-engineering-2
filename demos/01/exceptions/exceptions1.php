<?php
//Similar to many other programming languages, PHP allows to define, throw and catch exceptions
//Here we show a very basic example.

function doSomething($throwException)
{
    echo "This text is from doSomething()." . PHP_EOL;
    if ($throwException) {
        throw new Exception("Something went wrong in doSomething()");
    }
}

//The following line is ok.
doSomething(false);

//The following line will lead to a runtime error "Uncaught Exception". Hence it is commented.
//doSomething(true);

//The catch block is not executed. The finally block is.
try {
    doSomething(false);
} catch (Exception $e) {
    echo "The exception was caught." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo "This try block was FINALLY ended. " . PHP_EOL;
}

//The catch block is executed. The finally block is as well. 
try {
    doSomething(true);
} catch (Exception $e) {
    echo "The exception was caught." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
} finally {
    echo "This try block was FINALLY ended. " . PHP_EOL;
}
