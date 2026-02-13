<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Quiz 1</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>Current date and time: <?php echo date("Y-m-d") ?></p>
    <p>Current date and time:
        <script>
            const d = new Date();
            document.write(d.getFullYear() + "-" +
                String(d.getMonth() + 1).padStart(2, '0') + "-" +
                String(d.getDate()).padStart(2, '0'));
        </script>
    </p>

</body>

</html>