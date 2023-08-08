<?php
include("connection.php");
header("Content-Type: application/json");

function getCarsByUserId($user_id)
{
    global $conn;
    $sql = "SELECT c.*, b.brand_name, m.model_name, cat.category_name 
            FROM cars c
            LEFT JOIN car_models m ON c.model_id = m.model_id
            LEFT JOIN car_brands b ON m.brand_id = b.brand_id
            LEFT JOIN car_category cat ON c.category_id = cat.category_id
            WHERE c.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cars = $result->fetch_all(MYSQLI_ASSOC);

    return $cars;
}

// Function to update a car by car_id
function updateCar($car_id, $data)
{
    global $conn;
    $sql = "UPDATE cars SET model_id=?, car_year=?, mileage=?, fuel_type=?, price=?, category_id=?, car_description=?, car_address=? WHERE car_id=?";
    $stmt = $conn->prepare($sql);

    $model_id = $data['model'];
    $car_year = $data['car_year'];
    $mileage = $data['mileage'];
    $fuel_type = $data['fuel_type'];
    $price = $data['price'];
    $category_id = $data['category'];
    $car_description = $data['car_description'];
    $car_address = $data['car_location'];

    $stmt->bind_param(
        "iisssisssi",
        $model_id,
        $car_year,
        $mileage,
        $fuel_type,
        $price,
        $category_id,
        $car_description,
        $car_address,
        $car_id
    );

    $stmt->execute();
}

// Function to get all cars
function getAllCars()
{
    global $conn;
    $sql = "SELECT c.*, b.brand_name, m.model_name, cat.category_name 
            FROM cars c
            LEFT JOIN car_models m ON c.model_id = m.model_id
            LEFT JOIN car_brands b ON m.brand_id = b.brand_id
            LEFT JOIN car_category cat ON c.category_id = cat.category_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $cars = $result->fetch_all(MYSQLI_ASSOC);

    return $cars;
}

// Function to get a car by car_id
function getCar($car_id)
{
    global $conn;
    $sql = "SELECT * FROM cars WHERE car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();
    return $car;
}

// Function to add a new car
function addCar($data, $photos)
{
    global $conn;
    $sql = "INSERT INTO cars (user_id, model_id, car_year, mileage, fuel_type, price, available, photo, category_id, car_description, car_address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $user_id = $_SESSION['user_id'];
    $model_id = $data['model'];
    $car_year = $data['car_year'];
    $mileage = $data['mileage'];
    $fuel_type = $data['fuel_type'];
    $price = $data['price'];
    $available = 1; // Assuming "available" should be set to 1 by default
    $category_id = $data['category'];
    $car_description = $data['car_description'];
    $car_address = $data['car_location'];

    // Handle the uploaded images
    $photoUrls = [];
    $uploadDir = '../uploads/'; // Change this to the directory where you want to store the images

    foreach ($photos['tmp_name'] as $index => $tmpName) {
        if ($photos['error'][$index] === UPLOAD_ERR_OK) {
            $photoFileName = uniqid() . '_' . $photos['name'][$index];
            $photoPath = $uploadDir . $photoFileName;

            if (move_uploaded_file($tmpName, $photoPath)) {
                $photoUrls[] = $photoFileName; // Save the file name without the "../uploads" prefix
            }
        }
    }
    $photoUrl = implode(',', $photoUrls);
    $stmt->bind_param(
        "iiissiissss",
        $user_id,
        $model_id,
        $car_year,
        $mileage,
        $fuel_type,
        $price,
        $available,
        $photoUrl,
        $category_id,
        $car_description,
        $car_address
    );

    $stmt->execute();
}

// Function to delete a car by car_id
function deleteCar($car_id)
{
    global $conn;
    $sql = "DELETE FROM cars WHERE car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
}


// Handle the HTTP methods

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if a specific car is requested
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $cars = getCarsByUserId($user_id);
        if ($cars) {
            echo json_encode($cars);
        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'Car not found'));
        }
    } else {
        // Get all cars
        $cars = getAllCars();
        echo json_encode($cars);
    }
} else // Handle the HTTP method
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Add a new car
        if (isset($_POST['model']) && isset($_POST['car_year']) /* add other required fields here */) {
            $data = $_POST;
            $photos = $_FILES['photo'];
            addCar($data, $photos);
            echo json_encode(array('message' => 'Car added successfully'));
        } else {
            http_response_code(400);
            echo json_encode(array('message' => 'Bad Request'));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Update a car
        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];
            $data = json_decode(file_get_contents('php://input'), true);
            updateCar($car_id, $data);
            echo json_encode(array('message' => 'Car updated successfully'));
        } else {
            http_response_code(400);
            echo json_encode(array('message' => 'Bad request'));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Delete a car
        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];
            deleteCar($car_id);
            echo json_encode(array('message' => 'Car deleted successfully'));
        } else {
            http_response_code(400);
            echo json_encode(array('message' => 'Bad request'));
        }
    } else {
        http_response_code(405);
        echo json_encode(array('message' => 'Method Not Allowed'));
    }
?>