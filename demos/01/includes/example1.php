<?php
//This example shows how include works. Require behaves the same except that it
//produces an ERROR instead of a WARNING if the file is not found.
$aVariable = 4;

//This call will not work. Function doSomething is only known after the include.
//doSomething();
//The same is true for accessing bVariable. The variable can only be used after the include.
//echo $bVariable . PHP_EOL;

//Here we include the file included-file1.php.
include "./included-file1.php";

//After the include, the functions and variables defined in included-file1.php
//are available here
doSomething();

echo "The following two lines are generated in example1:" . PHP_EOL;
echo $aVariable . PHP_EOL;
echo $bVariable . PHP_EOL;
