<?php
//This example shows the difference between include and include_once.
$aVariable = 4;

//Here we include the file included-file1.php.
//include "./included-file1.php";
//include "./included-file1.php";
include_once "./included-file1.php";
include_once "./included-file1.php";

//Call the function defined in included-file1.php.
doSomething();
