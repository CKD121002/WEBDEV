<?php
session_start();
include 'db.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $success = "Login successful! Welcome, " . $user['username'];
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HiLєє - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
</head>
<body>

<!-- LOGIN PAGE -->
<div class="container" id="login-page">
    <div class="logo">
        <img src="hilee logo.png" alt="Logo" width="80px" height="50px">
        <h1>HiLєє</h1>
    </div>
    <h2>WELCOME!</h2>

    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="POST">
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="login_username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="login_password" id="password" placeholder="Password" required>
            <i class="fas fa-lock toggle-icon" onclick="togglePassword('password', this)"></i>
        </div>  
        <button class="login-btn" type="submit" name="login">Login</button>
    </form>

    <a href="reset_password.php">Forgot password?</a>
    <button class="create-text" disabled>Create</button>
    <p class="signin-text">Don't have an account? 
        <a href="signup.php">SignUp</a> 
    </p>

    <div class="sparkle sparkle-top-right"></div>
    <div class="sparkle sparkle-bottom-left"></div>
    <div class="sparkle sparkle-top-left"></div>
    <div class="sparkle sparkle-bottom-right"></div>
</div>

<script src="script.js"></script>
</body>
</html>
