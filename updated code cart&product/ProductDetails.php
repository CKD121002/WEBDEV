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
    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/HileeTumblerCart.css">
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
  <main>
 <div class="product-detail">
    <a href="Product.php" class="back">←</a>
    <div class="product-img">
        <div class="thumbnail-list">
           <!-- <img src="pear.png" alt="Pear">
            <img src="pear.png" alt="Pear">
            <img src="pear.png" alt="Pear">
            <img src="pear.png" alt="Pear"> -->
        </div>
            <div class="main-img">
                <!-- <img src="pear.png" alt="Pear"> -->
            </div>
    </div>
    <div class="product-info">
            <h2 class="title"></h2>
            <span class="price"></span>
            <p class="description"></p>
            <div class="size-selection">
                <p>Select size</p>
                <div class="size-options">
                    <!-- <button class="selected">22oz</button>
                    <button>27oz</button>
                    <button>33oz</button>
                    <button>43oz</button> -->
                </div>
                <div class="color-selection">
                    <p>Available Color</p>
                    <div class="color-options">
                       <!-- <img src="pear.png" alt="pear" class="selected">-->
                    </div>
                </div>
            </div>
            <button class="button" id="addToCart">Add to Cart</button>
            <div class="popup-container">
        <div class="popup-message" id="popupMessage">Item successfully removed!</div>
        </div>

            <div class="product-policy">
                <p>100% Original Product</p>
                <p>Easy return and exchange policy within 14 days</p>
            </div>
    </div>
 </div>

 <main>
<script src="../js/products.js"></script>
<script src="../js/Product-Cart.js"></script>

</body>
</html>