<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Read all users and books in 'kindle' format.
$sqlUsers = 'SELECT first_name, last_name FROM users;';
$sqlBooks = 'SELECT title, author, isbn, format FROM books WHERE format = :format;';

try {
    $statement = $pdo->prepare($sqlUsers);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare($sqlBooks);
    $statement->execute(['format' => 'kindle']);
    $kindleBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->execute(['format' => 'hardcover']);
    $hardcoverBooks = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    logMessage("Select failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Select Data (Prepared Statements)</title>
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
    <h2>Books (Kindle)</h2>
    <table border="1px solid">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Format</th>
        </tr>
        <?php foreach ($kindleBooks as $kindleBook): ?>
            <tr>
                <td><?= htmlspecialchars($kindleBook['title']) ?></td>
                <td><?= htmlspecialchars($kindleBook['author']) ?></td>
                <td><?= htmlspecialchars($kindleBook['isbn']) ?></td>
                <td><?= htmlspecialchars($kindleBook['format']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Books (Hardcover)</h2>
    <table border="1px solid">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Format</th>
        </tr>
        <?php foreach ($hardcoverBooks as $hardcoverBook): ?>
            <tr>
                <td><?= htmlspecialchars($hardcoverBook['title']) ?></td>
                <td><?= htmlspecialchars($hardcoverBook['author']) ?></td>
                <td><?= htmlspecialchars($hardcoverBook['isbn']) ?></td>
                <td><?= htmlspecialchars($hardcoverBook['format']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>