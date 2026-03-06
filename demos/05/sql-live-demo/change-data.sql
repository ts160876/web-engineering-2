/* Update record */
SELECT * FROM animals;

UPDATE animals
  SET animal_name = 'Anton II'
  WHERE animal_id = 1;

SELECT * FROM animals;

/* Delete record(s) */
DELETE FROM animals
  WHERE animal_name = 'Karl'
     OR animal_name = 'Herta';

SELECT * FROM animals;