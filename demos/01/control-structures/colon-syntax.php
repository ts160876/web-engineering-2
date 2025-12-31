<?php
//This file demonstrates the colon syntax which is available for the following control structures: 
//- if
//- while
//- for
//- foreach
//- switch
?>

This text includes a list of 10 bullet points. It is done with a while-loop:
<?php $i = 1;
while ($i <= 10): ?>
    - List item <?php echo $i . PHP_EOL ?>
<?php
    $i++;
endwhile;
?>

The bullet points can also be done with a for-loop:
<?php for ($i = 1; $i <= 10; $i++): ?>
    - List item <?php echo $i . PHP_EOL ?>
<?php endfor; ?>

Similarly it is possible to use colon syntax for if-statements:
<?php if (1 == 2): ?>
    1 is equal to 2
<?php else: ?>
    1 is not equal to 2
<?php endif; ?>