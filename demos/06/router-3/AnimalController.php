<?php

namespace Router3;

class AnimalController
{
    public function index(): string
    {
        return 'Animals';
    }

    public function create(): string
    {
        return '<form method="post"><input type="text" name="name"/><button>Create animal</button></form>';
    }

    public function handleCreate(): string
    {
        return 'Store animal';
    }
}
