<!doctype html>
<html lang="en-US">

<head>
    <title>Display Book Data</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Select Book</h1>
    <form method="get">
        <label for="isbn">Name</label>
        <input type="text" name="isbn" value="978-3462313024" />
        <input type="hidden" value="978-3462313024'; INSERT INTO users VALUES (NULL, 'Holger', 'Hacker', 'holger@hacker.com', 'Pw1234!', TRUE);">
        <br />
        <button type="submit" formaction="display-bad.php">Display book (the bad way)</button>
        <button type="submit" formaction="display-good.php">Display book (the good way)</button>
    </form>

</body>

</html>