<?php

namespace mvc6;

include_once 'AnimalModel.php';
include_once 'AnimalView.php';

class AnimalController
{
    public function handleRequest()
    {
        //Need a session for the flash memory to work.
        session_start();

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
        $animal = AnimalModel::select($_GET['animalId']);
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

    public function save(): string
    {
        if (isset($_POST['animalId']) == false) {
            //During creation the form does not send the animalId.
            $animal = AnimalModel::create($_POST['animalName'], $_POST['speciesId']);
        } else {
            $animal = AnimalModel::select($_POST['animalId']);
            $animal->animalName = $_POST['animalName'];
            $animal->speciesId = $_POST['speciesId'];
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
