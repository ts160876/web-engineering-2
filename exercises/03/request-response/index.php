<?php
//Currently this page supports three animals.
$animals = array(
  "alligator" => "Here is an alligator.",
  "giraffe" => "Here is a giraffe.",
  "monkey" => "Here is a monkey.",
);

//This is the base URI for the page. 
$baseUri = '/web-engineering-2/exercises/03/request-response/index.php/';
//You can call the page for all animals listed in the array.
//If the page is called with .../index.php/ANIMAL, the page shall display the value found under the key ANIMAL in the array as <h1> heading.
//Depending on whether the animal is found in the array, the HTTP response code shall be set to 200 or 404.
//If (and only if) the animal is found in the array, the attributes of the animal shall be read from the query string and displayed in an unordered list. 

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Request/Response Cycle</title>
  <meta charset="UTF-8" />
</head>

<body>
</body>

</html>