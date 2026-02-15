<?php
//Create session (or load content of existing session).
session_start();
$_SESSION['sessionVariable'] = 'This value has been written to the session by page1.php';
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Sessions 1</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Demonstrating Sessions 1</h1>
    <p>Current date and time: <?php echo htmlspecialchars(date("Y-m-d")) ?></p>
    <p>Session ID <?php echo htmlspecialchars(session_id()) ?></p>
    <p>Value of variable in the session: <?php echo htmlspecialchars($_SESSION['sessionVariable']) ?></p>
    <p><a href="page2.php">Navigate to page2.php</a></p>
</body>

</html>