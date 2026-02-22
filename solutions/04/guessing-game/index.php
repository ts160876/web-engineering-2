<?php
const COOKIE_GUESSES = 'guesses';
const COOKIE_ANIMAL = 'animal';
const INITIAL_NUMBER_OF_GUESSES = 3;
const USER_GUESSED_CORRECTLY = 99;
$animals = array(
  'ALLIGATOR',
  'BEAR',
  'CAMEL',
  'CHEETAH',
  'ELEPHANT',
  'FLAMINGO',
  'GIRAFFE',
  'HIPPO',
  'HYENA',
  'IGUANA',
  'KANGAROO',
  'KOALA',
  'LION',
  'MONKEY',
  'SNAKE'
);

//Check if a cookie 'guesses' has been sent from the browser.
if (!isset($_COOKIE[COOKIE_GUESSES])) {
  //If no cookie has been sent from the browser, we need to create the cookie with 'initial' values.
  $guesses = INITIAL_NUMBER_OF_GUESSES;
  $animalIndex = random_int(0, 14);
  $animal = $animals[$animalIndex];
  setcookie(COOKIE_GUESSES, $guesses, ['httponly' => true]);
  setcookie(COOKIE_ANIMAL, $animal, ['httponly' => true]);
} else {
  //If a cookies has been sent from the browser, we read the guesses and animal from the cookie.
  $guesses = filter_input(INPUT_COOKIE, COOKIE_GUESSES, FILTER_VALIDATE_INT);
  $animal = filter_input(INPUT_COOKIE, COOKIE_ANIMAL);
}

//In case of POST method, we process the form.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = filter_input(INPUT_POST, 'action');
  //Check which of the two buttons has been pressed.
  if ($action == 'guess') {
    //Button 'Guess' has been pressed
    $guessesAnimal = strtoupper(filter_input(INPUT_POST, 'animal'));
    $guesses = $guesses - 1;
    if ($guessesAnimal == $animal) {
      //Not a very nice approach but working. By setting the number of guesses to constant USER_GUESSED_CORRECTLY we know the game is won.
      $guesses = USER_GUESSED_CORRECTLY;
    }
  } else {
    //Button 'Restart game' has been pressed.
    $guesses = INITIAL_NUMBER_OF_GUESSES;
    $animalIndex = random_int(0, 14);
    $animal = $animals[$animalIndex];
  }

  //Update the cookies at the end of form processing...
  setcookie(COOKIE_GUESSES, $guesses, ['httponly' => true]);
  setcookie(COOKIE_ANIMAL, $animal, ['httponly' => true]);
  //... and redirect.
  header("Location: index.php", true, 303);
}

?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Guessing game</title>
  <meta charset="UTF-8" />
</head>

<body>

  <p>Our zoo has many animals: alligator, bear, camel, cheetah, elephant, flamingo, giraffe, hippo, hyena, iguana, kangaroo, koala, lion, monkey, snake</p>
  <?php if ($guesses != USER_GUESSED_CORRECTLY): ?>
    <p>One has escaped. Guess which one. You have <?= htmlspecialchars($guesses) ?> guesses left.</p>
  <?php else: ?>
    <p>You guesses correctly. The <?= htmlspecialchars($animal) ?> has escaped.</p>
  <?php endif; ?>

  <form method="post">
    <label for="animal">Animal</label>
    <input type="text" name="animal" />
    <br />
    <button type="submit" name="action" value="guess" <?php if ($guesses < 1 || $guesses == USER_GUESSED_CORRECTLY) echo 'disabled'; ?>>Guess</button>
    <button type="submit" name="action" value="restart">Restart game</button>
  </form>

</body>

</html>