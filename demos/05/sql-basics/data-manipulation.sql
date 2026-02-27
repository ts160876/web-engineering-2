/* This file demonstrates the Data Manipulation Language (DML). */

/* Insert a new record. */
INSERT INTO books
VALUES (NULL, 'Einer flog über das Möwennest: Ein Küsten-Krimi', 'Krischan Koch', '978-3423449632' , '2026-02-26', 308, 'kindle' ,'available');

/* Try to insert a book with a wrong format. */
INSERT INTO books
VALUES (NULL, 'Einer flog über das Möwennest: Ein Küsten-Krimi', 'Krischan Koch', '978-3423449632' , '2026-02-26', 308, 'XXXXXX' ,'available');

/* Update a record. Don't forget the WHERE clause. */
UPDATE books
       SET title = 'Einer flog über das Möwennest'
       WHERE isbn = '978-3423449632';

/* Delete a record. Don't forget the WHERE clause. */
DELETE FROM books   
       WHERE isbn = '978-3423449632';

/* Try to delete a record. This will not work as long as there are checkouts for the user. */
DELETE FROM users    
       where user_id = 2;