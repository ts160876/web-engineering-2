<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Statement to create a user
$createUser = 'INSERT INTO users VALUES (NULL, "Fritz", "Fischer", "fischers-fritz@meer.com", "Pw1234!", FALSE)';
try {
    $statement = $pdo->query($createUser);
} catch (PDOException $e) {
    echo "Insert failed: " . $e->getMessage();
}
echo "Record created with key " . $pdo->lastInsertId();
