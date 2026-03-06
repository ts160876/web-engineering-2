<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Query to read all users.
$sqlUsers = 'SELECT first_name, last_name FROM users WHERE first_name = :first_name;';
$statement = $pdo->prepare($sqlUsers);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Bindings</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Bindings</h1>

    <h2>Binding: execute() with array</h2>
    <?php
    echo '$statement->execute(["first_name" => "Max"]);';
    $statement->execute(['first_name' => 'Max']);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    ?>

    <h2>Binding: bindValue()</h2>
    <?php
    $firstName = 'Artur';
    var_dump($firstName);
    echo '$statement->bindValue("first_name", $firstName);';
    $statement->bindValue('first_name', $firstName);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    $firstName = 'Max';
    var_dump($firstName);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    ?>

    <h2>Binding: bindParam()</h2>
    <?php
    $firstName = 'Artur';
    var_dump($firstName);
    echo '$statement->bindParam("first_name", $firstName);';
    $statement->bindParam('first_name', $firstName);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    $firstName = 'Max';
    var_dump($firstName);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    ?>

    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>