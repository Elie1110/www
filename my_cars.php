<!DOCTYPE html>
<?php
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <!-- Assurez-vous que le chemin vers "home.css" est correct -->
    <link rel="stylesheet" href="CSS/home.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My cars</title>
</head>

<body>
<?php
      include('navbar.php');
    ?>

    <div class="container bg-white mt-2">
        <table id="cars_table" class="table">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Mileage ($)</th>
                    <th>Fuel Type</th>
                    <th>Car Location</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be populated dynamically by my_cars.js -->
            </tbody>
        </table>
    </div>
    <input type="hidden" id="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script  src="JS/my_cars.js?v=<?php echo time(); ?>"></script>
</html>
