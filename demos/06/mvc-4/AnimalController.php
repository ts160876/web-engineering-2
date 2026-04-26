<?php

namespace mvc4;

include_once 'AnimalModel.php';
include_once 'AnimalView.php';

class AnimalController
{
    public function handleRequest()
    {
        echo $this->editAnimal();
    }

    public function editAnimal(): string
    {
        //We hardcode animal with animalId 1 here.
        $animal = AnimalModel::select(1);
        $view = new AnimalView($animal);
        return $view->render(AnimalView::EDIT);
    }
}
