<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Read all books in 'kindle' format.
$sqlBooks = 'SELECT title, author, isbn FROM books WHERE format = "kindle";';
try {
    $statement = $pdo->query($sqlBooks);
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Select failed: " . $e->getMessage();
}
foreach ($books as $book) {
    echo $book['title'] . ' ' . $book['author'] . ' ' . $book['isbn'] . '<br>';
}
