<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Read all books in 'kindle' format. Afterwards select all in 'hardcover' format.
$sqlBooks = 'SELECT title, author, isbn, format FROM books WHERE format = :format;';
try {
    $statement = $pdo->prepare($sqlBooks);
    $statement->execute(['format' => 'kindle']);
    $kindleBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->execute(['format' => 'hardcover']);
    $hardcoverBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Select failed: " . $e->getMessage();
}
echo 'kindle' . '<br>';
foreach ($kindleBooks as $kindleBook) {
    echo $kindleBook['title'] . ' ' . $kindleBook['author'] . ' ' . $kindleBook['isbn'] . '<br>';
}
echo 'hardcover' . '<br>';
foreach ($hardcoverBooks as $hardcoverBook) {
    echo $hardcoverBook['title'] . ' ' . $hardcoverBook['author'] . ' ' . $hardcoverBook['isbn'] . '<br>';
}
