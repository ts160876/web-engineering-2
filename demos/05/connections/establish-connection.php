<?php
$host = 'localhost';
$db = 'bukubuku';
//In real life NEVER store your credentials in the code.
$username = 'root';
$password = 'root';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$messages = array();

function logMessage($message)
{
    global $messages;
    array_push($messages, $message);
}

try {
    $pdo = new PDO($dsn, $username, $password);
    logMessage('Database connection successful!');
} catch (PDOException $e) {
    logMessage("Database connection failed: " . $e->getMessage());
}
