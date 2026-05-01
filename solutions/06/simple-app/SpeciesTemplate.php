<?

use Solution6\SpeciesView;
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
        <?php if ($action !== SpeciesView::CREATE): ?>
            <div>
                <label for="speciesId">ID</label>
                <input type="number" name='speciesId' id='speciesId' value="<?= htmlspecialchars($this->species->speciesId) ?>">
                <span><?= htmlspecialchars($this->species->getError('speciesId')) ?></span>
            </div>
        <?php endif; ?>
        <div>
            <label for="speciesName">Name</label>
            <input type="text" name='speciesName' id='speciesName' value="<?= htmlspecialchars($this->species->speciesName) ?>">
            <span><?= htmlspecialchars($this->species->getError('speciesName')) ?></span>
        </div>
        <div>
            <label for="dietType">Diet Type</label>
            <select name="dietType" id="dietType">
                <option value="carnivore" <?= $this->species->dietType == 'carnivore' ? 'selected' : '' ?>>Carnivore</option>
                <option value="herbivore" <?= $this->species->dietType == 'herbivore' ? 'selected' : '' ?>>Herbivore</option>
                <option value="omnivore" <?= $this->species->dietType == 'omnivore' ? 'selected' : '' ?>> Omnivore</option>
            </select>
            <span><?= htmlspecialchars($this->species->getError('dietType')) ?></span>
        </div>
        <div>
            <label for="isEndangered">Is Endangered</label>
            <input type="checkbox" name='isEndangered' id='isEndangered' value="1" <?= $this->species->isEndangered != 0 ? 'checked' : '' ?>>
            <span><?= htmlspecialchars($this->species->getError('isEndangered')) ?></span>
        </div>
        <button type="submit">Save</button>
    </form>
    <p><?= htmlspecialchars($flashMessage) ?></p>
</body>

</html>