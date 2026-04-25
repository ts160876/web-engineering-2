<?php

namespace Name1;

$abc = 'abc';

class Animal98
{

    public const MONKEY = 'monkey';
    public const SNAKE = 'snake';

    public function __construct(string $type)
    {
        echo $type . PHP_EOL;
    }
}
