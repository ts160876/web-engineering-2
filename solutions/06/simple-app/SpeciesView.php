<?php

namespace Solution6;

class SpeciesView
{
    public const string CREATE = 'Create Species';
    public const string EDIT = 'Edit Species';

    private SpeciesModel $species;

    public function __construct(SpeciesModel $species)
    {
        $this->species = $species;
    }

    public function render(string $action, string $flashMessage): string
    {
        ob_start();
        include_once 'SpeciesTemplate.php';
        return ob_get_clean();
    }
}
