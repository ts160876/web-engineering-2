<?php
//Delete content from existing session and destroy it. 
session_start();
//Clear the content from superglobal $_SESSION.
session_unset();

//Delete the cookie.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

//Destroy the session (including the deletion of the file).
session_destroy();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Demonstrating Sessions 3</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Demonstrating Sessions 3</h1>
    <p>Current date and time: <?php echo htmlspecialchars(date("Y-m-d")) ?></p>
    <p>Session ID <?php echo htmlspecialchars(session_id()) ?></p>
    <p>Value of variable in the session: <?php echo htmlspecialchars($_SESSION['sessionVariable']) ?></p>
</body>

</html>