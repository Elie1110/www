<?php
$servername = "localhost";
$username = "root";
$password_db = ""; 
$database = "car_shopping";

$conn = new mysqli($servername, $username, $password_db, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
// Check if the user is logged in by comparing the session ID with the value stored in the SESSID cookie
 if (isset($_COOKIE['SESSID']) && $_COOKIE['SESSID'] === session_id()) {
     $loggedIn = true;
 } else {
     // User is not logged in
     $loggedIn = false;
}
?>