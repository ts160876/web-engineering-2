<?php

namespace Name2;

class Animal98
{

    public const MONKEY = 'monkey';
    public const SNAKE = 'snake';

    public function __construct(string $type)
    {
        echo $type . PHP_EOL;
    }
}
