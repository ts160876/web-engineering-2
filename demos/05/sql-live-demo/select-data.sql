/* Select all animals */
SELECT * FROM animals; 

/* Only display the animal names */
SELECT animal_name FROM animals; 

/* Select all species */
SELECT * FROM species;

/* Only show animals eating meat */
SELECT species_name, diet_type FROM species
  WHERE diet_type IN ( 'carnivore', 'omnivore');

/* Count the animals */
SELECT COUNT(animal_id) FROM animals;

/* Count the animals and group by species */
SELECT species_id, COUNT(animal_id) FROM animals
  GROUP BY species_id;

/* Join with the species table */
SELECT species.species_name, COUNT(animals.animal_id) FROM animals 
  INNER JOIN species  
          ON species.species_id = animals.species_id
  GROUP BY species_name;
