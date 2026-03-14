<?php
//The zoo needs the following attributes and methods:
//- name: name of the zoo
//- animals: list of all animals
//- addAnimal($animal): add an animal to the zoo
//- getAnimals($species): returns a list of all animals of the given species
//- getNumberOfAnimals(): returns the number of animals in the zoo
//- describe(): print the zoo and all animals

require_once 'animals.php';

class Zoo
{
    private string $name;
    private array $animals = [];

    public function addAnimal(ZooAnimal $animal)
    {
        array_push($this->animals, $animal);
    }

    public function getAnimals(string $species): array
    {
        $animals = [];
        foreach ($this->animals as $animal) {
            if ($animal->getSpecies() === $species) {
                array_push($animals, $animal);
            }
        }
        return $animals;
    }

    public function getNumberOfAnimals(): int
    {
        return count($this->animals);
    }

    public function describe()
    {
        $numberOfAnimals = $this->getNumberOfAnimals();
        echo "$this->name has $numberOfAnimals animals:" . PHP_EOL;
        foreach ($this->animals as $animal) {
            echo "- " . $animal->getSpecies() . " " . $animal->getName() . PHP_EOL;
        }
    }

    public function __construct($name)
    {
        $this->name = $name;
    }
}

//Create the zoo.
$zoo = new Zoo('Frankfurt Zoo');

//Add all animals.
$zoo->addAnimal($anton);
$zoo->addAnimal($gerd);
$zoo->addAnimal($felix);
$zoo->addAnimal($anna);
$zoo->addAnimal($karl);
$zoo->addAnimal($herta);
$zoo->addAnimal($ludwig);
$zoo->addAnimal($max);

//Test the methods of the Zoo class.
$zoo->describe();
