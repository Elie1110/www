<!DOCTYPE html>
<?php
include("PHP/connection.php");
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
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.9.55/css/materialdesignicons.min.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My cart</title>
</head>
<body>
<?php
include('navbar.php');
?>

<div class="container">
    <div class="card text-center" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title mb-4">My cart</h5>
            <ul id="cart-items">
                <!-- Cart items will be populated dynamically by cart.js -->
            </ul>
            <p id="total-price"></p>
            <button id="buy-button" onclick="buy_cars()" class="btn btn-primary mb-2">Proceed to buy</button>
        </div>
    </div>
</div>
<input type="hidden" id="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"
></script>
<input type="hidden" id="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
<script src="JS/cart.js?v=<?php echo time(); ?>" ></script>
</body>
</html>
