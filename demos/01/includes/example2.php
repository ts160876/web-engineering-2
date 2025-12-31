<?php
//This example shows what happens when a file is included in a function.
$aVariable = 4;

function doSomething()
{
    include "./included-file2.php";
    echo $bVariable . PHP_EOL;
}

doSomething();

//bVariable is only defined in the scope of function doSomething. It cannot 
//be used here.
//echo $bVariable . PHP_EOL;
