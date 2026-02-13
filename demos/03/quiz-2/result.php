<?php
$input = filter_input(INPUT_GET, 'input');
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Quiz 2 (Result)</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Result</h1>
    <p>You have entered: <?php echo $input ?></p>
</body>