<?php
session_start();
$value = "";
if (isset($_SESSION['email']) && $_SESSION['efound'] == true) {
    $value = $_SESSION['email'];
} else {
    $value = '';
}

$found = false;
if (isset($_SESSION['efound']) && $_SESSION['efound'] == true) {
    $found = true;
    $_SESSION['efound'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiLєє - landscape</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\style\logs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <img src="..\..\imgs\Bg1-removebg-preview.png" class="bg1">
    <img src="..\..\imgs\Bg_2-removebg-preview.png" class="bg2">
    <img src="..\..\imgs\sparkle_1-removebg-preview.png" class="sp1">
    <img src="..\..\imgs\sparkle_2-removebg-preview.png" class="sp2">

    <div class="container" id="login-page">
        <div class="logo">
            <img src="..\..\imgs/hilee-logo.png" alt="Logo" width="80px" height="50px"><br>
            <h1>HiLєє</h1>
        </div>

        <h2>RESET PASSWORD</h2>
        <?php if (isset($_SESSION['sreset']) && $_SESSION['sreset'] == true):
            $_SESSION['sreset'] = false ?>
            <p id="login-error" style="color: white; font-weight: bold;">Successfully Resetted Password.</p>
        <?php endif; ?>

        <form action="../backend/forforgot.php" method="post">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input name="Email" type="text" id="username" placeholder="Email" value="<?php echo $value; ?>">


            </div>

            <?php if (isset($_SESSION['wemail']) && $_SESSION['wemail'] == true):
                $_SESSION['wemail'] = false ?>
                <p id="login-error" style="color: red;">Email not found.</p>
            <?php endif; ?>
            <?php if($found == false): ?>
                <button class="login-btn" name="femail" type="submit">Find Email</button>
                <a href="..\..\index.php" style="color: white; text-decoration: none; font-weight: bold;">Go Back to Login</a>
            <?php else: ?>
                <div class="input-group">
                    <input type="password" id="password" placeholder="Password">
                    <i class="fas fa-lock toggle-icon" "></i>
                </div>
                <div class="input-group">
                    <input name="password" type="password" id="cpassword" placeholder="Confirm Password" oninput="check()">
                    <i class="fas fa-lock toggle-icon" "></i>
                </div>
                <p id="ermes" style="color: red; display: none;">Passwords Do Not Match.</p>
                <button class="create-text" type="submit" name="reset" id="resetb" style="display: none;">Reset Now</button>
            <?php endif; ?>
        </form>
    </div>

    <script>
        function check() {
            var reset = document.getElementById('resetb');
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