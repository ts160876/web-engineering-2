<?php
//The following tables includes all common attributes for the animals:
//Name   | Species   | Birthdate  | Gender
//--------------------------------------------------------------------
//Anton  | Alligator | 1980-01-15 | male
//Gerd   | Alligator | 1993-11-15 | male
//Felix  | Cheetah   | 2018-04-05 | male
//Anna   | Giraffe   | 2019-12-04 | female
//Karl   | Giraffe   | 2005-08-23 | male
//Herta  | Hippo     | 2017-07-30 | female
//Ludwig | Hippo     | 2024-09-09 | male
//Max    | Monkey    | 2020-02-27 | male

//The following table includes all common methods for the animals:
//Method            | What should it do 
//----------------------------------------------------------------
//eat($food)        | Example: The Alligator Anton is eating beef.
//sleep()           | Example: The Alligator Anton is sleeping.
//move()            | Example: The Alligator Anton is moving.
//describe()        | Print all attributes of the animal (including 
//                  | attributes defined in subclasses).
//getProperties()   | Return all attributes of the animal as keys
//                  | and their values (i.e., as associative array).

//The following tables describes the specific attributes and methods of a species:
//Species   | Attribute, Method
//--------------------------------------------------------------------------------
//Alligator | biteForce, deathRole()
//Cheetah   | topSpeed, sprint()
//Giraffe   | neckLength, reachHighLeaves()
//Hippo     | $waterSubmergeTime, submerge()
//Monkey    | tailLength, swingFromBranch()

abstract class ZooAnimal
{
    public const string ALLIGATOR = "Alligator";
    public const string CHEETAH = "Cheetah";
    public const string GIRAFFE = "Giraffe";
    public const string HIPPO = "Hippo";
    public const string MONKEY = "Monkey";
    public const string MALE = "male";
    public const string FEMALE = "female";

    protected string $name;
    protected string $species;
    protected DateTime $birthdate;
    protected string $gender;

    public function __construct(string $name, string $species, DateTime $birthdate, string $gender)
    {
        $this->name = $name;
        $this->species = $species;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    public final function eat(string $food)
    {
        echo "The $this->species $this->name is eating $food." . PHP_EOL;
    }

    public function sleep()
    {
        echo  "The $this->species $this->name is sleeping." . PHP_EOL;
    }

    public function move()
    {
        echo  "The $this->species $this->name is moving." . PHP_EOL;
    }

    public function describe()
    {
        echo "This is the complete list of $this->name's properties:" . PHP_EOL;
        foreach ($this->getProperties() as $key => $value) {
            echo "$key: $value" . PHP_EOL;
        }
    }

    protected function getProperties(): array
    {
        return [
            'name' => $this->name,
            'species' => $this->species,
            'birthdate' => $this->birthdate->format('Y-m-d'),
            'gender' => $this->gender
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }
}

interface Swimmer
{
    public function swim($speed);
}

class ZooAlligator extends ZooAnimal implements Swimmer
{
    protected int $biteForce;
    public function __construct(string $name, DateTime $birthdate, string $gender, int $biteForce)
    {
        parent::__construct($name, ZooAnimal::ALLIGATOR, $birthdate, $gender);
        $this->biteForce = $biteForce;
    }

    public function deathRole()
    {
        echo  "The $this->species $this->name is doing a death role." . PHP_EOL;
    }

    protected function getProperties(): array
    {
        $properties = parent::getProperties();
        $properties['biteForce'] = $this->biteForce;
        return $properties;
    }

    public function swim($speed)
    {
        echo  "The $this->species $this->name is swimming at speed $speed." . PHP_EOL;
    }
}

class ZooCheetah extends ZooAnimal
{
    protected int $topSpeed;
    public function __construct(string $name, DateTime $birthdate, string $gender, int $topSpeed)
    {
        parent::__construct($name, ZooAnimal::CHEETAH, $birthdate, $gender);
        $this->topSpeed = $topSpeed;
    }

    public function sprint()
    {
        echo  "The $this->species $this->name is sprinting." . PHP_EOL;
    }

    protected function getProperties(): array
    {
        $properties = parent::getProperties();
        $properties['topSpeed'] = $this->topSpeed;
        return $properties;
    }
}

class ZooGiraffe extends ZooAnimal
{
    protected int $neckLength;
    public function __construct(string $name, DateTime $birthdate, string $gender, int $neckLength)
    {
        parent::__construct($name, ZooAnimal::GIRAFFE, $birthdate, $gender);
        $this->neckLength = $neckLength;
    }

    public function reachHighLeaves()
    {
        echo  "The $this->species $this->name is reaching hightest leaves." . PHP_EOL;
    }

    protected function getProperties(): array
    {
        $properties = parent::getProperties();
        $properties['neckLength'] = $this->neckLength;
        return $properties;
    }
}

class ZooHippo extends ZooAnimal implements Swimmer
{
    protected int $waterSubmergeTime;
    public function __construct(string $name, DateTime $birthdate, string $gender, int $waterSubmergeTime)
    {
        parent::__construct($name, ZooAnimal::HIPPO, $birthdate, $gender);
        $this->waterSubmergeTime = $waterSubmergeTime;
    }

    public function submerge()
    {
        echo  "The $this->species $this->name is submerging." . PHP_EOL;
    }

    protected function getProperties(): array
    {
        $properties = parent::getProperties();
        $properties['waterSubmergeTime'] = $this->waterSubmergeTime;
        return $properties;
    }

    public function swim($speed)
    {
        echo  "The $this->species $this->name is swimming at speed $speed." . PHP_EOL;
    }
}

class ZooMonkey extends ZooAnimal
{
    protected int $tailLength;
    public function __construct(string $name, DateTime $birthdate, string $gender, int $tailLength)
    {
        parent::__construct($name, ZooAnimal::MONKEY, $birthdate, $gender);
        $this->tailLength = $tailLength;
    }

    public function swingFromBranch()
    {
        echo  "The $this->species $this->name is swinging from a branch." . PHP_EOL;
    }

    protected function getProperties(): array
    {
        $properties = parent::getProperties();
        $properties['tailLength'] = $this->tailLength;
        return $properties;
    }
}

//Create the animals.
$anton = new ZooAlligator('Anton', new DateTime('1980-01-15'), ZooAnimal::MALE, 67);
$anton->eat("beef");
$anton->sleep();
$anton->move();
$anton->describe();
$anton->deathRole();
$anton->swim(10);

$gerd = new ZooAlligator('Gerd', new DateTime('1993-11-15'), ZooAnimal::MALE, 65);
$gerd->eat("beef");
$gerd->sleep();
$gerd->move();
$gerd->describe();
$gerd->deathRole();
$gerd->swim(7);

$felix = new ZooCheetah('Felix', new DateTime('2018-04-05'), ZooAnimal::MALE, 80);
$felix->eat("beef");
$felix->sleep();
$felix->move();
$felix->describe();
$felix->sprint();

$anna = new ZooGiraffe('Anna', new DateTime('2019-12-04'), ZooAnimal::FEMALE, 350);
$anna->eat("leaves");
$anna->sleep();
$anna->move();
$anna->describe();
$anna->reachHighLeaves();

$karl = new ZooGiraffe('Karl', new DateTime('2005-08-23'), ZooAnimal::MALE, 270);
$karl->eat("leaves");
$karl->sleep();
$karl->move();
$karl->describe();
$karl->reachHighLeaves();

$herta = new ZooHippo('Herta', new DateTime('2017-07-30'), ZooAnimal::FEMALE, 3);
$herta->eat("grass");
$herta->sleep();
$herta->move();
$herta->describe();
$herta->submerge();
$herta->swim(4);

$ludwig = new ZooHippo('Ludwig', new DateTime('2024-09-09'), ZooAnimal::MALE, 5);
$ludwig->eat("grass");
$ludwig->sleep();
$ludwig->move();
$ludwig->describe();
$ludwig->submerge();
$ludwig->swim(6);

$max = new ZooMonkey('Max', new DateTime('2020-02-27'), ZooAnimal::MALE, 90);
$max->eat("bananas");
$max->sleep();
$max->move();
$max->describe();
$max->swingFromBranch();
