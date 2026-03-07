<?php
//This is a simple hashing demo (without database persistence).
$validCleartextPassword = 'Pw1234!';
$invalidCleartextPassword = 'Wp4321?';
$hashedPassword = '$2y$10$0EwvZKTSs.g/iW5hu1XuzeHRJF2j7ZocH9RYf70ZYCqWBQHA5hUnO';

echo 'Check with valid password:' . '<br>';
if (password_verify($validCleartextPassword, $hashedPassword)) {
    echo 'Password is valid.' . '<br>';
} else {
    echo 'Password is invalid.' . '<br>';
}

echo 'Check with invalid password:' . '<br>';
if (password_verify($invalidCleartextPassword, $hashedPassword)) {
    echo 'Password is valid.' . '<br>';
} else {
    echo 'Password is invalid.' . '<br>';
}
