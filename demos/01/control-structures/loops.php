<?php
//Simple while loop (the expression is checked at the beginning of each iteration)
echo "Simple while loop:" . PHP_EOL;
$i = 1;
while ($i <= 10) {
    echo $i . PHP_EOL;
    $i++;
}

//Simple do-while loop (the expression is checked at the end of each iteration)
echo "Simple do-while loop:" . PHP_EOL;
$i = 11;
do {
    echo $i . PHP_EOL;
    $i++;
} while ($i <= 10);

//Simple for-loop
echo "Simple for-loop:" . PHP_EOL;
for ($i = 1; $i <= 10; $i++) {
    echo $i . PHP_EOL;
}

//Usage of break
echo "Simple break (when i == 3):" . PHP_EOL;
for ($i = 1; $i <= 10; $i++) {
    if ($i == 3) break;
    echo $i . PHP_EOL;
}

//Usage of continue
echo "Simple continue (when i == 3):" . PHP_EOL;
for ($i = 1; $i <= 10; $i++) {
    if ($i == 3) continue;
    echo $i . PHP_EOL;
}
