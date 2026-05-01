<?php

namespace mvc5;

include_once 'AnimalModel.php';
include_once 'AnimalView.php';

class AnimalController
{
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            if ($_GET['action'] == 'create') {
                echo $this->createAnimal();
            } elseif ($_GET['action'] == 'edit') {
                echo $this->editAnimal();
            } else {
                throw new \Exception('Problem');
            }
        } else {
            echo $this->save();
        }
    }

    public function editAnimal(): string
    {
        //We do not bother about error handling here. The animal might not exist.
        //$animal = AnimalModel::select($_GET['animalId']);
        $animal = AnimalModel::select(filter_input(INPUT_GET, 'animalId', FILTER_VALIDATE_INT));
        $view = new AnimalView($animal);
        return $view->render(AnimalView::EDIT);
    }

    public function createAnimal(): string
    {
        //There are different ways to handle this. We create a "dummy" animal instance for the view.
        $animal = AnimalModel::create('', 0);
        $view = new AnimalView($animal);
        return $view->render(AnimalView::CREATE);
    }

    public function save(): string
    {
        if (isset($_POST['animalId']) == false) {
            //During creation the form does not send the animalId.
            //$animal = AnimalModel::create($_POST['animalName'], $_POST['speciesId']);
            $animal = AnimalModel::create(filter_input(INPUT_POST, 'animalName'), filter_input(INPUT_POST, 'speciesId', FILTER_VALIDATE_INT));
        } else {
            //$animal = AnimalModel::select($_POST['animalId']);
            //$animal->animalName = $_POST['animalName'];
            //$animal->speciesId = $_POST['speciesId'];
            $animal = AnimalModel::select(filter_input(INPUT_POST, 'animalId'));
            $animal->animalName = (filter_input(INPUT_POST, 'animalName'));
            $animal->speciesId = (filter_input(INPUT_POST, 'speciesId', FILTER_VALIDATE_INT));
        }

        if ($animal->save() == true) {
            //We just return a string for now.
            return 'Data was saved.';
        } else {
            //We just return a string for now.
            return 'Data could not be saved.';
        }
    }
}
