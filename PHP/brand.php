<?php
include("connection.php");

// Function to get all brands
function getAllBrands()
{
    global $conn;
    $sql = "SELECT * FROM car_brands";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $brands = $result->fetch_all(MYSQLI_ASSOC);
    return $brands;
}

// Function to get a brand by car_id
function getBrandByCarId($car_id)
{
    global $conn;
    $sql = "SELECT cb.* 
            FROM cars c
            LEFT JOIN car_models m ON c.model_id = m.model_id
            LEFT JOIN car_brands cb ON m.brand_id = cb.brand_id
            WHERE c.car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $brand = $result->fetch_assoc();
    return $brand;
}

// Handle the HTTP method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if a specific brand is requested using the car_id
    if (isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];
        $brand = getBrandByCarId($car_id);
        if ($brand) {
            echo json_encode($brand);
        } else {
            http_response_code(404);
        }
    } else {
        // Get all brands
        $brands = getAllBrands();
    }
} else {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}
