<!DOCTYPE html>
<?php
ini_set('display_errors','0');
error_reporting(0);
include("PHP/connection.php");

// Check if the user is logged in (assuming you store a flag in the session after successful login)
$loggedIn = isset($_SESSION['email']);

if (!$loggedIn) {
    // Redirect the user to the login page
    header("Location: login.php");
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
    <link rel="stylesheet" href="CSS/cart.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car</title>
  </head>
  <body>
  <?php
      include('navbar.php');
    ?>
    <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Car Information</h5>
        <p class="card-text"><strong>Name:</strong> <?php echo $_GET['Name']; ?></p>
        <p class="card-text"><strong>Brand:</strong> <?php echo $_GET['Brand']; ?></p>
        <p class="card-text"><strong>Color:</strong> <?php echo $_GET['Color']; ?></p>
        <p class="card-text"><strong>Category:</strong> <?php echo $_GET['Category']; ?></p>
        <p class="card-text"><strong>Year:</strong> <?php echo $_GET['Year']; ?></p>
        <p class="card-text"><strong>Price:</strong> <?php echo $_GET['Price']; ?></p>
        <p class="card-text"><strong>Owner Email:</strong> <?php echo $_GET['owner_email']; ?></p>
        <img src="<?php echo "IMAGES/".$_GET['images']; ?>" style="width:200px; height:200px;" alt="Car Image" class="img-fluid">
      </div>
    </div>
  </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"
  ></script>
</html>
