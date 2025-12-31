<?php
//Simple if statement. The usage of the curly brackets is optional as long as only one statement
//is to be executed conditionally.
if (2 > 1)
    echo "2 > 1" . PHP_EOL;

//For more than one statement the curly brackets are mandatory. They form a "statement group".
if (2 > 1) {
    echo "2 > 1" . PHP_EOL;
    echo "Or in other words: 2 is greater than 1" . PHP_EOL;
}

//If-then-else statement
if (2 < 1) {
    echo "2 < 1" . PHP_EOL;
} elseif (2 > 1) { //Here we could also write: else if (2 > 1)
    echo "2 > 1"  . PHP_EOL;
} else {
    echo "2 = 1" . PHP_EOL;
}

//Switch statement (without a break)
$aVariable = 1;
switch ($aVariable) {
    case 1:
        echo "The variable has the value 1" . PHP_EOL;
    case 2:
        echo "The variable has the value 2" . PHP_EOL;
    case 3:
        echo "The variable has the value 3" . PHP_EOL;
    default:
        echo "The variable has another value" . PHP_EOL;
}


//Switch statement (with a break)
$aVariable = 1;
switch ($aVariable) {
    case 1:
        echo "The variable has the value 1" . PHP_EOL;
        break;
    case 2:
        echo "The variable has the value 2" . PHP_EOL;
        break;
    case 3:
        echo "The variable has the value 3" . PHP_EOL;
        break;
    default:
        echo "The variable has another value" . PHP_EOL;
}

//Match statement (here no break is necessary)
$result = match ($aVariable) {
    1 => "The variable has the value 1",
    2 => "The variable has the value 2",
    3 => "The variable has the value 3",
    default => "The variable has another value"
};
echo $result . PHP_EOL;
