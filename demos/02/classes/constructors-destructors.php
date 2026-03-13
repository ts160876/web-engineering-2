<?php
//PHP supports constructor and destructor methods. Their usage is optional.
//- The constructor is called during creation of an object.
//- The destructor is called as soon as there are not references to an object anymore.

//Define class Animal.
class SimpleAnimal
{
    public function __construct()
    {
        echo "Constructor of Animal is being called" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Destructor of Animal is being called." . PHP_EOL;
    }
}

//Alligator is a subclass of Animal. It has no constructor and no destructor.
class SimpleAlligator extends SimpleAnimal {}

//Hippo is a subclass of Animal. It has a constructor and destructor. 
//It does not call the parent's constructor/destrutor.
class SimpleHippo extends SimpleAnimal
{
    public function __construct()
    {
        echo "Constructor of Hippo is being called" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Destructor of Hippo is being called." . PHP_EOL;
    }
}


//Monkey is a subclass of Animal. It has a constructor and destructor.
//It calls the parent's constructor/destructor.
class SimpleMonkey extends SimpleAnimal
{
    public function __construct()
    {
        parent::__construct();
        echo "Constructor of Monkey is being called" . PHP_EOL;
    }

    public function __destruct()
    {
        echo "Destructor of Monkey is being called." . PHP_EOL;
        parent::__destruct();
    }
}


//Create and destroy a few objecst to see which constructors are being called.
echo "Creation of Animal... What happens?" . PHP_EOL;
$animal = new SimpleAnimal();
echo "Creation of Alligator... What happens?" . PHP_EOL;
$alligator = new SimpleAlligator();
echo "Creation of Hippo... What happens?" . PHP_EOL;
$hippo = new SimpleHippo();
echo "Creation of Monkey... What happens?" . PHP_EOL;
$monkey = new SimpleMonkey();
echo "Deletion of Animal reference... What happens?" . PHP_EOL;
$animal = NULL;
echo "Deletion of Alligator reference... What happens?" . PHP_EOL;
$alligator = NULL;
echo "Deletion of Hippo reference... What happens?" . PHP_EOL;
$hippo = NULL;
echo "Deletion of Monkey reference... What happens" . PHP_EOL;
$monkey = NULL;
