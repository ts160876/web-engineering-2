<?php
//Show how object inheritance works based on an Animal class, Alligator class and Monkey class.

class Animal
{
    //Define three properties with different visibility.
    public $name;
    private $age;
    protected $color;

    //Define a simple constructor.
    public function __construct($name, $age, $color)
    {
        //Initialize the properties with the values from the parameters of the constructor.
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    //Define three methods with different visibility.
    public function saySomething()
    {
        return "[SAYING] I am " . $this->name . ", my color is " . $this->color . ", and I am " . $this->age . " years old.";
    }

    private function whisperSomething()
    {
        return "[WHISPERING] I am " . $this->name . ", my color is " . $this->color . ", and I am " . $this->age . " years old.";
    }

    protected function shoutSomething()
    {
        return "[SHOUTING] I am " . $this->name . ", my color is " . $this->color . ", and I am " . $this->age . " years old.";
    }

    public function tellSecret()
    {
        //The private method can be accessed from inside the class.
        return $this->whisperSomething();
    }

    public function beAngry()
    {
        //Also the protected method can be accessed from inside the class.
        return $this->shoutSomething();
    }
}

class Alligator extends Animal
{
    private $tailLength;

    //Redefine the constructor.
    public function __construct($tailLength, $age)
    {
        parent::__construct("Alligator", $age, "green");
        $this->tailLength = $tailLength;
    }

    //Redefine the saySomething method.
    public function saySomething()
    {
        //Inside the Alligator class the name and color properties are available (in addition to tailLength).
        //The age property is not available. 
        return "[SAYING] I am " . $this->name . ", my color is " . $this->color .
            ", and my tail is " . $this->tailLength . " cm long.";
    }

    //Define an additional swim method.
    public function swim()
    {
        return "[BUSY WITH] " . $this->name . " is swimming";
    }

    //Define an additional eat method.
    private function eat()
    {
        return "[BUSY WITH] " . $this->name . " is silently eating a zebra.";
    }

    //Test access to the parent's properties and methods.
    public function testAccessToParent()
    {
        echo "[VALUE OF NAME] " . $this->name . PHP_EOL;
        //The private property defined in the Animal class cannot be accessed. 
        //echo "[VALUE OF AGE] " .  $this->age . PHP_EOL;
        echo "[VALUE OF COLOR] " . $this->color . PHP_EOL;
        echo "[VALUE OF TAILLENGTH] " . $this->tailLength . PHP_EOL;

        echo $this->saySomething() . PHP_EOL;
        //The private method defined in the Animal class cannot be accessed.
        //echo $this->whisperSomething() . PHP_EOL;
        echo $this->shoutSomething() . PHP_EOL;
    }

    //Test access to an(other) aligator's properties and methods.
    public function testAccessToAlligator(Alligator $alligator)
    {
        echo "[VALUE OF NAME] " . $alligator->name . PHP_EOL;
        //The private property defined in the Animal class cannot be accessed. 
        //echo "[VALUE OF AGE] " .  $alligator->age . PHP_EOL;
        echo "[VALUE OF COLOR] " . $alligator->color . PHP_EOL;
        //Interestingly the private property of another alligator can be accessed.
        echo "[VALUE OF TAILLENGTH] " . $alligator->tailLength . PHP_EOL;

        echo $alligator->saySomething() . PHP_EOL;
        //The private method defined in the Animal class cannot be accessed.
        //echo $alligator->whisperSomething() . PHP_EOL;
        echo $alligator->shoutSomething() . PHP_EOL;
        //Interestingly the private method of another alligator can be accessed.
        echo $alligator->eat() . PHP_EOL;
    }

    //Test access to a monkey's properties and methods.
    public function testAccessToMonkey(Monkey $monkey)
    {
        echo "[VALUE OF NAME] " . $monkey->name . PHP_EOL;
        //The private property defined in the Animal class cannot be accessed. 
        //echo "[VALUE OF AGE] " .  $monkey->age . PHP_EOL;
        echo "[VALUE OF COLOR] " . $monkey->color . PHP_EOL;
        //The private property defined in the Monkey class cannot be accessed.
        //echo "[VALUE OF BODYSIZE] " . $monkey->bodySize . PHP_EOL;

        echo $monkey->saySomething() . PHP_EOL;
        //The private method defined in the Animal class cannot be accessed.
        //echo $monkey->whisperSomething() . PHP_EOL;
        echo $monkey->shoutSomething() . PHP_EOL;
        //The private method defined in the Monkey class cannot be accessed.
        //echo $monkey->eat() . PHP_EOL;
    }
}

class Monkey extends Animal
{
    private $bodySize;

    //Redefine the constructor.
    public function __construct($bodySize, $age)
    {
        parent::__construct("Monkey", $age, "brown");
        $this->bodySize = $bodySize;
    }

    //Redefine the saySomething method.
    public function saySomething()
    {   //Use saySomething method of the Animal class and add something to the result.
        return parent::saySomething() . " I have so much more to say.";
    }

    //Define an additional clim method.
    public function climb()
    {
        return "[BUSY WITH] " . $this->name . " is climbing";
    }

    //Define an additional eat method.
    private function eat()
    {
        return "[BUSY WITH] " . $this->name . " is silently eating bananas.";
    }
}


//Create two instances of the Animal class.
echo "Create two instances of the Animal class." . PHP_EOL;
$animal1 = new Animal("Alligator", 5, "green");
$animal2 = new Animal("Monkey", 7, "brown");
echo $animal1->saySomething() . PHP_EOL;
echo $animal2->saySomething() . PHP_EOL;
echo $animal1->tellSecret() . PHP_EOL;
echo $animal2->beAngry() . PHP_EOL;

// The private and protected properties cannot be accessed from outside the class (global scope).
//echo $animal1->age . PHP_EOL;
//echo $animal1->color . PHP_EOL;
// The private and protected methods cannot be accessed from outside the class (global scope).
//echo $animal1->whisperSomething() . PHP_EOL;
//echo $animal1->shoutSomething() . PHP_EOL;

//Create two instances each of the Alligator and Monkey class.
echo "Create two instances each of the Alligator and Monkey class." . PHP_EOL;
$alligator1 = new Alligator(120, 5);
$alligator2 = new Alligator(130, 7);
$monkey1 = new Monkey(75, 7);
$monkey2 = new Monkey(80, 9);
echo $alligator1->saySomething() . PHP_EOL;
echo $alligator2->saySomething() . PHP_EOL;
echo $monkey1->saySomething() . PHP_EOL;
echo $monkey2->saySomething() . PHP_EOL;
echo $alligator1->swim() . PHP_EOL;
echo $monkey1->climb() . PHP_EOL;

//An alligator cannot climb. A monkey cannot swim. The Animal class is not table to do either.
//echo $alligator1->clim();
//echo $monkey1->swim();
//echo $animal1->clim();
//echo $animal1->swim();

//Test access to parent.
echo "Test access to parent." . PHP_EOL;
echo $alligator1->testAccessToParent();

//Test access to an(other) alligator.
echo "Test access to an(other) alligator." . PHP_EOL;
echo $alligator1->testAccessToAlligator($alligator2);

//Test access to a monkey.
echo "Test access to a monkey." . PHP_EOL;
echo $alligator1->testAccessToMonkey($monkey1);
