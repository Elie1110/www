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
    <h3 class="text-primary">Sign up</h3>
  </div>
  <div class="container">
    <div class="card text-center" style="width: 18rem">
      <div class="card-body">
        <h5 class="card-title mb-4">New account</h5>
        <form action="PHP/signup.php" method="POST">
          <div class="mb-3">
            <label for="name">First name <span style="color: red;">*</span></label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Name"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="last_name">Last name <span style="color: red;">*</span></label>
            <input
              type="text"
              id="last_name"
              name="last_name"
              placeholder="Last name"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="email">Email <span style="color: red;">*</span></label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="phone">Phone number <span style="color: red;">*</span></label>
            <input
              type="text"
              id="phone"
              name="phone"
              placeholder="Phone"
              class="form-control"
              required
            />          
          </div>
          <div class="mb-3">
            <label for="password">Password <span style="color: red;">*</span></label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              class="form-control"
              required
            />
          </div>
          <div class="mb-3">
            <label for="confirm_password">Confirm password <span style="color: red;">*</span></label>
            <input
              type="password"
              id="confirm_password"
              name="confirm_password"
              placeholder="Confirm password"
              class="form-control"
              required
              oninput="checkPasswordMatch()"
            />
            <p id="password_match_message" style="color: red;"></p>
          </div>

          <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
  
  <script src="JS\signup.js"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"
  ></script>
</body>
</html>
