<?

use mvc3\AnimalView;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title><?= htmlspecialchars($action) ?></title>
    <meta charset="UTF-8" />
</head>

<body>
    <h1><?= htmlspecialchars($action) ?></h1>
    <form action="" method="post">
        <?php if ($action !== AnimalView::CREATE): ?>
            <div>
                <label for="animalId">ID</label>
                <input type="number" name='animalId' id='animalId' value="<?= htmlspecialchars($this->animal->animalId) ?>">
            </div>
        <?php endif; ?>
        <div>
            <label for="animalName">Name</label>
            <input type="text" name='animalName' id='animalName' value="<?= htmlspecialchars($this->animal->animalName) ?>">
        </div>
        <div>
            <label for="speciesId">Species ID</label>
            <input type="text" name='speciesId' id='speciesId' value="<?= htmlspecialchars($this->animal->speciesId) ?>">
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>