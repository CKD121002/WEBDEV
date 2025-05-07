<?php
include("../backend/connectdb.php");
session_start();


$name = $_SESSION['sname'];



$email = $_SESSION['semail'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../style/acc.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <header>
        <div class="navbar">

            <div class="logo">
                <a href="../php/HILEETUMBLER.php"><img src="../../imgs/hilee.png"></a>
            </div>
            <ul>
                <li><a href="../php/ACCOUNT.php">Account</a></li>
                <li><a href="../php/HILEETUMBLER.php">Home</a></li>
                <li><a href="../PHP/about.php">About</a></li>
                <li><a href="../php/product.html">Product</a></li>

            </ul>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="profile">
                <div class="profile-header">
                    <div class="user">
                        <i class="fa fa-user" id="user"></i>
                        <div class="info">
                            <h4>Name: <?php echo $name ?></h4>
                            <h4>Email: <?php echo $email ?> </h4>
                        </div>
                    </div>
                </div>
                <div class="menu">
                    <a href="ACCOUNT.php" class="menu-link"><i class="fa-solid fa-circle-user menu-icon"></i>Account</a>
                    <a href="RPASS.php" class="menu-link"><i class="fa-solid fa-shield menu-icon"></i>Security &
                        Access</a>
                    <a href="logout.php" class="menu-link"><i
                            class="fa-solid fa-right-from-bracket menu-icon"></i>Logout</a>
                </div>
            </div>

            <form class="account" action="../backend/accmanage.php" method="POST">
                <div class="account-header">
                    <h1 class="account-title">Account Settings</h1>
                    <?php if (isset($_SESSION['mess'])): ?>
                        <h3 style="color: black; font-size: 20px;"> <?php echo $_SESSION['mess'] ?> </h3>
                    <?php endif;
                    unset($_SESSION['mess']) ?>
                    <div class="btn-container">
                        <button type="reset" class="btn-clear">Reset</button>
                        <button type="submit" class="btn-save" name="save">Save</button>
                    </div>
                </div>

                <div class="account-edit">
                    <div class="input-container">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Change name? (OPTIONAL)">
                    </div>
                </div>

                <div class="account-edit">
                    <div class="input-container">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Change email? (OPTIONAL)">
                    </div>
                    <div class="input-container">
                        <label>Phone Number</label>
                        <input type="text" name="pnum" placeholder="Set Contact Number">
                    </div>
                </div>

                <div class="account-edit">
                    <div class="input-container">
                        <label>Address</label>
                        <textarea name="address" placeholder="Set address"></textarea>
                    </div>

                </div>
            </form>
        </div>
    </main>
</body>

</html>