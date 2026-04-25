<?php

class Animal99
{
    const CONSTANT_VALUE = '4711';
    protected string $name;
    protected $age;
    public static $numberOfAnimals;

    function setAge($age)
    {
        $this->age = $age;
    }

    function say()
    {
        echo "I am a $this->name" . PHP_EOL;
    }

    public function __construct($name, $age)
    {
        echo "Creating a new Animal." . PHP_EOL;
        $this->name = $name;
        $this->age = $age;
        Animal99::$numberOfAnimals++;
    }

    public function __destruct()
    {
        echo "Destroying an Animal." . PHP_EOL;
    }

    public static function doSomethingStatically()
    {
        echo "Something... " . PHP_EOL;
    }
}

class Monkey99 extends Animal99
{

    //private $name;
    public $tailLength;

    public function __construct($name, $age, $tailLength)
    {
        echo "Creating a new Monkey." . PHP_EOL;
        $this->tailLength = $tailLength;
        parent::__construct($name, $age);
    }

    public function climb()
    {
        echo "Climbing $this->age" . PHP_EOL;
    }

    public function havingParty($anotherMonkey)
    {
        echo "$this->name is having a party with $anotherMonkey->name" . PHP_EOL;
    }
}

$m1 = new Monkey99('Monkey1', 47, 150);
$m2 = new Monkey99('Monkey2', 47, 150);
$m1->havingParty($m2);
