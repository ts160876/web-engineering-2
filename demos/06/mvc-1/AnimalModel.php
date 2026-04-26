<?php

namespace mvc1;

class AnimalModel
{

    static private ?\PDO $pdo = null;

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

    //Insert a new animal.
    static public function insert(string $animalName, int $speciesId): int
    {
        $statement = static::getPdo()->prepare(
            'INSERT INTO animals (animal_name, species_id) VALUES (:animal_name, :species_id)'
        );

        $statement->execute(['animal_name' => $animalName, 'species_id' => $speciesId]);
        return (int) static::getPdo()->lastInsertId();
    }

    //Update an existing animal.
    static public function update(int $animalId, string $animalName, int $speciesId): int
    {
        $statement = static::getPdo()->prepare(
            'UPDATE animals set animal_name = :animal_name, species_id = :species_id WHERE animal_id = :animal_id'
        );

        $statement->execute(['animal_name' => $animalName, 'species_id' => $speciesId, 'animal_id' => $animalId]);
        return (int) $statement->rowCount();
    }

    //Read a single animal.
    static public function select(int $animalId): array
    {
        $statement = static::getPdo()->prepare(
            'SELECT animal_id AS animalId, animal_name AS animalName, species_id as speciesId FROM animals WHERE animal_id = :animal_id'
        );
        $statement->execute(['animal_id' => $animalId]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    //Read all animals.
    static public function selectAll(): array
    {
        $statement = static::getPdo()->prepare(
            'SELECT animal_id AS animalId, animal_name AS animalName, species_id as speciesId FROM animals;'
        );
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
