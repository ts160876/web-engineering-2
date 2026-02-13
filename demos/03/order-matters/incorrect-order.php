<?php
//Disable PHP compression.
ini_set('zlib.output_compression', 'Off');
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Remove all active PHP output buffers.
while (ob_get_level() > 0) {
    ob_end_flush();
}

//Fore immediate flushing.
ob_implicit_flush(true);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Incorrect Order</title>
    <meta charset="UTF-8" />
</head>

<body>
    <p>Test</p>
    <?php //Set header.
    header('Content-Type: text/html;charset=UTF-8'); ?>
</body>