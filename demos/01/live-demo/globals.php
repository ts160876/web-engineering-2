<?php
$x = 7;

function a()
{
    //echo $x . PHP_EOL;
}

function b()
{
    global $x;
    echo $x . PHP_EOL;
}

function c()
{
    echo $GLOBALS['x'] . PHP_EOL;
}

function d()
{
    $GLOBALS['x'] = 9;
}


function e()
{
    //$GLOBALS = [];
}

d();
c();
