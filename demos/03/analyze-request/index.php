<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Analyze Request</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Analyze Request</h1>

    <h2>Start Line / Request Line</h2>
    <p>The start line / request line can be analyzed via $_SERVER.</p>
    <ul>
        <li>Method (REQUEST_METHOD): <?php echo $_SERVER['REQUEST_METHOD'] ?></li>
        <li>URL: </li>
        <ul>
            <li>Scheme (REQUEST_SCHEME): <?php echo $_SERVER['REQUEST_SCHEME'] ?></li>
            <li>Host (SERVER_NAME): <?php echo $_SERVER['SERVER_NAME'] ?></li>
            <li>Port (SERVER_PORT): <?php echo $_SERVER['SERVER_PORT'] ?></li>
            <li>Path including Query (REQUEST_URI): <?php echo $_SERVER['REQUEST_URI'] ?></li>
            <li>Path without Query (echo_parse_url()): <?php echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?></li>
            <li>Query (QUERY_STRING): <?php echo $_SERVER['QUERY_STRING'] ?></li>
            <li>Fragment: The fragement is not sent by the webbrowser and not availalbe here!</li>
        </ul>
        <li>Protocol: <?php echo $_SERVER['SERVER_PROTOCOL'] ?></li>
    </ul>

    <h2>Query</h2>
    <p>The query string (parameters) can also be found in $_GET.</p>
    <ul>
        <?php foreach ($_GET as $key => $value): ?>
            <li><?php echo $key . ": " . $value ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Request Headers</h2>
    <p>The request headers can be analyzed via function getallheaders().</p>
    <ul>
        <?php foreach (getallheaders() as $key => $value): ?>
            <li><?php echo $key . ": " . $value ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Request Body</h2>
    <p>The request body can be read via file_get_contents(). Often it is empty. We will take a closer look at the request body at a later point in time.</p>
    <p><?php echo file_get_contents('php://input'); ?></p>

</body>

</html>