<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = filter_input(INPUT_POST, 'name');
  session_start();
  $_SESSION['name'] = $name;
  $_SESSION['balance'] = rand(1000, 50000);
  header('Location: account.php');
}
?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Banking Login</title>
  <meta charset="UTF-8" />
</head>

<body>
  <p>Login to your bank account</p>
  <form method="post">
    <label for="name">Name</label>
    <input type="text" name="name" />
    <br />
    <button type="submit">Logon</button>
  </form>
</body>

</html>