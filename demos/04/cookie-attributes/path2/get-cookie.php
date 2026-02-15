<?php
$value = '';
$cookieIsSet = false;

//Check if a cookie 'webengineering_cookie' has been sent from the browser.
if (isset($_COOKIE['webengineering_cookie'])) {
    $value = filter_input(INPUT_COOKIE, 'webengineering_cookie');
    $cookieIsSet = true;
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Get Cookie</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>Trying to read the cookie from PHP.</p>
    <?php if ($cookieIsSet): ?>
        <p>Cookie could be read (not masked): <?= $value ?></p>
    <?php else: ?>
        <p>Cookie could not be read.</p>
    <?php endif; ?>
    <p><a href="../index.php">Back Home</a></p>
</body>

</html>