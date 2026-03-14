<?php

namespace Zoo\Animal;

class Animal
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
