<?php
session_start();
$name = isset($_SESSION['sname']) ? $_SESSION['sname'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/about.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>
<body>
    <header>
    <div class="navbar">

      <div class="logo">
        <a href="../php/HILEETUMBLER.php"><img src="../../imgs/hilee.png"></a>
      </div>
      <ul>
        <li><a href="../php/HILEETUMBLER.php">Home</a></li>
        <li><a href="../PHP/about.php">About</a></li>
        <li><a href="../php/product.php">Product</a></li>
        <li>
          <a href="../php/shoppingcart.php" class="cart-icon">
            <i class="ri-shopping-cart-2-line"></i>
            <span class="cart-count">0</span>
          </a>
        </li>
        <li class="user-profile">
          <a href="../php/ACCOUNT.php" class="icon-link">
            <i class="fa fa-user"></i>
          </a>
          <span class="username"><?php echo $name; ?></span><br>
          <button><a href="../PHP/logout.php">Logout</a></button>
        </li>
      </ul>
    </div>
  </header>
</body>
</html>