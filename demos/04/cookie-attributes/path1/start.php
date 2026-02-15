<!doctype html>
<html lang="en-US">

<head>
    <title>Enter Parameters for Cookie</title>
    <meta charset="UTF-8" />
</head>

<body>
    <form action="set-cookie.php" method="post">
        <p>
            <label for="value">Value</label>
            <br />
            <input
                type="text"
                name="value"
                id="value"
                value="Hello. I am a cookie crumb."
                required />
        </p>
        <p>
            <label for="expires">Expires (seconds from now)</label>
            <br />
            <input
                type="number"
                name="expires"
                id="expires"
                value="0"
                step="60"
                required />
        </p>
        <p>
            <label for="path">Path</label>
            <br />
            <input
                type="text"
                name="path"
                id="path"
                value="/"
                required />
        </p>
        <p>
            <label for="domain">Domain</label>
            <br />
            <input
                type="text"
                name="domain"
                id="domain"
                value="localhost"
                required />
        </p>

        <p>
            <input type="checkbox" name="httponly" id="httponly" value="1" />
            <label for="httponly">HTTP only</label>
            <br>
            <input type="checkbox" name="secure" id="secure" value="1" />
            <label for="secure">Secure</label>
            <br>
        </p>
        <p>
            <label for="samesite">SameSite</label>
            <select id="samesite" name="samesite">
                <option value="None">None</option>
                <option value="Lax">Lax</option>
                <option value="Strict" selected>Strict</option>
            </select>
            <br>
            <b>samesite 'None' only works with secure cookies</b>
        </p>
        <button type="submit">Create cookie with PHP</button>
    </form>
</body>

</html>