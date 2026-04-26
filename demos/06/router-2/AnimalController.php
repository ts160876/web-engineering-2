<?php

namespace Router2;

class AnimalController
{
    public function index(): string
    {
        return 'Animals';
    }

    public function create(): string
    {
        return 'Create animal';
    }
}
