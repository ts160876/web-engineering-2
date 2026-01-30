<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Example 4</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Example 4</h1>
    <p>Welcome. Today is:</p>
    <p><?php echo date('Y-m-d H:i:s'); ?></p>
    <p>Here comes a list:</p>
    <ul>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <li>List item</li>
        <?php endfor; ?>
    </ul>
</body>

</html>