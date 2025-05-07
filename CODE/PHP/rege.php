<?php
session_start();
$hold = "Email";

if (isset($_SESSION["VEmail"])) {
    if ($_SESSION["VEmail"] == true) {
        $hold = "Email Already Exist";
        $_SESSION["VEmail"] = false;
    } else {
        $hold = "Email";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiLєє - landscape</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\STYLE\logs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <img src="..\..\IMGS\Bg1-removebg-preview.png" class="bg1">
    <img src="..\..\imgs\Bg_2-removebg-preview.png" class="bg2">
    <img src="..\..\imgs\sparkle_1-removebg-preview.png" class="sp1">
    <img src="..\..\imgs\sparkle_2-removebg-preview.png" class="sp2">
    <div class="container" id="login-page">
        <div class="logo">
            <img src="..\..\imgs/hilee-logo.png" alt="Logo" width="80px" height="50px">
            <h1>HiLєє</h1>
        </div>

        <h2>Register</h2>
        <?php if (isset($_SESSION["Sreg"]) && $_SESSION["Sreg"] == true):
            $_SESSION["Sreg"] = false; ?>
            <h3 style="margin: 0; color: white;">Sign Up Success! Login In now!</h3>
        <?php endif; ?>


        <form action="../backend/refor.php" method="post">

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input name="username" type="text" id="username" placeholder="Username">

            </div>

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input name="Email" type="text" id="username" placeholder="<?php echo $hold ?>">

            </div>

            <div class="input-group">
                <input name="password" type="password" id="password" placeholder="Password">
                <i class="fas fa-lock toggle-icon" onclick="togglePassword('password', this)"></i>
            </div>

            <div class="input-group">
                <input name="password" type="password" id="cpassword" placeholder="Confirm Password" oninput="check()">
                <i class="fas fa-lock toggle-icon"></i>
            </div>
            <p id="ermes" style="color: red; display: none;">Passwords Do Not Match.</p>

            <button class="create-text" name="Signup" type="submit" id="create" style="display: none;">Create</button><br>
            <p style="color: white; font-weight: bold; text-decoration: none;">Already have an account? <a
                    href="..\..\index.php">Click here</a></p>


        </form>
    </div>

    <script >
        function check() {
            var reset = document.getElementById('create');
            var pass = document.getElementById('password').value;
            var cpass = document.getElementById('cpassword').value;
            var mess = document.getElementById('ermes');

            if (cpass !== pass) {
                mess.style.display = "block";
                reset.style.display = "none"; 
            } else {
                mess.style.display = "none";
                reset.style.display = "block"; 
            }
        }
    </script>
</body>

</html>