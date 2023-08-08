<?php
include("PHP/connection.php");

// Function to get all categories
function getAllCategories()
{
    global $conn;
    $sql = "SELECT * FROM car_category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    return $categories;
}

// Function to get a category by car_id
function getCategoryByCarId($car_id)
{
    global $conn;
    $sql = "SELECT ct.* FROM car_category ct
            INNER JOIN cars c ON ct.category_id = c.category_id
            WHERE c.car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
    return $category;
}

// Handle the HTTP method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['car_id'])) {
        $car_id = $_GET['car_id'];
        $category = getCategoryByCarId($car_id);
        if ($category) {
            echo json_encode($category);
        } else {
            http_response_code(404);
        }
    } else {
        // Get all categories
        $categories = getAllCategories();
    }
} else {
    http_response_code(405);
    echo json_encode(array('message' => 'Method Not Allowed'));
}
