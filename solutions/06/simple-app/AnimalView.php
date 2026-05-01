<?php

namespace Solution6;

class AnimalView
{
    public const string CREATE = 'Create Animal';
    public const string EDIT = 'Edit Animal';

    private AnimalModel $animal;

    public function __construct(AnimalModel $animal)
    {
        $this->animal = $animal;
    }

    public function render(string $action, string $flashMessage): string
    {
        ob_start();
        include_once 'AnimalTemplate.php';
        return ob_get_clean();
    }
}
