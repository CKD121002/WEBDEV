<?php
session_start(); // Start the session

// Include your database connection file
include 'db.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get the user ID from the session

    // Perform database actions (optional):
    // 1. Log logout event
    $sql = "INSERT INTO logout_logs (user_id, logout_time) VALUES (?, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    // 2. Update user status (optional)
    // $sql = "UPDATE users SET logged_in = 0 WHERE id = ?";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$user_id]);

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
