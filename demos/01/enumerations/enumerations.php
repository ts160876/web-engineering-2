<?php
//Enumerations, short enums, allow to define a custom type that is limited to one of a discrete number of possible values.

//Basic enumrations
enum Mammal
{
    case Bear;
    case Camel;
    case Cheetah;
    case Elephant;
}

//Backed enumerations
enum Reptile: string
{
    case Alligator = "a";
    case Iguana = "i";
    case Snake = "s";

    //Enumerations (both basic as well as backed) can have constants.
    const prefix = "CONCAT:";

    //Enumerations (both basic as well as backed) can have methods.
    public function concat()
    {
        return Reptile::prefix . " " . $this->name . " " . $this->value;
    }
}

//Define a function that expects a mammal.
function doSomethingWithMammal(Mammal $mammal)
{
    //All cases have a read-only property "name".
    return $mammal->name;
}

//The function requires a mammal.
echo doSomethingWithMammal(Mammal::Cheetah) . PHP_EOL;
//It cannot be called with anything else.
//doSomethingWithMammal(Reptile::Alligator);

//Define a function that expects a reptile.
function doSomethingWithReptile(Reptile $reptile)
{
    //All cases have two read-only properties "name" and "value.
    return $reptile->concat();
}

//The function requires a reptile.
echo doSomethingWithReptile(Reptile::Snake) . PHP_EOL;

//List all values of an enumeration.
var_dump(Reptile::cases());
