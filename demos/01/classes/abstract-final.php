<?php
//PHP supports abstract and final classes, methods, properties (and constants).
//- Abstract: class cannot be instantiated, method has no body and must be implemented in a subclass
//- Final: class cannot be extended (no subclasses are possible), method cannot be overwritten

abstract class AbstractAnimal
{
    public final function saySomething()
    {
        return "Saying something.";
    }

    public abstract function doSomething();
}

class ConcreteAlligator extends AbstractAnimal
{
    //The funtion saySomething must not be overwritten
    //public function saySomething()
    //{
    //    return "Saying something else.";
    //}

    //The function doSomething must be implemented.
    public function doSomething()
    {
        return "Doing something.";
    }
}

//The AbstractAnimal class cannot be instantiated.
$animal = new AbstractAnimal();
$alligator = new ConcreteAlligator();
