<?php
//Create the PDO object in establish-connection.php.
include_once('./../connections/establish-connection.php');

//This example demonstrates transactions. Both SQL statements are hardcoded for simplicity
$sqlUpdateBook = 'UPDATE books SET checkout_status = "checked_out" WHERE book_id = :book_id;';
$sqlCreateCheckout = 'INSERT INTO checkouts VALUES (NULL, :user_id, :book_id, "2026-12-31 23:59:59", NULL); ';

try {
    //Start the transaction.
    $pdo->beginTransaction();
    $statement = $pdo->prepare($sqlUpdateBook);
    $result = $statement->execute(['book_id' => 60]);
    if ($result === true) {
        logMessage("Successfully updated book.");
        //If the checkout status of the book was updated, then create the checkout.
        $statement = $pdo->prepare($sqlCreateCheckout);
        $result = $statement->execute(['user_id' => 2, 'book_id' => 60]);
        if ($result === true) {
            logMessage("Successfully created checkout.");
            $pdo->commit();
        } else {
            logMessage("Could not create checkout.");
            //Rollback transaction;
            $pdo->rollBack();
        }
    } else {
        logMessage("Could not update book.");
        //Rollback transaction.
        $pdo->rollBack();
    }
} catch (PDOException $e) {
    logMessage("Update book failed: " . $e->getMessage());
    $pdo->rollBack();
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Transactions (explicit commit)</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Transactions (explicit commit)</h1>
    <h2>Messages</h2>
    <?php foreach ($messages as $message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endforeach; ?>
</body>

</html>