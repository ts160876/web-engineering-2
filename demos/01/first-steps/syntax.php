<?php
//Define a constant.
define("A_DATE", date("y-m-d"));

//Define a variable and fill it from a prompt.
echo "How many numbers do you want? ";
$aNumber = (int)fgets(STDIN);

//Print the (current) date to the console
echo "Today is " . A_DATE . PHP_EOL;

//Repeat the following code aNumber times
for ($i = 1; $i <= $aNumber; $i++) {
    if ($i % 2 == 0) {
        //The current number can be divided by 2.
        echo "$i can be divided by 2." . PHP_EOL;
    } else {
        //The current number cannot be divided by 2.
        echo "$i cannot be divided by 2." . PHP_EOL;
    }
}
