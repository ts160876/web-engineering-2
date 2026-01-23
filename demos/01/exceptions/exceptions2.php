<?php
//This example is slightly more complicated. We define our own exception classes.
class Exception1 extends Exception {};
class Exception2 extends Exception {};
class Exception3 extends Exception {};

//First function
function doSomething1($throwException)
{
    if ($throwException) {
        throw new Exception1();
    }
}

//Second function
function doSomething2($throwException)
{
    if ($throwException) {
        throw new Exception2();
    }
}


//Third function
function doSomething3($throwException)
{
    if ($throwException) {
        throw new Exception3();
    }
}

//Function calling the other functions
function doManyThings($throwException1, $throwException2, $throwException3)
{
    try {
        doSomething1($throwException1);
        doSomething2($throwException2);
        doSomething3($throwException3);
    } catch (Exception1 | Exception2 $e) {
        echo "Exception1 and Exception2 are caught inside doManyThings()." . PHP_EOL;
    }
}

//First exception is raised.
try {
    doManyThings(true, false, false);
} catch (Exception3 $e) {
    echo "Exception3 is caught outside doManyThings()." . PHP_EOL;
}

//Second exception is raised.
try {
    doManyThings(false, true, false);
} catch (Exception3 $e) {
    echo "Exception3 is caught outside doManyThings()." . PHP_EOL;
}

//Third exception is raised.
try {
    doManyThings(false, false, true);
} catch (Exception3 $e) {
    echo "Exception3 is caught outside doManyThings()." . PHP_EOL;
}
