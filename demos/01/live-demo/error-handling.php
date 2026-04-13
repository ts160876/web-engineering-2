<?php
//error_reporting(E_ALL);
//error_reporting(E_ERROR);
set_error_handler(function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
}, E_WARNING);

$x = 7;

function a()
{
    //echo $x . PHP_EOL;
}

a();
