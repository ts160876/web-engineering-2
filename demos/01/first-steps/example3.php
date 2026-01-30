<?php
//Define a two variables and use them.
$myName = "Thorsten";
$myAge = 49; ?>
<?php echo "My name is $myName."; ?>

<?php if ($myAge < 50): ?>
I am still quite young.
<?php else: ?>
I am not so young anymore.
<?php endif ?>