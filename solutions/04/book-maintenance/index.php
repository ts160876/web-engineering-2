<?php
session_start();

if (!isset($_SESSION['book'])) {
  $_SESSION['book'] = array(
    'isbn' => '',
    'title' => '',
    'author' => '',
    'published' => '',
    'pages' => '',
    'audioBook' => false,
    'hardcover' => true,
    'kindle' => false,
    'mp3' => false,
  );
}

if (!isset($_SESSION['successMessage'])) {
  $_SESSION['errorMessages'] = array();
}

if (!isset($_SESSION['successMessage'])) {
  $_SESSION['successMessage'] = '';
}

function logError($field, $message)
{
  $_SESSION['errorMessages'][$field] = $message;
}

function hasError($field): bool
{
  if (array_key_exists($field, $_SESSION['errorMessages'])) {
    return true;
  } else {
    return false;
  }
}

function getError($field): string
{
  if (array_key_exists($field, $_SESSION['errorMessages'])) {
    return  $_SESSION['errorMessages'][$field];
  } else {
    return '';
  }
}

//Only if the user pressed the submit button to register with Buku Buku, we validate the data.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //ISBN
  $_SESSION['book']['isbn'] = filter_input(INPUT_POST, 'isbn');
  if (mb_strlen($_SESSION['book']['isbn']) < 1) {
    logError('isbn', 'Enter an ISBN.');
  } elseif (!preg_match('/^\d{3}-\d{10}$/', $_SESSION['book']['isbn'])) {
    logError('isbn', 'The ISBN does not confirm to the format nnn-nnnnnnnnnn (whereas n is a number).');
  }
  //Title
  $_SESSION['book']['title'] = filter_input(INPUT_POST, 'title');
  if (mb_strlen($_SESSION['book']['title']) < 1) {
    logError('title', 'Enter a Title.');
  } elseif (mb_strlen($_SESSION['book']['title']) > 50) {
    logError('title', 'The Title must not have more than 50 characters.');
  }
  //Author
  $_SESSION['book']['author'] = filter_input(INPUT_POST, 'author');
  if (mb_strlen($_SESSION['book']['author']) < 1) {
    logError('author', 'Enter an Author.');
  } elseif (mb_strlen($_SESSION['book']['author']) > 50) {
    logError('author', 'The Author must not have more than 50 characters.');
  }
  //Publish Date (the browser should send the date in the format YYYY-MM-DD)
  $_SESSION['book']['published'] = filter_input(INPUT_POST, 'published');
  $publishedDate = DateTime::createFromFormat('Y-m-d', $_SESSION['book']['published']);
  if (!($publishedDate && $publishedDate->format('Y-m-d') === $_SESSION['book']['published'])) {
    logError('published', 'Enter a valid Publish Date.');
  }
  //Number of Pages
  $_SESSION['book']['pages'] = filter_input(INPUT_POST, 'pages');
  $pagesInteger = filter_var($_SESSION['book']['pages'], FILTER_VALIDATE_INT);
  if (mb_strlen($_SESSION['book']['pages']) < 1) {
    logError('pages', 'Enter Number of Pages');
  } elseif ($pagesInteger === false) {
    logError('pages', 'Enter a valid number.');
  } elseif ($pagesInteger < 10) {
    logError('pages', 'Number of Pages must be greater or equal to 10.');
  }
  //Formats
  $_SESSION['book']['audioBook'] = filter_input(INPUT_POST, 'audio_book', FILTER_VALIDATE_BOOL) || false;
  $_SESSION['book']['hardcover'] = filter_input(INPUT_POST, 'hardcover', FILTER_VALIDATE_BOOL) || false;
  $_SESSION['book']['kindle'] = filter_input(INPUT_POST, 'kindle', FILTER_VALIDATE_BOOL) || false;
  $_SESSION['book']['mp3'] = filter_input(INPUT_POST, 'mp3', FILTER_VALIDATE_BOOL) || false;
  if ($_SESSION['book']['audioBook'] === false && $_SESSION['book']['hardcover'] === false && $_SESSION['book']['kindle'] === false & $_SESSION['book']['mp3'] === false) {
    logError('formats', 'You need to select at least one format.');
  }

  //Construct success message.
  if (empty($_SESSION['errorMessages'])) {
    $_SESSION['successMessage'] = "The book {$_SESSION['book']['title']} (ISBN: {$_SESSION['book']['isbn']}) published on {$_SESSION['book']['published']} with {$_SESSION['book']['pages']} pages by {$_SESSION['book']['author']} has been created. Available formats are: ";
    //The following coding is not super nicely written. It does the job though.
    if ($_SESSION['book']['audioBook']) {
      $_SESSION['successMessage'] = $_SESSION['successMessage'] . 'Audio Book';
    }
    if ($_SESSION['book']['hardcover']) {
      if (substr($_SESSION['successMessage'], -1) != ' ') {
        $_SESSION['successMessage'] = $_SESSION['successMessage'] . ', ';
      }
      $_SESSION['successMessage'] = $_SESSION['successMessage'] . 'Hardcover';
    }
    if ($_SESSION['book']['kindle']) {
      if (substr($_SESSION['successMessage'], -1) != ' ') {
        $_SESSION['successMessage'] = $_SESSION['successMessage'] . ', ';
      }
      $_SESSION['successMessage'] = $_SESSION['successMessage'] . 'Kindle';
    }
    if ($_SESSION['book']['mp3']) {
      if (substr($_SESSION['successMessage'], -1) != ' ') {
        $_SESSION['successMessage'] = $_SESSION['successMessage'] . ', ';
      }
      $_SESSION['successMessage'] = $_SESSION['successMessage'] . 'MP3';
    }

    //If there are no errors, then the book has been created and all fields must be initiatlized
    unset($_SESSION['book']);
  }
  //Redirect.
  header("Location: index.php", true, 303);
  return;
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Maintain Books</title>
  <meta charset="UTF-8" />
</head>

<body>
  <header><img src="buku-buku.jpg" alt="Logo of Buku Buku" /></header>
  <main>
    <form method="post">
      <fieldset>
        <legend>Basic Data</legend>
        <p>
          <label for="isbn">ISBN</label>
          <br />
          <input type="text" name="isbn" id="isbn" value="<?= htmlspecialchars($_SESSION['book']['isbn']) ?>" />
          <!--Error message -->
          <?php if (hasError('isbn')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('isbn')) ?></span>
          <?php endif; ?>
        </p>
        <p>
          <label for="title">Title</label>
          <br />
          <input
            type="text"
            name="title"
            id="title"
            value="<?= htmlspecialchars($_SESSION['book']['title']) ?>" />
          <!--Error message -->
          <?php if (hasError('title')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('title')) ?></span>
          <?php endif; ?>
        </p>
        <p>
          <label for="author">Author</label>
          <br />
          <input
            type="text"
            name="author"
            id="author"
            value="<?= htmlspecialchars($_SESSION['book']['author']) ?>" />
          <!--Error message -->
          <?php if (hasError('author')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('author')) ?></span>
          <?php endif; ?>
        </p>
      </fieldset>
      <fieldset>
        <legend>Additional Data</legend>
        <p>
          <label for="published">Publish Date</label>
          <br />
          <input type="date" name="published" id="published" value="<?= htmlspecialchars($_SESSION['book']['published']) ?>" />
          <!--Error message -->
          <?php if (hasError('published')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('published')) ?></span>
          <?php endif; ?>
        </p>
        <p>
          <label for="pages">Number of Pages</label>
          <br />
          <input type="number" name="pages" id="pages" value="<?= htmlspecialchars($_SESSION['book']['pages']) ?>" />
          <!--Error message -->
          <?php if (hasError('pages')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('pages')) ?></span>
          <?php endif; ?>
        </p>
      </fieldset>
      <fieldset>
        <legend>Formats</legend>
        <p>
          <input type="checkbox" name="audio_book" id="audio_book" value="1" <?= $_SESSION['book']['audioBook'] ? 'checked' : '' ?> />
          <label for="audio_book">Audio Book</label>
          <br />
          <input type="checkbox" name="hardcover" id="hardcover" value="1" <?= $_SESSION['book']['hardcover'] ? 'checked' : '' ?> />
          <label for="hardcover">Hardcover</label>
          <br />
          <input type="checkbox" name="kindle" id="kindle" value="1" <?= $_SESSION['book']['kindle'] ? 'checked' : '' ?> />
          <label for="kindle">Kindle Edition</label>
          <br />
          <input type="checkbox" name="mp3" id="mp3" value="1" <?= $_SESSION['book']['mp3'] ? 'checked' : '' ?> />
          <label for="mp3">MP3 CD</label>
        </p>
        <!--Error message -->
        <?php if (hasError('formats')): ?>
          <p style="color:red"><?= htmlspecialchars(getError('formats')) ?></p>
        <?php endif; ?>
      </fieldset>
      <button type="submit">Create Book in Database</button>
      <!-- Success message -->
      <?php if (mb_strlen($_SESSION['successMessage'] > 0)): ?>
        <p style="color:green"><?= htmlspecialchars($_SESSION['successMessage']) ?></p>
      <?php endif; ?>
    </form>
  </main>
  <footer>
    <p>
      <a href="terms-and-conditions.html" target="_blank">Terms and Conditions for Buku Buku</a>
    </p>
  </footer>
</body>

</html>

<?php
//Clear all data from the session
unset($_SESSION['book']);
unset($_SESSION['errorMessages']);
unset($_SESSION['successMessage']);
?>