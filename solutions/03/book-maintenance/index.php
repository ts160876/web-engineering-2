<?php
//Define variables for form fields.
$isbn = '';
$title = '';
$author = '';
$published = '';
$pages = '';
$audioBook = false;
$hardcover = false;
$kindle = false;
$mp3 = false;

//Define variables to store error messages and sucess message.
$errorMessages = [];
$successMessage = '';

function logError($field, $message)
{
  global $errorMessages;
  $errorMessages[$field] = $message;
}

function hasError($field): bool
{
  global $errorMessages;
  if (array_key_exists($field, $errorMessages)) {
    return true;
  } else {
    return false;
  }
}

function getError($field): string
{
  global $errorMessages;
  if (array_key_exists($field, $errorMessages)) {
    return $errorMessages[$field];
  } else {
    return '';
  }
}

//Only if the user pressed the submit button to register with Buku Buku, we validate the data.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //ISBN
  $isbn = filter_input(INPUT_POST, 'isbn');
  if (mb_strlen($isbn) < 1) {
    logError('isbn', 'Enter an ISBN.');
  } elseif (!preg_match('/^\d{3}-\d{10}$/', $isbn)) {
    logError('isbn', 'The ISBN does not confirm to the format nnn-nnnnnnnnnn (whereas n is a number).');
  }
  //Title
  $title = filter_input(INPUT_POST, 'title');
  if (mb_strlen($title) < 1) {
    logError('title', 'Enter a Title.');
  } elseif (mb_strlen($title) > 50) {
    logError('title', 'The Title must not have more than 50 characters.');
  }
  //Author
  $author = filter_input(INPUT_POST, 'author');
  if (mb_strlen($author) < 1) {
    logError('author', 'Enter an Author.');
  } elseif (mb_strlen($author) > 50) {
    logError('author', 'The Author must not have more than 50 characters.');
  }
  //Publish Date (the browser should send the date in the format YYYY-MM-DD)
  $published = filter_input(INPUT_POST, 'published');
  $publishedDate = DateTime::createFromFormat('Y-m-d', $published);
  if (!($publishedDate && $publishedDate->format('Y-m-d') === $published)) {
    logError('published', 'Enter a valid Publish Date.');
  }
  //Number of Pages
  $pages = filter_input(INPUT_POST, 'pages');
  $pagesInteger = filter_var($pages, FILTER_VALIDATE_INT);
  if (mb_strlen($pages) < 1) {
    logError('pages', 'Enter Number of Pages');
  } elseif ($pagesInteger === false) {
    logError('pages', 'Enter a valid number.');
  } elseif ($pagesInteger < 10) {
    logError('pages', 'Number of Pages must be greater or equal to 10.');
  }
  //Formats
  $audioBook = filter_input(INPUT_POST, 'audio_book', FILTER_VALIDATE_BOOL) || false;
  $hardcover = filter_input(INPUT_POST, 'hardcover', FILTER_VALIDATE_BOOL) || false;
  $kindle = filter_input(INPUT_POST, 'kindle', FILTER_VALIDATE_BOOL) || false;
  $mp3 = filter_input(INPUT_POST, 'mp3', FILTER_VALIDATE_BOOL) || false;
  if ($audioBook === false && $hardcover === false && $kindle === false & $mp3 === false) {
    logError('formats', 'You need to select at least one format.');
  }

  //Construct success message.
  if (empty($errorMessages)) {
    $successMessage = "The book $title (ISBN: $isbn) published on $published with $pages pages by $author has been created. Available formats are: ";
    //The following coding is not super nicely written. It does the job though.
    if ($audioBook) {
      $successMessage = $successMessage . 'Audio Book';
    }
    if ($hardcover) {
      if (substr($successMessage, -1) != ' ') {
        $successMessage = $successMessage . ', ';
      }
      $successMessage = $successMessage . 'Hardcover';
    }
    if ($kindle) {
      if (substr($successMessage, -1) != ' ') {
        $successMessage = $successMessage . ', ';
      }
      $successMessage = $successMessage . 'Kindle';
    }
    if ($mp3) {
      if (substr($successMessage, -1) != ' ') {
        $successMessage = $successMessage . ', ';
      }
      $successMessage = $successMessage . 'MP3';
    }
  }
} else {
  //Check Hardcover by default (that happens only for GET requests).
  $hardcover = true;
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
          <input type="text" name="isbn" id="isbn" value="<?= htmlspecialchars($isbn) ?>" />
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
            value="<?= htmlspecialchars($title) ?>" />
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
            value="<?= htmlspecialchars($author) ?>" />
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
          <input type="date" name="published" id="published" value="<?= htmlspecialchars($published) ?>" />
          <!--Error message -->
          <?php if (hasError('published')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('published')) ?></span>
          <?php endif; ?>
        </p>
        <p>
          <label for="pages">Number of Pages</label>
          <br />
          <input type="number" name="pages" id="pages" value="<?= htmlspecialchars($pagesInteger) ?>" />
          <!--Error message -->
          <?php if (hasError('pages')): ?>
            <span style="color:red"><?= htmlspecialchars(getError('pages')) ?></span>
          <?php endif; ?>
        </p>
      </fieldset>
      <fieldset>
        <legend>Formats</legend>
        <p>
          <input type="checkbox" name="audio_book" id="audio_book" value="1" <?= $audioBook ? 'checked' : '' ?> />
          <label for="audio_book">Audio Book</label>
          <br />
          <input type="checkbox" name="hardcover" id="hardcover" value="1" <?= $hardcover ? 'checked' : '' ?> />
          <label for="hardcover">Hardcover</label>
          <br />
          <input type="checkbox" name="kindle" id="kindle" value="1" <?= $kindle ? 'checked' : '' ?> />
          <label for="kindle">Kindle Edition</label>
          <br />
          <input type="checkbox" name="mp3" id="mp3" value="1" <?= $mp3 ? 'checked' : '' ?> />
          <label for="mp3">MP3 CD</label>
        </p>
        <!--Error message -->
        <?php if (hasError('formats')): ?>
          <p style="color:red"><?= htmlspecialchars(getError('formats')) ?></p>
        <?php endif; ?>
      </fieldset>
      <button type="submit">Create Book in Database</button>
      <!-- Success message -->
      <?php if (mb_strlen($successMessage > 0)): ?>
        <p style="color:green"><?= htmlspecialchars($successMessage) ?></p>
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