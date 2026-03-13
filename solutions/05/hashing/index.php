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

//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO($dsn, $username, $password);
        //Start a new transaction.
        $pdo->beginTransaction();

        $statement = $pdo->prepare('SELECT * FROM users;');
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('UPDATE users SET pwd = :pwd WHERE user_id = :user_id;');

        foreach ($users as $user) {
            //Only hash the password, if it is not already a hash.
            if (password_get_info($user['pwd'])['algo'] === null) {
                $pwd = password_hash($user['pwd'], PASSWORD_BCRYPT);
                $user_id = $user['user_id'];
                $result = $statement->execute([
                    'pwd' => $pwd,
                    'user_id' => $user_id
                ]);

                if ($result !== true) {
                    logMessage("Something went wrong");
                    $pdo->rollBack();
                }
            }
        }
        $pdo->commit();
    } catch (PDOException $e) {
        logMessage("Something went wrong: " . $e->getMessage());
        $pdo->rollBack();
    }
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Hash the passwords</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Hash the passwords</h1>
    <form method="post">
        <button type="submit">Hash the passwords</button>
    </form>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>