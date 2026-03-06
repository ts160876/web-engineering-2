/* Create species */
INSERT INTO species 
  VALUES (NULL, 'Alligator', 'carnivore', FALSE),
         (NULL, 'Cheetah', 'carnivore', TRUE), 
         (NULL, 'Giraffe', 'herbivore', FALSE), 
         (NULL, 'Hippo', 'herbivore', FALSE), 
         (NULL, 'Monkey', 'omnivore', FALSE);

SELECT * FROM species;

/* Show ENUM validation */
INSERT INTO species
  VALUES (NULL, 'Snake', 'eats everything', FALSE);

SELECT * FROM species;

/*Create animals */
INSERT INTO animals
  VALUES (NULL, 'Anton', 1),
         (NULL, 'Gerd', 1),
         (NULL, 'Felix', 2), 
         (NULL, 'Anna', 3), 
         (NULL, 'Karl', 3), 
         (NULL, 'Herta', 4), 
         (NULL, 'Ludwig', 4), 
         (NULL, 'Max', 5);

SELECT * FROM animals; 

/* Show FOREIGN key validation */ 
INSERT INTO animals
  VALUES (NULL, 'Karl-Heinz', 6);

SELECT * FROM animals; 

DELETE FROM species
  WHERE species_id = 5;

SELECT * FROM species;
