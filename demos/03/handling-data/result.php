<?php
//These are the parameters to sanitize, validate, escape.
$type = filter_input(INPUT_GET, 'type');
$max = (int)filter_input(INPUT_GET, 'max', FILTER_VALIDATE_INT);
$capitalize = filter_input(INPUT_GET, 'capitalize', FILTER_VALIDATE_BOOL) || false;
$escape = filter_input(INPUT_GET, 'escape', FILTER_VALIDATE_BOOL) || false;

//Here we collect the messages.
$messages = [];
//This is a simple helper function to add messages to the array.
function logError($message)
{
    global $messages;
    array_push($messages, $message);
}

//This is a function to check the value of a number is without the defined boundary (maxValue).
function isValueValid(int $value, int $maxValue)
{
    if ($maxValue == 0 || $value <= $maxValue) {
        //If the value is valid, then return the value.
        return $value;
    } else {
        //Otherwise return false (this is in line with standard filter/validation functions).
        return false;
    }
}

//Here we sanetize, validate and (later) escape the data.
//Sanitize, validate (during input phase)
if ($type == 'text') {
    //Input is supposed to be a text.
    $input = filter_input(INPUT_GET, 'input');
    //Convert to capitals (i.e. normalize data).
    if ($capitalize == true) {
        $input = strtoupper($input);
    }
    //Check length of text.
    if ($max > 0 && mb_strlen($input) > $max) {
        $input = false;
        logError('Input is too long.');
    }
} elseif ($type == 'number') {
    //Input is supposed to be a number (int).
    //We could sanitize the input. This would remove all characters except 0-9, +, -.
    //We want an error message instead.
    //$input = filter_input(INPUT_GET, 'input', FILTER_SANITIZE_NUMBER_INT);
    $input = filter_input(INPUT_GET, 'input', FILTER_VALIDATE_INT);
    if ($input == false) {
        logError('Input is not a number (int).');
    } else {
        //Check value of number. This time we use a user-defined filter/validation function.
        $input = filter_var($input, FILTER_CALLBACK, ['options' => function ($value) use ($max) {
            return isValueValid($value, $max);
        }]);
    }
} else {
    //Input is supposed to be an email.
    $input = filter_input(INPUT_GET, 'input');
    //Convert to capitals (i.e. normalize data).
    if ($capitalize == true) {
        $input = strtoupper($input);
    }
    $input = filter_var($input, FILTER_VALIDATE_EMAIL);
    if ($input == false) {
        logError('Input is not an email.');
    } else {
        //Check length of email.
        if ($max > 0 && mb_strlen($input) > $max) {
            $input = false;
            logError('Input is too long.');
        }
    }
}

//Escape (during output phase)
if ($escape == false) {
    $mirrored_input = filter_input(INPUT_GET, 'input');
} else
    $mirrored_input = htmlspecialchars(filter_input(INPUT_GET, 'input'));
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Result</title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1>Result</h1>
    <h2>Parameters to validate, sanitize, escape</h2>
    <p>You have set these parameters:</p>
    <ul>
        <li>Type: <?php echo var_dump($type) ?></li>
        <li>Max length/value: <?php echo var_dump($max) ?></li>
        <li>Capitalize (for text, email): <?php echo var_dump($capitalize) ?> </li>
        <li>Escape output: <?php echo var_dump($escape) ?></li>
    </ul>
    <h2>User input</h2>
    <p>You have entered:</p>
    <ul>
        <li>Mirrored input: <?php echo $mirrored_input ?></li>
        <li>Input as used by PHP: <?php echo var_dump($input) ?></li>
    </ul>
    <h2>Message log</h2>
    <p>The following messages have been collected:</p>
    <ul>
        <?php foreach ($messages as $message): ?>
            <li><?php echo $message ?></li>
        <?php endforeach; ?>
    </ul>
</body>