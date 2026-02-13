<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Buffering 2</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>Test</p>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<p> Iteration $i</p>";
        sleep(1); // wait 1 second
    } ?>
</body>