<?php
$bVariable = 5;

echo "The following two lines are generated in included-file1:" . PHP_EOL;
echo $aVariable . PHP_EOL;
echo $bVariable . PHP_EOL;

function doSomething()
{
    echo "This line is generated in doSomething, which is in included-file1." . PHP_EOL;
}
