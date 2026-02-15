<?php
$cookie_name = 'somename';
$cookie_value = 'somedata';
//To break things, remove httponly.
setcookie($cookie_name, $cookie_value, ['httponly' => true]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = filter_input(INPUT_POST, 'input');
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Quiz 2</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>This page is for quiz 2.</p>
    <form method="post">
        <label for="input">Enter something:</label>
        <!-- To break things, remove htmlspecialchars. -->
        <input id="input" name="input" type="text" value="<?= htmlspecialchars($input) ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>