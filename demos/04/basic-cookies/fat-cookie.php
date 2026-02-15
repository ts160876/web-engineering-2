<?php
$animals = array(
    "alligator" => "Here is an alligator.",
    "giraffe" => "Here is a giraffe.",
    "monkey" => "Here is a monkey.",
);

$cookie_name = 'animals';
$cookie_value = json_encode($animals);
//The following line creates the cookie.
setcookie($cookie_name, $cookie_value);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Cookies 4</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Demonstrating Cookies 4</h1>
    <p>This page creates a 'fat' cookie (in this case an array encoded as JSON).</p>
    <p>Check out the cookies in the Developer Tools!</p>
</body>

</html>