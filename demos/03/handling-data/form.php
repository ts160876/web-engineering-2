<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Form</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Form</h1>
    <form action="./result.php">
        <fieldset>
            <legend>Main part</legend>
            <label for="input">Enter something:</label>
            <input id="input" name="input" type="text">
        </fieldset>
        <fieldset>
            <legend>Control the attributes of the field</legend>
            <input id="type_text" name="type" type="radio" value="text" checked>
            <label for="type_text">Text</label><br>
            <input id="type_number" name="type" type="radio" value="number">
            <label for="type_number">Number (int)</label><br>
            <input id="type_email" name="type" type="radio" value="email">
            <label for="type_email">eMail</label><br>
            <label for="max">Max length/value:</label>
            <input id="max" name="max" type="text">
        </fieldset>
        <fieldset>
            <legend>Control PHP behavior</legend>
            <input id="capitalize" name="capitalize" type="checkbox">
            <label for="capitalize">Capitalize (for text, email)</label><br>
            <input id="escape" name="escape" type="checkbox">
            <label for="escape">Escape output</label><br>
        </fieldset>
        <button type="submit">Submit</button>
    </form>
</body>

</html>