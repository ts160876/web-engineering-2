<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Statement to update the email of a user
$user_id = 1;
$sqlUpdateUser  = 'UPDATE users SET email = :email WHERE user_id = :user_id;';
try {
    $statement = $pdo->prepare($sqlUpdateUser);
    $result = $statement->execute([
        'email' => 'benjamin@baier.de',
        'user_id' => $user_id
    ]);
} catch (PDOException $e) {
    logMessage("User update failed: " . $e->getMessage());
}
