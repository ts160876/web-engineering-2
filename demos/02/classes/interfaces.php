<?php
//Interfaces specify which methods and properties a class must have / implement.
//Here is a very simple example.

interface SimpleInterface
{
    public function aFunction();
}

class SimpleClass implements SimpleInterface
{

    public function aFunction()
    {
        return true;
    }
}

$class = new SimpleClass();
echo $class->aFunction();
