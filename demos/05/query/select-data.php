<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Read all users and books in 'kindle' format.
$sqlUsers = 'SELECT first_name, last_name FROM users;';
$sqlBooks = 'SELECT title, author, isbn FROM books WHERE format = "kindle";';
try {
    $statement = $pdo->query($sqlUsers);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement = $pdo->query($sqlBooks);
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    logMessage("Select failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Select Data</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Select Data</h1>
    <h2>Users</h2>
    <table border="1px solid">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['first_name']) ?></td>
                <td><?= htmlspecialchars($user['last_name']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Books</h2>
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
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>