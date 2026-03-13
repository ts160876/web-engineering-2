<?php

//Function to check if the user wants to continue.
function checkForContinuation()
{
    $input = '';
    while ($input != 'yes' && $input != 'no') {
        echo 'Do you like to continue (yes/no)? ';
        $input = trim(fgets(STDIN));
        if ($input == 'yes') {
            return true;
        } elseif ($input == 'no') {
            return false;
        }
        echo 'This input was not correct.' . PHP_EOL;
    }
}

function calculateBrutto($netPrice, $taxRate)
{
    //Validate the net price
    if (is_numeric($netPrice)) {
        $netPriceAsNumber = (float) $netPrice;
        if ($netPriceAsNumber < 0) {
            return 'The net price must not be negative.' . PHP_EOL;
        }
    } else {
        return 'The net price is not a number.' . PHP_EOL;
    }

    //Validate the tax rate
    if (is_numeric($taxRate)) {
        $taxRateAsNumber = (float) $taxRate;
        if ($taxRateAsNumber < 0 or $taxRateAsNumber > 100) {
            return 'The tax rate must be between 0 and 100.' . PHP_EOL;
        }
    } else {
        return 'The tax rate is not a number.' . PHP_EOL;
    }

    $grossPrice = round($netPrice * (1 + $taxRate / 100), 2);
    return "Net price $netPrice, tax rate $taxRate%, gross price $grossPrice" . PHP_EOL;
}

//Start the calculation.
echo 'Welcome to the interactive book price calculation!' . PHP_EOL;

//Repeat the book price calculation as long as the user wants.
while (true) {
    echo 'Enter the net price: ';
    $netPrice = trim(fgets(STDIN));
    echo 'Enter the tax rate: ';
    $taxRate = trim(fgets(STDIN));

    //Calculate the gross price.
    echo calculateBrutto($netPrice, $taxRate);

    //Check if the user wants to continue. 
    if (!checkForContinuation()) {
        break;
    }
}
