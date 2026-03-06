/* Database for animals */
SHOW DATABASES;
CREATE DATABASE animals_exercise;
SHOW DATABASES;
USE animals_exercise;
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

/* Create species */
INSERT INTO species 
  VALUES (NULL, 'Alligator', 'carnivore', FALSE),
         (NULL, 'Cheetah', 'carnivore', TRUE), 
         (NULL, 'Giraffe', 'herbivore', FALSE), 
         (NULL, 'Hippo', 'herbivore', FALSE), 
         (NULL, 'Monkey', 'omnivore', FALSE);

SELECT * FROM species;

/* Create one more species */
INSERT INTO species 
  VALUES (NULL, 'Snake', 'carnivore', FALSE);

SELECT * FROM species;

/* Delete the species and create it again */
DELETE FROM species
  WHERE species_name = 'Snake';

SELECT * FROM species;

INSERT INTO species 
  VALUES (NULL, 'Snake', 'carnivore', FALSE);

SELECT * FROM species;
  
/* Count and group by */
SELECT COUNT(species_id), diet_type FROM species
  GROUP BY diet_type;