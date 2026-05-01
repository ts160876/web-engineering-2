<?php

namespace Exercise6;

include_once 'AnimalModel.php';
include_once 'AnimalView.php';

class AnimalController
{

    public function editAnimal(): string
    {
        //We do not bother about error handling here. The animal might not exist.
        $animal = $this->getFlashMemory('animal');
        if ($animal == null) {
            $animal = AnimalModel::select(filter_input(INPUT_GET, 'animalId', FILTER_VALIDATE_INT));
        }
        $view = new AnimalView($animal);
        return $view->render(AnimalView::EDIT, $this->getFlashMemory('message') ?? '');
    }

    public function createAnimal(): string
    {
        $animal = $this->getFlashMemory('animal');
        if ($animal == null) {
            //There are different ways to handle this. We create a "dummy" animal instance for the view.
            $animal = AnimalModel::create('', 0);
        }
        $view = new AnimalView($animal);
        return $view->render(AnimalView::CREATE, $this->getFlashMemory('message') ?? '');
    }

    public function save()
    {
        if (isset($_POST['animalId']) == false) {
            //During creation the form does not send the animalId.
            $animal = AnimalModel::create(filter_input(INPUT_POST, 'animalName'), filter_input(INPUT_POST, 'speciesId', FILTER_VALIDATE_INT));
        } else {
            $animal = AnimalModel::select(filter_input(INPUT_POST, 'animalId'));
            $animal->animalName = (filter_input(INPUT_POST, 'animalName'));
            $animal->speciesId = (filter_input(INPUT_POST, 'speciesId', FILTER_VALIDATE_INT));
        }

        if ($animal->save() == true) {
            $this->setFlashMemory('message', 'Data was saved');
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            $this->setFlashMemory('animal', $animal);
            $this->setFlashMemory('message', 'Data could not be saved');
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    //Simple flash memory implementation:
    //Set flash memory.
    private function setFlashMemory($key, $value)
    {
        $_SESSION['flash'][$key] = $value;
    }

    //Get flash memory.
    private function getFlashMemory($key)
    {
        $value = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]);
        return $value;
    }
}
