<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = 'localhost'; // Database host
$dbname = 'mydatabase'; // Database name
$db_username = 'root'; // Database username
$db_password = ''; // Database password

// Create a connection
$conn = new mysqli($host, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$inputUsername = $_POST['username']; // Username from the login form
$inputPassword = $_POST['password']; // Password from the login form

// Prepare and bind
$stmt = $conn->prepare("SELECT passwords FROM myusers WHERE usernames = ?");
$stmt->bind_param("s", $inputUsername);

// Execute query
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind result variable
    $stmt->bind_result($storedHashedPassword);
    $stmt->fetch();

    // Verify password
    if (password_verify($inputPassword, $storedHashedPassword)) {
        echo "Login successful!";
    } else {
        echo "Invalid password.";
    }
} else {
    echo "Username not found.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
