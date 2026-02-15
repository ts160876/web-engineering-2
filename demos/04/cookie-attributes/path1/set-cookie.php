<?php
//We get the parameters for the cookie in a quick and dirty way (without much validation).
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Value
    $value = filter_input(INPUT_POST, 'value');
    $expires = filter_input(INPUT_POST, 'expires', FILTER_VALIDATE_INT);
    $path = filter_input(INPUT_POST, 'path');
    $domain = filter_input(INPUT_POST, 'domain');
    $httponly = filter_input(INPUT_POST, 'httponly', FILTER_VALIDATE_BOOL) || false;
    $secure = filter_input(INPUT_POST, 'secure', FILTER_VALIDATE_BOOL) || false;
    $samesite = filter_input(INPUT_POST, 'samesite');
}

//Only if $expires has a value, we set an expiry time for the cookie.
if ($expires > 0) {
    $expires = time() + $expires;
}

//Here we create the cookie.
//setcookie('webengineering_cookie', $value, $expires, $path, $domain, $secure, $httponly);
setcookie('webengineering_cookie', $value, [
    'expires' => $expires,
    'path' => $path,
    'domain' => $domain,
    'httponly' => $httponly,
    'secure' => $secure,
    //remark: samesite 'None' only works with secure cookies
    'samesite' => $samesite
]);
?>

<!doctype html>
<html lang="en-US">

<head>
    <title>Set Cookie</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>The cookie has been created with the following parameters. </p>
    <p><b>We intentionally do not mask data:</b></p>
    <ul>
        <li>Value: <?= $value ?></li>
        <li>Expires (seconds from now): <?= $expires ?></li>
        <li>Path: <?= $path ?></li>
        <li>Domain: <?= $domain ?></li>
        <li>HTTP only: <?= $httponly ?></li>
        <li>Secure: <?= $secure ?></li>
        <li>SameSite: <?= $samesite ?></li>
    </ul>
    <p><a href="../index.php">Back Home</a></p>
</body>


</html>