<?php
include("connection.php");

// Function to add a car to the cart
function addToCart($user_id, $car_id)
{
    global $conn;
    // Add the car to the cart table in the database
    $sql = "INSERT INTO carts (user_id, car_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $car_id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

// Function to get cars in the cart for a specific user
function getCarsInCart($user_id)
{
    global $conn;
    $sql = "SELECT c.*, b.brand_name, m.model_name, cat.category_name 
            FROM carts carts
            INNER JOIN cars c ON carts.car_id = c.car_id
            LEFT JOIN car_models m ON c.model_id = m.model_id
            LEFT JOIN car_brands b ON m.brand_id = b.brand_id
            LEFT JOIN car_category cat ON c.category_id = cat.category_id
            WHERE carts.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cars = $result->fetch_all(MYSQLI_ASSOC);

    return $cars;
}


// Function to remove a car from the cart
function removeFromCart($user_id, $car_id)
{
    global $conn;
    // Remove the car from the cart table in the database
    $sql = "DELETE FROM carts WHERE user_id = ? AND car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $car_id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

// Handle the HTTP methods

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a car to the cart
    if (isset($_POST['user_id']) && isset($_POST['car_id'])) {
        $user_id = $_POST['user_id'];
        $car_id = $_POST['car_id'];
        $success = addToCart($user_id, $car_id);
        if ($success) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    } else {
        http_response_code(400);
        echo json_encode(array('message' => 'Bad Request'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Remove a car from the cart
    if (isset($_GET['user_id']) && isset($_GET['car_id'])) {
        $user_id = $_GET['user_id'];
        $car_id = $_GET['car_id'];
        $success = removeFromCart($user_id, $car_id);
        if ($success) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    } else {
        http_response_code(400);
        echo json_encode(array('message' => 'Bad Request'));
    }
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get cars in the cart for a user or all cars in the cart
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $cars = getCarsInCart($user_id);
        echo json_encode($cars);
    } else {
        $cars = getCarsInCart();
        echo json_encode($cars);
    }
} else {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}

?>
