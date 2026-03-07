<?php
require('load-env.php');
loadEnv(__DIR__ .  '\.env');
$host = getenv('DATABASE_HOST');
$db = getenv('DATABASE_NAME');
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$messages = array();

function logMessage($message)
{
    global $messages;
    array_push($messages, $message);
}

try {
    $pdo = new PDO($dsn, getenv('DATABASE_USER'), getenv('DATABASE_PASSWORD'));
    logMessage('Database connection successful!');
} catch (PDOException $e) {
    logMessage("Database connection failed: " . $e->getMessage());
}
