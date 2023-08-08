<?php
session_start();
include('connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

// Get the hashed password from the database
$sql = "SELECT user_id, pwd FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPasswordFromDB = $row['pwd'];
    $userId = $row['user_id'];
    
    // Verify the user's inputted password with the hashed password from the database
    if (password_verify($password, $hashedPasswordFromDB)) {
        // Passwords match, user is authenticated
        $_SESSION['user_id'] = $userId;
        $_SESSION['email'] = $email;
        
        // Generate a unique session ID and set it as a session cookie
        $sessionId = session_id();
        setcookie('SESSID', $sessionId, time() + (86400 * 30), '/'); // Session cookie will expire after 30 days
        
        header("Location: ../home.php");
        exit();
    } else {
        // Passwords do not match
        echo "Invalid email or password";
    }
} else {
    // User not found in the database
    echo "Invalid email or password";
}

$stmt->close();
$conn->close();
?>
