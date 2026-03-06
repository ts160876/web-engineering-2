/* Database for animals */
USE animals_exercise;

/* Table for enclosures
   Columns: enclosure_id, enclosure_name, habitat_type, size_sqm
*/ 
CREATE TABLE enclosures (
    enclosure_id INT AUTO_INCREMENT PRIMARY KEY,
    enclosure_name VARCHAR(100),
    enclosure_type ENUM ('aquatic', 'forest', 'grassland', 'jungle', 'savannah'),
    size_sqm INT
);

/* Table for animals 
   Columns: animal_id, animal_name, species_id, enclosure_id, birthdate, gender
*/ 
CREATE TABLE animals (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_name VARCHAR(100),
    species_id INT,
    enclosure_id INT,
    birthdate DATE,
    gender ENUM ('male', 'female'),
    FOREIGN KEY (species_id) REFERENCES species(species_id),
    FOREIGN KEY (enclosure_id) REFERENCES enclosures(enclosure_id)
);

/* Create enclosures */
INSERT INTO enclosures
  VALUES (NULL, 'Alligator Pond', 'aquatic', 500),
         (NULL, 'Hippo Lagoon', 'aquatic', 800),
         (NULL, 'Cheetah Plains', 'savannah', 1000),
         (NULL, 'Giraffe Grassland', 'grassland', 1500),
         (NULL, 'Lion Savannah', 'savannah', 1200),
         (NULL, 'Monkey Jungle', 'jungle', 400),
         (NULL, 'Elephant Grassland', 'grassland', 2000);

SELECT * FROM enclosures;

/* Create animals */
INSERT INTO animals
  VALUES (NULL, 'Anton', 1, 1, '1980-01-15', 'male'),
         (NULL, 'Gerd', 1, 1, '1993-11-15', 'male'),
         (NULL, 'Felix', 2, 3, '2018-04-05', 'male'), 
         (NULL, 'Anna', 3, 4, '2019-12-04', 'female'), 
         (NULL, 'Karl', 3, 3, '2005-08-23', 'male'), 
         (NULL, 'Herta', 4, 2, '2017-07-30', 'female'), 
         (NULL, 'Ludwig', 4, 2, '2024-09-09', 'male'), 
         (NULL, 'Max', 5, 6, '2020-02-27', 'male');

SELECT * FROM animals;

/* List all animals born before 2019 */
SELECT * FROM animals
  WHERE birthdate < '2019-01-01';

/* List all enclosures with the corresponding animals and their species (name) */
SELECT enclosures.enclosure_name, animals.animal_name, species.species_name 
  FROM enclosures
  INNER JOIN animals
          ON animals.enclosure_id = enclosures.enclosure_id
  INNER JOIN species 
          ON species.species_id = animals.species_id;

/* List the number of male and female animals */
SELECT gender, COUNT(animal_id) FROM animals
  GROUP BY gender;

/* List all enclosures with the number of animals per diet */
SELECT enclosures.enclosure_name, species.diet_type, COUNT(animals.animal_id)
  FROM enclosures
  INNER JOIN animals
          ON animals.enclosure_id = enclosures.enclosure_id
  INNER JOIN species 
          ON species.species_id = animals.species_id
  GROUP BY enclosures.enclosure_name, species.diet_type;

/* List all 'Grassland' enclosures */
SELECT * FROM enclosures WHERE enclosure_name LIKE '%Grassland%';