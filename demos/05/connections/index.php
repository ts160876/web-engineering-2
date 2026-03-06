<?php
//Create the PDO object in establish-connection.php.
include_once('establish-connection.php');
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Establish Database Connection</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Establish Database Connection</h1>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>