<?php

function doSomething()
{
    //Define a static variable.
    static $a = 5;
    echo $a . PHP_EOL;
    $a++;
};

doSomething();
doSomething();
doSomething();
