/* Database for animals */
SHOW DATABASES;
CREATE DATABASE animals_demo;
SHOW DATABASES;
USE animals_demo;
SHOW TABLES;

/* Table for species 
   Columns: species_id, species_name, diet_type, is_endangered
*/ 
CREATE TABLE species (
    species_id INT AUTO_INCREMENT PRIMARY KEY,
    species_name VARCHAR(100),
    diet_type ENUM ('carnivore', 'herbivore', 'omnivore'),
    is_endangered BOOLEAN
);

SHOW TABLES;
DESCRIBE species;

/* Table for animals 
   Columns: animal_id, animal_name, species_id
*/ 
CREATE TABLE animals (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_name VARCHAR(100),
    species_id INT,
    FOREIGN KEY (species_id) REFERENCES species(species_id)
);

SHOW TABLES;
DESCRIBE animals;
