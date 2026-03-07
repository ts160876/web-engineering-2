<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//Query to read all users.
//I use aliases this time to ensure that PDO::FETCH_CLASS works without hassle.
$sqlUsers = 'SELECT first_name AS firstName, last_name AS lastName FROM users;';

//Define a user class
class SimpleUser
{
    public $firstName;
    public $lastName;
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Fetch Methods</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Fetch Methods</h1>

    <h2>Method: fetchAll() with PDO::FETCH_ASSOC</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //The fetchAll() method reads all rows at once.
    //$users is a 2-dimensional array.
    //The 'outer' array represents the rows of the result set.
    //The 'inner' array represents the columns of one row.
    //They key of the 'inner' array are the column names.
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
    ?>

    <h2>Method: fetchAll() with PDO::FETCH_NUM</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //In contrast to PDO:FETCH_ASSOC, the key of the 'inner' array are the 
    //column indexes. 
    $users = $statement->fetchAll(PDO::FETCH_NUM);
    var_dump($users);
    ?>

    <h2>Method: fetchAll() with PDO::FETCH_COLUMN</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //$users is a 1-dimensional array. It includes all values from the specific column.
    //The result set, of course, depends on the WHERE-clause.
    $users = $statement->fetchAll(PDO::FETCH_COLUMN, 1);
    var_dump($users);
    ?>

    <h2>Method: fetchAll() with PDO::FETCH_OBJ</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //$users is a 1-dimensional array. It includes objects of class stdClass.
    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    var_dump($users);
    ?>

    <h2>Method: fetchAll() with PDO::FETCH_CLASS</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //$users is a 1-dimensional array. It includes objects of class SimpleUser.
    $users = $statement->fetchAll(PDO::FETCH_CLASS, 'SimpleUser');
    var_dump($users);
    ?>

    <h2>Method: fetch() with PDO::FETCH_ASSOC</h2>
    <?php
    $statement = $pdo->query($sqlUsers);
    //The fetch() methods reads row by row.
    //$user is a 1-dimensional array. It includes the columns of one row.
    while (($user = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
        var_dump($user);
    }
    ?>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>