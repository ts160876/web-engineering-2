<?php
$a = 5;
$b = &$a;
$c = &$b;

echo $a . PHP_EOL;
echo $b . PHP_EOL;
echo $c . PHP_EOL;

$b = 6;

echo $a . PHP_EOL;
echo $b . PHP_EOL;
echo $c . PHP_EOL;
