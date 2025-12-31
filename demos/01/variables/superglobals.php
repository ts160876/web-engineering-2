<?php
//Superglobals are available in all scopes.
//To access them, it is NOT necessary to create a local variable which references the global one.

function someFunction()
{
    echo $GLOBALS . PHP_EOL;
    echo $_SERVER . PHP_EOL;
    echo $_GET . PHP_EOL;
    echo $_POST . PHP_EOL;
    echo $_FILES . PHP_EOL;
    echo $_COOKIE . PHP_EOL;
    //echo $_SESSION . PHP_EOL;
    echo $_REQUEST . PHP_EOL;
    echo $_ENV . PHP_EOL;
}

someFunction();
