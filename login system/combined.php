<?php
session_start();
include 'db.php';

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // LOGIN
    if (isset($_POST['login'])) {
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

    // RESET PASSWORD
    } elseif (isset($_POST['reset'])) {
        $email = $_POST['reset_email'];
        $oldPassword = $_POST['reset_password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($oldPassword, $user['password'])) {
            $newPassword = password_hash("new123", PASSWORD_DEFAULT); // You can change this
            $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $update->bind_param("ss", $newPassword, $email);
            $update->execute();
            $success = "Password reset successful!";
        } else {
            $error = "Incorrect email or old password!";
        }
    }
}
?>

<!-- HTML PART BELOW -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HiLєє - Login System</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
</head>
<body>
<div class="container">
<div class="logo">
            <img src="hilee logo.png" alt="Logo" width="80px" height="50px">
</div>
    <h1>HiLєє</h1>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>

    <!-- LOGIN FORM -->
    <div id="login-container">
        <form method="POST">
        <h2>WELCOME!</h2>
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="login_username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <input type="password" name="login_password" placeholder="Password" required>
            <i class="fas fa-lock toggle-icon" onclick="togglePassword('password', this)"></i>
        </div>  
        <button class="login-btn" onclick="validateLogin()">Login</button> 
        </form>
        <a href="reset_password.php" onclick="showPage('reset-password-page')">Forgot password?</a>
        <button class="create-text" disabled>Create</button>
        <p class="signin-text">Don't have an account? 
            <a href="signup.php" onclick="showPage('Sign-Up-page')">SignUp</a> 
        </p>
        <div class="sparkle sparkle-top-right"></div>
        <div class="sparkle sparkle-bottom-left"></div>
        <div class="sparkle sparkle-top-left"></div>
        <div class="sparkle sparkle-bottom-right"></div>
    </div>

    </div>

    <!-- SIGN UP FORM -->
    <div id="signup-container" style="display: none;">
    <div class="logo">
            <img src="hilee logo.png" alt="Logo" width="40px" height="50px">
            <h1>HiLєє</h1>
        <form method="POST">
            <h2>Sign Up</h2>
            <i class="fas fa-user"></i>
            <input type="text" name="signup_name" placeholder="Name" required>
            <i class="fas fa-envelope"></i>
            <input type="email" name="signup_email" placeholder="Email" required>
            <i class="fas fa-user"></i>
            <input type="text" name="signup_username" placeholder="Username" required>
            <i class="fas fa-lock toggle-icon" onclick="togglePassword('create-password', this)"></i>
            <input type="password" name="signup_password" placeholder="Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>
        <p class="signin-text">Already have an account? <a href="index.php" onclick="showPage('login-page')">Login</a></p>
    </div>

    </div>

    <!-- RESET PASSWORD FORM -->
    <div id="reset-container" style="display: none;">
        <form method="POST">
            <h2>Reset Password</h2>
            <i class="fas fa-lock toggle-icon" onclick="togglePassword('create-password', this)"></i>
            <input type="password" name="reset_password" placeholder="Old Password" required>
            <i class="fas fa-envelope"></i>
            <input type="email" name="reset_email" placeholder="Email" required>
            <button type="submit" name="reset">Reset</button>
        </form>
    </div>
    <script src="script.js"></script>
</div>
</body>
</html>
