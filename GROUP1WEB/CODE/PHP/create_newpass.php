<?php
session_start();
include("../backend/connectdb.php");

$success = '';
$error = '';


if (!isset($_SESSION['reset_email'])) {
    header("Location: forgot.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_new'])) {
    $email = $_SESSION['reset_email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    
    if ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {
        
        $update = $conn->prepare("UPDATE users SET PASSWORD = ? WHERE EMAIL = ?");
        $update->bind_param("ss", $newPassword, $email);
        $update->execute();

        if ($update->affected_rows > 0) {
            $success = "Password successfully updated!";
            unset($_SESSION['reset_email']); 
        } else {
            $error = "Failed to update password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\style\logs.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<img src="..\..\imgs\Bg1-removebg-preview.png" class="bg1">
<img src="..\..\imgs\Bg_2-removebg-preview.png" class="bg2">
<img src="..\..\imgs\sparkle_1-removebg-preview.png" class="sp1">
<img src="..\..\imgs\sparkle_2-removebg-preview.png" class="sp2">

<form action="create_newpass.php" method="POST">
    <div class="container" id="create-newpass-page">
        <div class="logo">
            <img src="..\..\imgs\hilee-logo.png" alt="Logo" width="40px" height="50px">
            <h1>HiLєє</h1>
        </div>

        <h2>Create New Password</h2>

        <?php if (!empty($success)) echo "<div class='success-message'>$success</div>"; ?>
        <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="new_password" placeholder="Enter new password" required>
        </div>

        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="confirm_password" placeholder="Re-enter new password" required>
        </div>

        <button type="submit" name="create_new">Confirm</button>

        <p class="signin-text">Already have an account? <a href="..\..\index.php">Login</a></p>
    </div>
</form>

</body>
</html>
