<?php
//These are the animals
//Name   | Species   | Birthdate  | Gender
//-----------------------------------------------
//Anton  | Alligator | 1980-01-15 | male
//Gerd   | Alligator | 1993-11-15 | male
//Felix  | Cheetah   | 2018-04-05 | male
//Anna   | Giraffe   | 2019-12-04 | female
//Karl   | Giraffe   | 2005-08-23 | male
//Herta  | Hippo     | 2017-07-30 | female
//Ludwig | Hippo     | 2024-09-09 | male
//Max    | Monkey    | 2020-02-27 | male

//All animals are stored in a global variable animals.
$animals = [];

//Function to add an animal
function addAnimal(&$animals, $name, $species, $birthdate, $gender)
{
    if (!array_key_exists($name, $animals)) {
        $animals[$name] = [
            'name' => $name,
            'species' => $species,
            'birthdate' => new DateTime($birthdate),
            'gender' => $gender
        ];
        return true;
    } else {
        //An animal with the name does already exist.
        return false;
    }
}

//Function to remove an animal
function removeAnimal(&$animals, $name)
{
    if (array_key_exists($name, $animals)) {
        unset($animals[$name]);
        return true;
    } else {
        //An animal with the name does not exist.
        return false;
    }
}

//Function to calculate the age for one animal
function calculateAge($animal)
{
    return $animal['birthdate']->diff(new DateTime())->y;
}

//Function to summmarize the age for all animals.
function summarizeAge($animals)
{
    return array_reduce($animals, function ($carry, $animal) {
        return $carry + calculateAge($animal);
    });
}

//Add all animals. 
addAnimal($animals, 'Anton', 'Alligator', '1980-01-15', 'male');
addAnimal($animals, 'Gerd', 'Alligator', '1993-11-15', 'male');
addAnimal($animals, 'Felix', 'Cheetah', '2018-04-05', 'male');
addAnimal($animals, 'Anna', 'Giraffe', '2019-12-04', 'female');
addAnimal($animals, 'Karl', 'Giraffe', '2005-08-23', 'male');
addAnimal($animals, 'Herta', 'Hippo', '2017-07-30', 'female');
addAnimal($animals, 'Ludwig', 'Hippo', '2024-09-09', 'male');
addAnimal($animals, 'Max', 'Monkey', '2020-02-27', 'male');


echo 'The age of all animals is ' . summarizeAge($animals) . ' years.' . PHP_EOL;
