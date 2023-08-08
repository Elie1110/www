<?php
ini_set('display_errors','0');
error_reporting(0);
include("PHP/connection.php");
include("PHP/brand.php");
include("PHP/model.php");
include("PHP/category.php");

// Check if the user is logged in (assuming you store a flag in the session after successful login)
$loggedIn = isset($_SESSION['email']);

if (!$loggedIn) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"
    />
    <link rel="stylesheet" href="CSS/home.css" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.9.55/css/materialdesignicons.min.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Selling Page</title>

</head>
<body>
  <?php
  include('navbar.php');
?>  
  <header>
    <div class="welcome-message">
      Welcome!
    </div>
  </header>

  <main>
    <h1>Car Selling Page</h1>
    <h2>Please fill in the details of your car below to sell it on our platform.</h2>

    <!-- Formulaire pour ajouter une voiture à vendre -->
    <form action="PHP/car.php" method="POST" enctype="multipart/form-data">
        <label for="marque">Choisissez une marque :</label>
        <select id="marque" name="marque">
    <option value="">Select brand</option>
    <?php
    // Loop through the brands array and generate the options dynamically
    foreach ($brands as $brand) {
        echo '<option value="' . $brand['brand_id'] . '">' . $brand['brand_name'] . '</option>';
    }
    ?>
</select>

      <label for="category">Car Category:</label>
      <select id="category" name="category">
          <option value="">Select Category</option>
          <?php
            // Loop through the brands array and generate the options dynamically
            foreach ($categories as $category) {
                echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
            }
          ?>
        </select>
        <label for="camodel">Car Model:</label>
    <select id="model" name="model">
        <option value="">Select Model</option>
        <!-- Models will be populated dynamically using JavaScript -->
    </select>

    <!-- Include JavaScript to handle the dynamic behavior -->
    <script src="JS\index.js"></script>

      <label for="car_year">Car Year:</label>
      <input type="number" name="car_year" id="car_year" min="1900" max="2023">
      <label for="mileage"> Mileage:</label>
      <input type="number" name="mileage" id="mileage">

      <label for="car_fuel_type">Fuel Type:</label>
      <select name="fuel_type" id="fuel_type">
        <option value="">Select Fuel Type</option>
        <option value="gasoline">Gasoline</option>
        <option value="diesel">Diesel</option>
        <option value="electric">Electric</option>
        <option value="hybrid">Hybrid</option>
        <option value="flex-fuel">Flex Fuel</option>
        <option value="natural-gas">Natural Gas</option>
        <option value="propane">Propane</option>
        <option value="hydrogen">Hydrogen</option>
      </select>

      <label for="car_location">Car location:</label>
      <input type="text" name="car_location" id="car_location">
      <label for="car_description">Description:</label>
      <textarea name="car_description" id="car_description"></textarea>
      <label for="price"> Price:</label>
      <input type="number" name="price" id="price">
      <label for="car_images">Car Images:</label>
      <input type="file" name="photo[]" id="photo" multiple accept="image/*">
      <button type="submit">Submit</button>
    </form>
  </main>
  
</body>
</html>
