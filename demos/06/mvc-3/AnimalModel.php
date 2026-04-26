<?php

namespace mvc3;

class AnimalModel
{

    static private ?\PDO $pdo = null;
    public int $animalId = 0;
    public string $animalName = '';
    public int $speciesId = 0;
    private array $errors = [];

    //Get PDO object.
    static private function getPdo(): \PDO
    {
        if (static::$pdo === null) {
            $host = 'localhost';
            $dbname = 'animals_demo';
            $username = 'root';
            $password = 'root';

            static::$pdo =  new \PDO(
                'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=UTF8',
                $username,
                $password
            );
        }
        return static::$pdo;
    }

    //Constructor for a new instance of the model.
    private function __construct(int $animalId, string $animalName, int $speciesId)
    {
        $this->animalId = $animalId;
        $this->animalName = $animalName;
        $this->speciesId = $speciesId;
    }

    //Validate the object.
    public function validate(): bool
    {
        $this->errors = [];

        //Check animal name.
        if (strlen($this->animalName) <= 0) {
            $this->errors['animalName'] = 'Enter an animal name.';
        }

        //Check species ID.
        if ($this->speciesId == 0) {
            $this->errors['speciesId'] = 'Enter a species ID.';
        } elseif (static::checkSpeciesId($this->speciesId) === false) {
            $this->errors['speciesId'] = 'The species ID does not exist.';
        }

        //Check if there are errors.
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

    //Save the object.
    public function save(): bool
    {
        if ($this->validate() === true) {
            if ($this->animalId === 0) {
                //New animal -> INSERT.
                return (bool) $this->insert();
            } else {
                //Existing animal -> UPDATE.
                return (bool) $this->update();
            }
        } else {
            //Validation failed. Save cannot be executed.
            return false;
        }
    }

    //Insert a new animal.
    private function insert(): int
    {
        $statement = static::getPdo()->prepare(
            'INSERT INTO animals (animal_name, species_id) VALUES (:animal_name, :species_id)'
        );

        $statement->execute(['animal_name' => $this->animalName, 'species_id' => $this->speciesId]);
        $this->animalId = (int) static::getPdo()->lastInsertId();
        return $this->animalId;
    }

    //Update an existing animal.
    private function update(): int
    {
        $statement = static::getPdo()->prepare(
            'UPDATE animals set animal_name = :animal_name, species_id = :species_id WHERE animal_id = :animal_id'
        );

        $statement->execute(['animal_name' => $this->animalName, 'species_id' => $this->speciesId, 'animal_id' => $this->animalId]);
        return (int) $statement->rowCount();
    }

    //Create a new animal 
    static public function create(string $animalName, int $speciesId)
    {
        return new AnimalModel(0, $animalName, $speciesId);
    }

    //Read a single animal.
    static public function select(int $animalId): AnimalModel
    {
        $statement = static::getPdo()->prepare(
            'SELECT animal_id AS animalId, animal_name AS animalName, species_id as speciesId FROM animals WHERE animal_id = :animal_id'
        );
        $statement->execute(['animal_id' => $animalId]);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return new AnimalModel($row['animalId'], $row['animalName'], $row['speciesId']);
    }

    //Read all animals.
    static public function selectAll(): array
    {
        $statement = static::getPdo()->prepare(
            'SELECT animal_id AS animalId, animal_name AS animalName, species_id as speciesId FROM animals;'
        );
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $animals = [];
        foreach ($rows as $row) {
            $animals[] = new AnimalModel($row['animalId'], $row['animalName'], $row['speciesId']);
        }
        return $animals;
    }

    //Check the existence of species.
    static private function checkSpeciesId(int $speciesId): bool
    {
        $statement = static::getPdo()->prepare('SELECT COUNT(*) FROM species WHERE species_id = :species_id');
        $statement->execute(['species_id' => $speciesId]);
        return $statement->fetchColumn();
    }
}
