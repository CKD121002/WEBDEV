<?php
session_start();
include 'db.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // SIGN UP
    } elseif (isset($_POST['signup'])) {
        $name = $_POST['signup_name'];
        $email = $_POST['signup_email'];
        $username = $_POST['signup_username'];
        $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);

        $checkUser = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $checkUser->bind_param("ss", $username, $email);
        $checkUser->execute();
        $result = $checkUser->get_result();

        if ($result->num_rows > 0) {
            $error = "Username or email already exists!";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $username, $password);
            if ($stmt->execute()) {
                $success = "Account created successfully!";
            } else {
                $error = "Signup failed.";
            }
        }

        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HiLєє - Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
</head>
<body>

    <div class="container" id="Sign-Up-page">
        <div class="logo">
            <img src="hilee logo.png" alt="Logo" width="40px" height="50px">
            <h1>HiLєє</h1>
        </div>
        <h2>Sign Up</h2>
        <?php if (isset($successMessage)) { echo "<div class='success-message'>$successMessage</div>"; } ?>
        <?php if (isset($errorMessage)) { echo "<p>$errorMessage</p>"; } ?>
        <form action="register.php" method="POST">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Name" id="signup-name" name="signup-name" required>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" id="signup-email" name="signup-email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" id="signup-username" name="signup-username" required>
            </div>
            <div class="input-group">
                <input type="password" id="create-password" placeholder="Password" name="create-password" required>
                <i class="fas fa-lock toggle-icon" onclick="togglePassword('create-password', this)"></i>
            </div>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p class="signin-text">Already have an account? <a href="index.php">Login</a></p>
    </div>
    <script src="script.js"></script>
</body>
</html>