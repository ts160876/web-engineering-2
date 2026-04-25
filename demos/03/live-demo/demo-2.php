<?php

$subject = filter_input(INPUT_POST, 'subject');

$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
if ($amount === false) {
    //Not a number
    $result_amount_check_failed = true;
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email === false) {
    //Not a email
    $result_email_check_failed = true;
}

?>

<p><?= htmlspecialchars($_POST['subject']); ?></p>
<p><?= $_POST['amount']; ?></p>
<p><?= $_POST['email']; ?></p>
<p><?= $result_amount_check_failed === true ? 'Amount check failed' : 'Amount check was ok' ?></p>
<p><?= $result_email_check_failed === true ? 'eMail check failed' : 'eMail check was ok'; ?></p>