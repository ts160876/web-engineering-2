<?php
function loadEnv($file)
{
    //If the file does not exist, throw an exception.
    if (!file_exists($file)) {
        throw new Exception(".env file not found");
    }

    //Read the file.
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    //Process the file line by line.
    foreach ($lines as $line) {
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        putenv("$name=$value");
    }
}
