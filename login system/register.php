<?php
session_start();
include 'db.php';

// Connect to database
$conn = new mysqli("localhost", "root", "", "hdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data (corrected names)
$name = $_POST['signup-name'];
$email = $_POST['signup-email'];
$username = $_POST['signup-username'];
$password = password_hash($_POST['create-password'], PASSWORD_DEFAULT); // Securely hash password

// Insert query using prepared statement
$stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $username, $password);

if ($stmt->execute()) {
    echo "Account created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
