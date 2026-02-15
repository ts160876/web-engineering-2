<?php
$cookie_name = 'logondata';
$cookie_value = array(
    'user' => 'Max',
    'password' => 'DadiDadaDadu',
);
//Don't ever put the logon data into a cookie. This is just for the purpose of this quiz.
setcookie($cookie_name, json_encode($cookie_value));
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Quiz 1</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>This page is for quiz 1.</p>
</body>

</html>