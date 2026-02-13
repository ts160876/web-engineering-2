<?php $animals = array("Alligator", "Giraffe", "Monkey"); ?>

<p>The following unordered list is generated in <?php echo __FILE__ ?>.</p>

<ul>
    <?php foreach ($animals as $animal): ?>
        <li><?php echo $animal ?></li>
    <?php endforeach; ?>
</ul>