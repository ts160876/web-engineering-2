<?php
//Define a simple class. A class can consist of:
//- constants
//- variables (called properties)
//- functions (caled methods)

class Animal
{
    //Per default constants are public. 
    public const BROWN = 1;
    public const GREEN = 2;
    //It is possible to assign a type to a constant.
    public const int GREY = 3;
    //It is possible to change the visibility of a constant, e.g. to private.
    private const INVSIBLE = 4;
    public const WHITE = 5;

    //Per default properties are public. 
    public $name;
    //It is possible to assign a type to a property as well as a "default" value.
    public int $color = 2;
    //It is possible to change the visibility of a property, e.g. to private.
    //It is also possible to declare it as static. 
    private static $numberofAnimals = 0;

    //A constructor is a special function. It is automatically called when a new object of
    //the class is being created. 
    public function __construct($name, $color)
    {
        //Increase the number of animals
        Animal::$numberofAnimals++;
        //Initialize the properties with the values from the parameters of the constructor.
        $this->name = $name;
        $this->color = $color;
    }

    //Per default methods are public.
    public function saySomething()
    {
        return "I am " . $this->name . " and my color is " . $this->getColorName() . ".";
    }

    //It is possible to change the visibility of a method.
    //It is also possible to assign a type to parameters and/or the return value. 
    private function getColorName(): null|string
    {
        return match ($this->color) {
            Animal::BROWN => "brown",
            Animal::GREEN => "green",
            Animal::GREY => "grey",
            Animal::INVSIBLE => "invisible",
            Animal::WHITE => "white",
            default => NULL
        };
    }

    //It is also possible to declare a method as static.
    public static function getNumberofAnimals()
    {
        //$this cannot be used in static methods.
        //$this->color;
        //Return the number of animals, that is the number of objects created for the Animals class.
        return Animal::$numberofAnimals;
    }
}

//Instantiate the class, i.e. create two animals.
$alligator = new Animal("Alligator", Animal::GREEN);
$monkey = new Animal("Monkey", Animal::BROWN);

//Work with the instances.
echo $alligator->saySomething() . PHP_EOL;
echo $monkey->saySomething() . PHP_EOL;

//Directly access all public properties and methods.
$alligator->name = "Angry Alligator";
echo $alligator->saySomething() . PHP_EOL;

//It is not possible to access private properties and methods.
//Animal::$numberofAnimals;
//$alligator->getColorName();

//Access static properties and methods via the class.
echo "Currently there are " . Animal::getNumberofAnimals() . " animals" . PHP_EOL;
