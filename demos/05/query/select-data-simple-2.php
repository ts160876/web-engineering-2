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
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Select Data</title>
    <meta charset="UTF-8" />
</head>

<body>
    <table border="1px solid">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['isbn']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>