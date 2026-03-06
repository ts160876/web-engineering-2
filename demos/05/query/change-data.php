<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Statement to create a user
$createUser = 'INSERT INTO users VALUES (NULL, "Fritz", "Fischer", "fischers-fritz@meer.de", "Pw1234!", FALSE)';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Change Data</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Change Data</h1>
    <h2>Create a user via query()</h2>
    <?php
    $statement = $pdo->query($createUser);
    var_dump($statement);
    //It is possible to get the last key from lastInsertId(), if AUTO_INCREMENT is used for the primary key.
    var_dump($pdo->lastInsertId())
    ?>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>