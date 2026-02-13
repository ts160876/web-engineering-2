<?php
//These are variables for the various form fields.
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$passwordRepeat = '';
$accepted = false;

//Here we collect the messages.
$errorMessages = [];
$successMessages = [];

//Here we create several helper functions. 
function logError($message)
{
  global $errorMessages;
  array_push($errorMessages, $message);
}
function logSuccess($message)
{
  global $successMessages;
  array_push($successMessages, $message);
}
function hasErrors(): bool
{
  global $errorMessages;
  if (empty($errorMessages)) {
    return false;
  } else {
    return true;
  }
}

//Only if the user pressed the submit button to register with Buku Buku, we validate the data.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //First Name
  $firstName = filter_input(INPUT_POST, 'first_name');
  if (mb_strlen($firstName) < 1) {
    logError('Enter a valid First Name.');
  }
  //Last Name
  $lastName = filter_input(INPUT_POST, 'last_name');
  if (mb_strlen($lastName) < 1) {
    logError('Enter a valid Last Name.');
  }
  //E-Mail
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if ($email == false) {
    //Treat the E-Mail as text to not loose the entered value.
    $email = filter_input(INPUT_POST, 'email');
    logError('Enter a valid E-Mail.');
  }
  //Password
  $password = filter_input(INPUT_POST, 'password');
  //Password (repeat)
  $passwordRepeat = filter_input(INPUT_POST, 'password_repeat');
  if ($password != $passwordRepeat) {
    logError('Passwords must match.');
  } elseif (mb_strlen($password) < 8) {
    logError('Password is too short (minimum 8 characters are required).');
  }
  //Terms and Conditions accepted?
  $accepted = filter_input(INPUT_POST, 'accepted', FILTER_VALIDATE_BOOL) || false;
  if ($accepted != true) {
    logError('Accept the Terms and Conditions.');
  }

  //If there are not errors, the data can be stored. We do not yet have a persistence
  if (!hasErrors()) {
    //Pretend to store the data.
    logSuccess('You have successfully registered.');
    //And clear all fields.
    $firstName = '';
    $lastName = '';
    $email = '';
    $password = '';
    $passwordRepeat = '';
    $accepted = false;
  }
}

?>

<!doctype html>
<html lang="en-US">

<head>
  <title>Register with Buku Buku (v1)</title>
  <meta charset="UTF-8" />
</head>

<body>
  <form method="post">
    <p>
      <label for="first_name">First Name</label>
      <br />
      <input
        type="text"
        name="first_name"
        id="first_name"
        value="<?= htmlspecialchars($firstName) ?>" />
      <!-- commenting to allow testing
        maxlength="20"
        required /> -->
    </p>
    <p>
      <label for="last_name">Last Name</label>
      <br />
      <input
        type="text"
        name="last_name"
        id="last_name"
        value="<?= htmlspecialchars($lastName) ?>" />
      <!-- commenting to allow testing
        maxlength="20"
        required /> -->
    </p>
    <p>
      <label for="email">E-Mail</label>
      <br />
      <!-- changing type to text to allow testing -->
      <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>" />
      <!-- commenting to allow testing
        required /> -->
    </p>
    <p>
      <!-- Do not preserve the entered password(s) in case of error messages. -->
      <label for="password">Password</label>
      <br />
      <input type="password" name="password" id="password" />
      <!-- commenting to allow testing
        required /> -->
    </p>
    <p>
      <label for="password_repeat">Password (repeat)</label>
      <br />
      <input
        type="password"
        name="password_repeat"
        id="password_repeat" />
      <!-- commenting to allow testing
        required /> -->
    </p>
    <p>
      <input type="checkbox" name="accepted" id="accepted" value="1" <?= $accepted ? 'checked' : '' ?> />
      <!-- commenting to allow testing
        required /> -->
      <label for="accepted">I accept the Terms and Conditions for Buku Buku.</label>
    </p>
    <button type="submit">Register with Buku Buku</button>
    <!-- Print the collected messages. -->
    <?php foreach ($errorMessages as $errorMessage): ?>
      <p style="color:red"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endforeach; ?>
    <?php foreach ($successMessages as $successMessage): ?>
      <p style="color:green"><?= htmlspecialchars($successMessage) ?></p>
    <?php endforeach; ?>
  </form>
</body>

</html>