<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Read all users and books in 'kindle' format.
$isbn = filter_input(INPUT_GET, 'isbn');
$sqlBook = "SELECT title, author, isbn FROM books WHERE isbn = '$isbn';";

try {
    $statement = $pdo->query($sqlBook);
    $book = $statement->fetch(PDO::FETCH_ASSOC);
    if ($book === false) {
        logMessage("Book not found: " . $isbn);
    }
} catch (PDOException $e) {
    logMessage("Select failed: " . $e->getMessage());
}
?>

<!doctype html>
<html lang="en-US">

<head>
    <title>Result (Bad Way)</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Result</h1>
    <h2>Book Data</h2>
    <?php if ($book !== false): ?>
        <p>Title: <?= htmlspecialchars($book['title']) ?></p>
        <p>Author: <?= htmlspecialchars($book['author']) ?></p>
        <p>ISBN: <?= htmlspecialchars($book['isbn']) ?></p>
    <?php endif; ?>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>