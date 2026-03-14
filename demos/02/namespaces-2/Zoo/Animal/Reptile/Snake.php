<?php

namespace Zoo\Animal\Reptile;

require_once './Zoo/Animal/Animal.php';

use Zoo\Animal\Animal;

class Snake extends Animal
{
    public function __construct()
    {
        parent::__construct('Snake');
    }
}
