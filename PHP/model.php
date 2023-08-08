<?php
include("connection.php");

// Function to get models by brand ID
function getModelsByBrandId($brand_id)
{
    global $conn;
    $sql = "SELECT * FROM car_models WHERE brand_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $brand_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $models = $result->fetch_all(MYSQLI_ASSOC);
    return $models;
}

// Handle the HTTP method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['brand'])) {
        $brand_id = (int) $_GET['brand'];
        $models = getModelsByBrandId($brand_id);
        echo json_encode($models);
    } else {
        http_response_code(400);
        echo json_encode(array('message' => 'Bad Request'));
    }
} else {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}