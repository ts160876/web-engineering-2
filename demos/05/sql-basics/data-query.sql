/* This file demonstrates the Data Querly Language (DQL). */

/* Basic SELECT statement, reading all columns */
SELECT * FROM books;

/* SELECT statement, restricting the number of columns */
SELECT title, author FROM books;

/* SELECT statement, restricing the number of rows */
SELECT * FROM books
         WHERE format = 'hardcover';

/* SELECT statement, restricting the number of columns and rows */
SELECT title, author, published, format 
       FROM books
       WHERE (    format = 'audio_book' 
               OR format = 'kindle' )
         AND published > '2024-11-01';

/* SELECT statement, using summarization (does probably not make much sense to summarize the number of pages in real life) */
SELECT SUM(pages) FROM books;

/* SELECT statement, using summarization and grouping */
SELECT SUM(pages), format FROM books  
       GROUP BY format;

/* SELECT statement, using counting and grouping */
SELECT COUNT(*), format FROM books
       GROUP BY format;

/* SELECT statement, ordering the result */
SELECT title, author, published
       FROM books
       ORDER BY published, title;

/* Nested SELECT statements (already quite sophisticated) */
SELECT title, author FROM books  
       WHERE pages = (SELECT MIN(pages) FROM books );

SELECT title, author FROM books  
       WHERE pages = (SELECT MAX(pages) FROM books );

/* SELECT statement, using aliases */
SELECT MIN(pages) AS min_pages, MAX(pages) as max_pages 
       FROM books;

/* SELECT checkouts */
SELECT user_id, book_id FROM checkouts;

/* JOIN between checkouts and users and books */
SELECT users.first_name, users.last_name, books.title, books.author
       FROM checkouts
       INNER JOIN users
               ON users.user_id = checkouts.user_id
       INNER JOIN books   
               ON books.book_id = checkouts.book_id;
