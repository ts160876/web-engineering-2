<?php

namespace Solution6;

class SpeciesModel
{

    static private ?\PDO $pdo = null;
    public int $speciesId = 0;
    public string $speciesName = '';
    public string $dietType = '';
    public int $isEndangered = 0;
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
    private function __construct(int $speciesId, string $speciesName, string $dietType, int $isEndangered)
    {
        $this->speciesId = $speciesId;
        $this->speciesName = $speciesName;
        $this->dietType = $dietType;
        $this->isEndangered = $isEndangered;
    }

    //Validate the object.
    public function validate(): bool
    {
        $this->errors = [];

        //Check species name.
        if (strlen($this->speciesName) <= 0) {
            $this->errors['speciesName'] = 'Enter a species name.';
        }

        //Check the diet.
        if ($this->dietType != 'carnivore' && $this->dietType != 'herbivore' & $this->dietType != 'omnivore') {
            $this->errors['dietType'] = 'The diet type is not valid.';
        }

        //Check if there are errors.
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

    public function getError(string $property)
    {
        return $this->errors[$property] ?? '';
    }

    //Save the object.
    public function save(): bool
    {
        if ($this->validate() === true) {
            if ($this->speciesId === 0) {
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
            'INSERT INTO species (species_name, diet_type, is_endangered) VALUES (:species_name, :diet_type, :is_endangered)'
        );

        $statement->execute(['species_name' => $this->speciesName, 'diet_type' => $this->dietType, 'is_endangered' => $this->isEndangered]);
        $this->speciesId = (int) static::getPdo()->lastInsertId();
        return $this->speciesId;
    }

    //Update an existing animal.
    private function update(): int
    {
        $statement = static::getPdo()->prepare(
            'UPDATE species set species_name = :species_name, diet_type = :diet_type, is_endangered = :is_endangered WHERE species_id = :species_id'
        );

        $statement->execute(['species_name' => $this->speciesName, 'diet_type' => $this->dietType, 'is_endangered' => $this->isEndangered, 'species_id' => $this->speciesId]);
        return (int) $statement->rowCount();
    }

    //Create a new animal 
    static public function create(string $speciesName, string $dietType, int $isEndangered)
    {
        return new SpeciesModel(0, $speciesName, $dietType, $isEndangered);
    }

    //Read a single animal.
    static public function select(int $speciesId): SpeciesModel
    {
        $statement = static::getPdo()->prepare(
            'SELECT species_id AS speciesId, species_name AS speciesName, diet_type AS dietType, is_endangered AS isEndangered FROM species WHERE species_id = :species_id'
        );
        $statement->execute(['species_id' => $speciesId]);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return new SpeciesModel($row['speciesId'], $row['speciesName'], $row['dietType'], $row['isEndangered']);
    }

    //Read all animals.
    static public function selectAll(): array
    {
        $statement = static::getPdo()->prepare(
            'SELECT species_id AS speciesId, species_name AS speciesName, diet_type AS dietType, is_endangered AS isEndangered FROM species;'
        );
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $animals = [];
        foreach ($rows as $row) {
            $animals[] = new SpeciesModel($row['speciesId'], $row['speciesName'], $row['dietType'], $row['isEndangered']);
        }
        return $animals;
    }
}
