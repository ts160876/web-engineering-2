<?php
const COOKIE_NAME = 'animals';
$animals = array();

//Check if a cookie 'webengineering_cookie' has been sent from the browser.
if (isset($_COOKIE[COOKIE_NAME])) {
  $animals = json_decode(filter_input(INPUT_COOKIE, COOKIE_NAME));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Name of the animal (we do not do not check the input)
  $name = filter_input(INPUT_POST, 'name');
  array_push($animals, $name);
  setcookie(COOKIE_NAME, json_encode($animals));
}
?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Zoo application</title>
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
  <?php if (!empty($animals)): ?>
    <ul>
      <?php foreach ($animals as $animal): ?>
        <li><?= htmlspecialchars($animal) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>

</html>