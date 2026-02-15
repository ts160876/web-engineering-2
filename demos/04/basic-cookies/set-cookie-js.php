<?php
$cookie_name = 'visits';
$cookie_value = filter_input(INPUT_COOKIE, $cookie_name, FILTER_VALIDATE_INT);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Cookies 3</title>
    <meta charset="UTF-8" />
    <script src="script.js" defer></script>
</head>

<body>
    <h1>Demonstrating Cookies 3</h1>
    <p>Current date and time: <?php echo htmlspecialchars(date("Y-m-d")) ?></p>
    <!--The value of the cookie is ingested on the client into paragraph with id 'visits'. -->
    <p id="visits"></p>
    <p>Cookie value seen by the server during creation of this page: <?php echo htmlspecialchars($cookie_value) ?></p>
    <p>Check out the cookies in the Developer Tools!</p>
</body>

</html>