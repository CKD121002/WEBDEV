<?php
session_start();
include("../backend/connectdb.php");

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        $email = $_POST['reset-email'];
        $oldPassword = $_POST['reset-password'];

        
        $stmt = $conn->prepare("SELECT * FROM users WHERE EMAIL = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $oldPassword == $user['PASSWORD']) { 
            $_SESSION['reset_email'] = $email;
            $_SESSION['efound'] = true; 
            header("Location: create_newpass.php");
            exit();
        } else {
            $error = "Incorrect email or old password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HiLєє - Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\style\logs.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
</head>

<body>
  <img src="..\..\imgs\Bg1-removebg-preview.png" class="bg1">
    <img src="..\..\imgs\Bg_2-removebg-preview.png" class="bg2">
    <img src="..\..\imgs\sparkle_1-removebg-preview.png" class="sp1">
    <img src="..\..\imgs\sparkle_2-removebg-preview.png" class="sp2">

<form action="forgot.php" method="POST">
    <div class="container" id="reset-password-page">
        <div class="logo">
            <img src="..\..\imgs\hilee-logo.png" alt="Logo" width="40px" height="50px">
            <h1>HiLєє</h1>
        </div>
        <h2>Reset Password</h2>

        <?php if (!empty($success)) { echo "<div class='success-message'>$success</div>"; } ?>
        <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

        <div class="input-group">
            <input type="password" id="reset-password" name="reset-password" placeholder="Enter old Password" required>
            <br>
            <i class="fas fa-lock toggle-icon"></i>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" id="reset-email" name="reset-email" required>
        </div>
        <button type="submit" name="reset">Reset</button>

        <p class="signin-text">Already have an account? <a href="..\..\index.php">Login</a></p>
    </div> 
</form>

</body>
</html>