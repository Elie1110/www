<!DOCTYPE html>
<?php
include("PHP/connection.php");

// Check if the user is logged in (assuming you store a flag in the session after successful login)
$loggedIn = isset($_SESSION['email']);

if ($loggedIn) {
    // Redirect the user to the login page
    header("Location: home.php");
    exit();
}
?>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="CSS/login.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
  </head>
  <body>
    <div class="title">
      <h3 class="text-primary">Welcome</h3>
    </div>
    <div class="container">
      <div class="card text-center" style="width: 18rem">
        <div class="card-body">
          <h5 class="card-title mb-4">Login</h5>
          <form action="PHP/login.php" method="POST">
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              class="form-control mb-3 rounded"
              required
            />
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              class="form-control mb-3 rounded"
              required
            />
            <button
              class="btn btn-primary"
              type="submit"
              class="mb-2"
            >Login</button>
          </form>
          <a href="signup.php">
            <button class="btn btn-outline-secondary mt-2">Sign Up</button>
          </a>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"
  ></script>
</html>
