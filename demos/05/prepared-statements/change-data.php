<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Statement to create a user
$sqlCreateUser = 'INSERT INTO users VALUES (NULL, :first_name, :last_name, :email, :pwd, :is_admin);';
//Statement to update the email of a user
$sqlUpdateUser  = 'UPDATE users SET email = :email WHERE user_id = :user_id;';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Change Data</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Change Data (Prepared Statements)</h1>
    <h2>Create a user</h2>
    <?php
    try {
        $statement = $pdo->prepare($sqlCreateUser);
        $result = $statement->execute([
            'first_name' => 'Benjamin',
            'last_name' => 'Baier',
            'email' => 'benjamin@baier.com',
            'pwd' => 'Pw1234!',
            'is_admin' => 0
        ]);
    } catch (PDOException $e) {
        logMessage("User creation failed: " . $e->getMessage());
    }
    $user_id = $pdo->lastInsertId();
    var_dump($result);
    var_dump($user_id);
    ?>

    <h2>Update the email of a user</h2>
    <?php
    if ($user_id != NULL) {
        try {
            $statement = $pdo->prepare($sqlUpdateUser);
            $result = $statement->execute([
                'email' => 'benjamin@baier.de',
                'user_id' => $user_id
            ]);
        } catch (PDOException $e) {
            logMessage("User update failed: " . $e->getMessage());
        }
    }
    var_dump($result);
    ?>

    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>