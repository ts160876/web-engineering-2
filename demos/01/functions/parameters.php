<?php
//This function creates the fullname by concatenating first name and last name.
//It also makes the names uppercase.
$aFirstName = "Max";
$aLastName = "Mueller";

function getFullName1($firstName, $lastName)
{
    $firstName = strtoupper($firstName);
    $lastName = strtoupper($lastName);
    return $firstName . " " . $lastName;
}

echo "Result of getFullName1: " . getFullName1($aFirstName, $aLastName) . PHP_EOL;
echo "aFirstName after the call: " . $aFirstName . PHP_EOL;
echo "aLastName after the call: " . $aLastName . PHP_EOL;

//Per default parameters are passed by value. They can also be passed by reference by using &.
function getFullName2($firstName, &$lastName)
{
    $firstName = strtoupper($firstName);
    $lastName = strtoupper($lastName);
    return $firstName . " " . $lastName;
}

echo "Result of getFullName2: " . getFullName2($aFirstName, $aLastName) . PHP_EOL;
echo "aFirstName after the call: " . $aFirstName . PHP_EOL;
echo "aLastName after the call: " . $aLastName . PHP_EOL;

//Parameters can have default values.
function getFullName3($firstName, &$lastName = "Schmitt")
{
    $firstName = strtoupper($firstName);
    $lastName = strtoupper($lastName);
    return $firstName . " " . $lastName;
}

echo "Result of getFullName3: " . getFullName3("Sonja") . PHP_EOL;

//Named argument syntax
echo "Result of getFullName1 (with named argument syntax): " . getFullName1(lastName: "Bach", firstName: "Benedikt") . PHP_EOL;

//Parameters with types
//Special cases:
//- nullable types: ?string $firstName
//- union types: string|int $firstName
function getFullName4(string $firstName, $lastName)
{
    return $firstName . " " . $lastName;
}

echo "Result of getFullName4 (two strings): " . getFullName4("Max", "Mueller") . PHP_EOL;
echo "Result of getFullName4 (one string, one number): " . getFullName4("Max", 4) . PHP_EOL;
//The following call works due to PHP's implicit type conversion.
//With declare(strict_types=1) we can make it fail.
//echo "Result of getFullName4 (one number, one string): " . getFullName4(5, "Mueller") . PHP_EOL;

//Argument lists (a variable number of arguments is passed as an array)
function concatenateNames(...$names)
{
    $concatenatedNames = "";
    foreach ($names as $name) {
        if ($concatenatedNames == "") {
            $concatenatedNames = $name;
        } else {
            $concatenatedNames = $concatenatedNames . " " . $name;
        }
    }
    return $concatenatedNames;
}
echo "Result of concatenateNames: " . concatenateNames("Arne", "Felix", "Maria", "Peter", "Verena") . PHP_EOL;

//A function can also return multiple values by the help of an array.
function getFirstAndLastName()
{
    return ["Bob", "Baumeister"];
}
[$aFirstName, $aLastName] = getFirstAndLastName();
echo "aFirstName after the call: " . $aFirstName . PHP_EOL;
echo "aLastName after the call: " . $aLastName . PHP_EOL;
