<?php

?>

<form action="demo-2.php" method="post">
    <div>
        <label for="subject">Verwendungszweck</label>
        <input type="text" name="subject">
    </div>
    <div>
        <label for="number">Betrag</label>
        <input type="text" name="amount">
    </div>
    <div>
        <label for="email">Empfänger</label>
        <input type="text" name="email">
    </div>
    <button type="submit">Submit</button>
</form>

<?php http_response_code(404); ?>