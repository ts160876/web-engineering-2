<?php
session_start();
if (!isset($_SESSION['animals'])) {
  $_SESSION['animals'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Name of the animal (we do not do not check the input)
  $name = filter_input(INPUT_POST, 'name');
  array_push($_SESSION['animals'], $name);
}
?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Zoo application (with sessions)</title>
  <meta charset="UTF-8" />
</head>

<body>
  <p>You can add animals to the zoo:</p>
  <form method="post">
    <label for="name">Name</label>
    <input type="text" name="name" />
    <br />
    <button type="submit">Add animal</button>
  </form>

  <p>These animals are currently in the zoo:</p>
  <?php if (!empty($_SESSION['animals'])): ?>
    <ul>
      <?php foreach ($_SESSION['animals'] as $animal): ?>
        <li><?= htmlspecialchars($animal) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>

</html>