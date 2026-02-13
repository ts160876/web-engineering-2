<?php
//Currently this page supports three animals.
$animals = array(
  "alligator" => "Here is an alligator.",
  "giraffe" => "Here is a giraffe.",
  "monkey" => "Here is a monkey.",
);

//There are probably more elegant ways to determine $animalUri.
//We hardcode the baseUri for now.
$baseUri = '/web-engineering-2/solutions/03/request-response/index.php/';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//Just in case $animalUri ends with (or includes) a /, we remove it.
$animalUri = str_replace('/', '', substr($uri, strlen($baseUri)));
$responseCode = 200;

//Depending on whether the animal is found in the array...
if (array_key_exists($animalUri, $animals) == true) {
  //... use the value from the array...
  $animalText = $animals[$animalUri];
} else {
  //... or set $animalText to '... not found.'.
  $animalText = 'Animal not found.';
  $responseCode = 404;
}
http_response_code($responseCode);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Request/Response Cycle</title>
  <meta charset="UTF-8" />
</head>

<body>
  <h1><?php echo $animalText ?></h1>
  <?php if ($responseCode == 200): ?>
    <ul>
      <?php foreach ($_GET as $key => $value): ?>
        <li><?php echo $key . ": " . $value ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>

</html>