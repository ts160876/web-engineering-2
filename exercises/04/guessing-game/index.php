<?php
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
?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Guessing game</title>
  <meta charset="UTF-8" />
</head>

<body>

  <p>Our zoo has many animals: alligator, bear, camel, cheetah, elephant, flamingo, giraffe, hippo, hyena, iguana, kangaroo, koala, lion, monkey, snake</p>

  <form method="post">
    <label for="animal">Animal</label>
    <input type="text" name="animal" />
    <br />
    <button type="submit" name="action" value="guess">Guess</button>
    <button type="submit" name="action" value="restart">Restart game</button>
  </form>

</body>

</html>