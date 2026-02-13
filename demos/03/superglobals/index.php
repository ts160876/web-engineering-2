<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Superglobals</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>This page shows the content of the superglobals $_SERVER, $_GET and $_POST. There are other superglobals which we will take look at later.</p>
    <p>Content of $_SERVER:</p>
    <ul>
        <?php foreach ($_SERVER as $key => $value): ?>
            <li><?php echo $key . ": " . $value ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Content of $_GET:</p>
    <ul>
        <?php foreach ($_GET as $key => $value): ?>
            <li><?php echo $key . ": " . $value ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Content of $_POST:</p>
    <ul>
        <?php foreach ($_POST as $key => $value): ?>
            <li><?php echo $key . ": " . $value ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>