<?php
//Create session (or load content of existing session).
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Sessions 2</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Demonstrating Sessions 2</h1>
    <p>Current date and time: <?php echo htmlspecialchars(date("Y-m-d")) ?></p>
    <p>Session ID <?php echo htmlspecialchars(session_id()) ?></p>
    <p>Value of variable in the session: <?php echo htmlspecialchars($_SESSION['sessionVariable']) ?></p>
    <p><a href="page3.php">Navigate to page3.php</a></p>
</body>

</html>