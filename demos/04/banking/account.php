<?php

session_start();
$name =  $_SESSION['name'];
$balance = $_SESSION['balance'];
?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Banking Login</title>
  <meta charset="UTF-8" />
</head>

<body>
  <p>Welcome, <?= htmlspecialchars($name) ?>!</p>
  <p>This is you bank account balance: <?= htmlspecialchars($balance) ?></p>
  <button type="button" onclick="alert('Money successfully transferred.')">Transfer money</button>
</body>

</html>