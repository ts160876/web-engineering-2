<?php
$cookie_name = 'visits';
//Check if a cookie 'visits' has been sent from the browser.
if (!isset($_COOKIE[$cookie_name])) {
    //If no, then create it with value 1.
    $cookie_value = 1;
} else {
    //If yes, then increase the value of the cookie by 1.
    $cookie_value = filter_input(INPUT_COOKIE, $cookie_name, FILTER_VALIDATE_INT) + 1;
}

//The following line creates the cookie.
setcookie($cookie_name, $cookie_value);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Cookies 2</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Demonstrating Cookies 2</h1>
    <p>Current date and time: <?php echo htmlspecialchars(date("Y-m-d")) ?></p>
    <p>Number of visits: <?php echo htmlspecialchars($cookie_value) ?></p>
    <p>Cookie value seen by the server during creation of this page: <?php echo htmlspecialchars($cookie_value) ?></p>
    <p>Check out the cookies in the Developer Tools!</p>
</body>

</html>