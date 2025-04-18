<?php
include 'db.php';

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the home page or another appropriate page
    header("Location: index.php");
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to check the user's credentials
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and the password matches
    if ($user && password_verify($password, $user['password'])) {
        // Set the user's ID in the session
        $_SESSION['user_id'] = $user['id'];

        // Redirect to the home page or another appropriate page
        header("Location: index.php");
        exit;
    } else {
        // Display an error message
        $errorMessage = "Invalid username or password.";
    }
}
?>