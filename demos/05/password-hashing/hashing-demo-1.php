<?php
//This is a simple hashing demo (without database persistence).
$cleartextPassword = 'Pw1234!';
$hashedPassword = password_hash($cleartextPassword, PASSWORD_BCRYPT);

echo $cleartextPassword . '<br>';
//The hash is $2y$10$0EwvZKTSs.g/iW5hu1XuzeHRJF2j7ZocH9RYf70ZYCqWBQHA5hUnO.
echo $hashedPassword . '<br>';
