<!doctype html>
<html lang="en-US">

<head>
  <title>Register with Buku Buku (v1)</title>
  <meta charset="UTF-8" />
</head>

<body>
  <form method="post">
    <p>
      <label for="first_name">First Name</label>
      <br />
      <input
        type="text"
        name="first_name"
        id="first_name"
        maxlength="20"
        required />
    </p>
    <p>
      <label for="last_name">Last Name</label>
      <br />
      <input
        type="text"
        name="last_name"
        id="last_name"
        maxlength="20"
        required />
    </p>
    <p>
      <label for="email">E-Mail</label>
      <br />
      <input type="email" name="email" id="email" required />
    </p>
    <p>
      <label for="password">Password</label>
      <br />
      <input type="password" name="password" id="password" required />
    </p>
    <p>
      <label for="password_repeat">Password (repeat)</label>
      <br />
      <input
        type="password"
        name="password_repeat"
        id="password_repeat"
        required />
    </p>
    <p>
      <input type="checkbox" name="accepted" id="accepted" value="1" required />
      <label for="accepted">I accept the Terms and Conditions for Buku Buku.</label>
    </p>
    <button type="submit">Register with Buku Buku</button>
  </form>
</body>

</html>