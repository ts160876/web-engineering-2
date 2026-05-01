<?php

namespace Solution6;

include_once 'SpeciesModel.php';
include_once 'SpeciesView.php';

class SpeciesController
{

    public function editSpecies(): string
    {
        //We do not bother about error handling here. The species might not exist.
        $species = $this->getFlashMemory('species');
        if ($species == null) {
            $species = SpeciesModel::select(filter_input(INPUT_GET, 'speciesId', FILTER_VALIDATE_INT));
        }
        $view = new SpeciesView($species);
        return $view->render(SpeciesView::EDIT, $this->getFlashMemory('message') ?? '');
    }

    public function createSpecies(): string
    {
        $species = $this->getFlashMemory('species');
        if ($species == null) {
            //There are different ways to handle this. We create a "dummy" animal instance for the view.
            $species = SpeciesModel::create('', '', 0);
        }
        $view = new SpeciesView($species);
        return $view->render(SpeciesView::CREATE, $this->getFlashMemory('message') ?? '');
    }

    public function save()
    {
        if (isset($_POST['speciesId']) == false) {
            //During creation the form does not send the animalId.
            $species = SpeciesModel::create(filter_input(INPUT_POST, 'speciesName'), filter_input(INPUT_POST, 'dietType'), filter_input(INPUT_POST, 'isEndangered', FILTER_VALIDATE_BOOL) ?? 0);
        } else {
            $species = SpeciesModel::select(filter_input(INPUT_POST, 'speciesId'));
            $species->speciesName = (filter_input(INPUT_POST, 'speciesName'));
            $species->dietType = (filter_input(INPUT_POST, 'dietType'));
            $species->isEndangered = (filter_input(INPUT_POST, 'isEndangered', FILTER_VALIDATE_BOOL) ?? 0);
        }

        if ($species->save() == true) {
            $this->setFlashMemory('message', 'Data was saved');
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            $this->setFlashMemory('species', $species);
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
