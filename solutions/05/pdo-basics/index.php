<?php
$host = 'localhost';
$db = 'bukubuku';
//In real life NEVER store your credentials in the code.
$username = 'root';
$password = 'root';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$messages = array();

function logMessage($message)
{
    global $messages;
    array_push($messages, $message);
}

try {
    $pdo = new PDO($dsn, $username, $password);
    $sqlBooks = 'SELECT books.book_id, books.title, books.isbn, books.checkout_status, users.first_name, users.last_name from books inner join checkouts on checkouts.book_id = books.book_id inner join users on users.user_id = checkouts.user_id where books.checkout_status = "checked_out" ORDER BY books.book_id;';
    $statement = $pdo->query($sqlBooks);
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    logMessage("Something went wrong: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Books currently checked out</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Books currently checked out</h1>
    <h2>Books</h2>
    <table border="1px solid">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Checkout Status</th>
            <th>Checkout User </th>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['book_id']) ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['isbn']) ?></td>
                <td><?= htmlspecialchars($book['checkout_status']) ?></td>
                <td><?= htmlspecialchars($book['first_name'] . ' ' . $book['last_name']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>