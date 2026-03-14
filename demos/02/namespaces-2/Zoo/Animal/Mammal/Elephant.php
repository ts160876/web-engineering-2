<?php

namespace Zoo\Animal\Mammal;

require_once './Zoo/Animal/Animal.php';

use Zoo\Animal\Animal;

class Elephant extends Animal
{
    public function __construct()
    {
        parent::__construct('Elephant');
    }
}
