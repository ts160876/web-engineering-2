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
          <input type="text" name="isbn" id="isbn" />
        </p>
        <p>
          <label for="title">Title</label>
          <br />
          <input
            type="text"
            name="title"
            id="title" />
        </p>
        <p>
          <label for="author">Author</label>
          <br />
          <input
            type="text"
            name="author"
            id="author" />
        </p>
      </fieldset>
      <fieldset>
        <legend>Additional Data</legend>
        <p>
          <label for="published">Publish Date</label>
          <br />
          <input type="date" name="published" id="published" />
        </p>
        <p>
          <label for="pages">Number of Pages</label>
          <br />
          <input type="number" name="pages" id="pages" />
        </p>
      </fieldset>
      <fieldset>
        <legend>Formats</legend>
        <p>
          <input type="checkbox" name="audio_book" id="audio_book" value="1" />
          <label for="audio_book">Audio Book</label>
          <br />
          <input type="checkbox" name="hardcover" id="hardcover" value="1" checked />
          <label for="hardcover">Hardcover</label>
          <br />
          <input type="checkbox" name="kindle" id="kindle" value="1" />
          <label for="kindle">Kindle Edition</label>
          <br />
          <input type="checkbox" name="mp3" id="mp3" value="1" />
          <label for="mp3">MP3 CD</label>
        </p>
      </fieldset>
      <button type="submit">Create Book in Database</button>
    </form>
  </main>
  <footer>
    <p>
      <a href="terms-and-conditions.html" target="_blank">Terms and Conditions for Buku Buku</a>
    </p>
  </footer>
</body>

</html>