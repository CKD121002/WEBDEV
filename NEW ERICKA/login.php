<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HiLєє - landscape</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../style/logs.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />


</head>

<body>
    <img src="../../imgs/Bg1-removebg-preview.png" class="bg1" />
    <img src="../../imgs/Bg_2-removebg-preview.png" class="bg2" />
    <img src="../../imgs/sparkle_1-removebg-preview.png" class="sp1" />
    <img src="../../imgs/sparkle_2-removebg-preview.png" class="sp2" />

    <div class="container" id="login-page">
        <div class="logo">
            <img src="../../imgs/hilee-logo.png" alt="Logo" width="80" height="50" />
            <br />
            <h1>HiLєє</h1>
        </div>

        <h2>WELCOME!</h2>

        <!-- Success message after registration -->
        <?php if (isset($_SESSION["Sreg"]) && $_SESSION["Sreg"] === true): ?>
            <div class="success-message">Sign Up Successfully! Login In now!</div>
            <?php $_SESSION["Sreg"] = false; ?>
        <?php endif; ?>

        <!-- Error message for incorrect login -->
        <?php if (isset($_SESSION["icreds"]) && $_SESSION["icreds"] === true): ?>
            <p id="login-error" style="color: red;">
                Incorrect Email or Password. <br />
                Please Try Again.
            </p>
            <?php $_SESSION["icreds"] = false; ?>
        <?php endif; ?>

        <form action="../BACKEND/login.php" method="post">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input name="Email" type="text" id="username" placeholder="Email" required />
            </div>

            <div class="input-group">
                <input name="password" type="password" id="password" placeholder="Password" required />
                <i class="fas fa-lock toggle-icon"></i>
            </div>

            <button class="login-btn" name="signin" type="submit">Login</button><br>
            <a href="../PHP/forgot.php" style="color: black; font-weight: bold; text-decoration: none;">Forgot
                password? Click here</a><br>

           <div id="guest-login">
                <button type="button" onclick="disabled()">Create Account</button><br>
            </div>
                <a href="rege.php" style="color: black; font-weight: bold; text-decoration: none;">Don't have
                    an account? Click here</a><br>
        </form>
    </div>

    <script>
        function register() {
            window.location.href = "../php/index.php";
        }
    </script>
</body>

</html>