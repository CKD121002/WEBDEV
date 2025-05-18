<?php
session_start();
$name = isset($_SESSION['sname']) ? $_SESSION['sname'] : '';

$successMessage = "";
if (isset($_SESSION['success'])) {
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']); 
}

?>

<!DOCTYPE html>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/hileehome.css">
    <title> HILEE </title>
    <link rel="icon" type="png" href="logohillee-removebg-preview.png">
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
crossorigin="anonymous" referrerpolicy="no-referrer">


</head>
<head>
 

<body>
<?php if (!empty($successMessage)): ?>
    <div class="success-message" id="success-msg"><?php echo $successMessage; ?></div>
  <?php endif; ?>
  <header>
    
  <style>
.success-message {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #d4edda; 
    color: #155724; 
    padding: 12px 24px;
    border: 2px solid #28a745; 
    border-radius: 8px;
    font-weight: bold;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
    animation: fadeOut 1s ease-in-out 4s forwards;
  }
  
  @keyframes fadeOut {
    to {
      opacity: 0;
      visibility: hidden;
    }
  }
    </style>

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
          <span class="username"> <?php echo $name;  ?> </span> <br> 
          <button><a href="../PHP/logout.php">Logout</a></button>
        </li>
      </ul>
    </div>

  </header>

  <div class="fullbg">

    <div class="gradientbg">

      <a href="#" class="toTOP">
        <img src="../../IMGS/UPBUTTON-removebg-preview.png">
      </a>


      <div class="halfbg-container">
    <div class="halfbg">
    <img class="slide active" src="../../IMGS/METALLIC1STHALFBG.jpg_large" alt="Slide 1">
    <img class="slide" src="../../IMGS/BLUEBOWHALFBG.jpg_large" alt="Slide 2">
    <img class="slide" src="../../IMGS/SAKURAHALFBETTER.jpg_large" alt="Slide 3">
    <img class="slide" src="../../IMGS/FRUITHALFBG.jpg_large" alt="Slide 4">
     
    <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
    <a class="next" onclick="changeSlide(1)">&#10095;</a>
  </div>


  <div class="dots">
    <span class="dot active" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
  </div>


    </div>

   <div class="text">
  <h2> FEATURED PRODUCTS </h2>
</div>

    <div class="boxcontainer"> 

    <div class="box" id="box1"> 
    <p class="boxtext1"> SWEET HARVEST [PEAR] </p>
      <img src="../../IMGS/pearrr-removebg-preview.png">
  </div>

    
    <div class="box" id="box2">
      <p class="boxtext2"> SWEET HARVEST [PINEAPPLE] </p>
      <img src="../../IMGS/pineapple-removebg-preview.png"> 
    </div>

    <div class="box" id="box3">
      <p class="boxtext3">  SWEET HARVEST [GREEN APPLE]  </p>
      <img src="../../IMGS/green_apple-removebg-preview.png">
    </div>

    <div class="box" id="box4"> 
      <p class="boxtext4">   SWEET HARVEST [WAX APPLE]  </p>
      <img src="../../IMGS/wax_apple-removebg-preview.png">
    </div>
  
  </div>




    </div>

    <button class="button1" onclick="location.href='../../CODE/PHP/product.html'"> SHOP FOR MORE </button> <!-- ADD PRODUCT PAGE -->

    <div class="flaskcontainer">

      <div class="flask" id="flaskleak">
        <img src="../../IMGS/hileeflaskleakproof.jpg_medium">
      </div>

      <div class="flask" id="flaskcoldhot">
        <img src="../../IMGS/hileeflascoldhot.jpg_medium">
      </div>
    </div>



    <div class="chooseuscontainer">

      <h1 class="chooseustext"> Introducing the HILEE Tumbler, designed for your ultimate hydration needs with a stylish touch. </h1>

      <p class="chooseustext1"> Material: Crafted from durable stainless steel, ensuring long-lasting use. </p>

      <p class="chooseustext2"> Volume: Holds between 1,000-2,000 ml of liquid for ample hydration. </p>

      <p class="chooseustext3"> Features: Leak-proof design and heat-resistant properties to keep your drinks secure and safe from burns. </p>

      <p class="chooseustext4"> Keeps Drinks Hot/Cold: Effective warming time of 12-24 hours for optimal temperature retention. </p>

      <h1 class="chooseustext5"> This stylish tumbler not only looks great but also offers practicality for everyday use! </h1>


      <button class="button2" onclick="location.href='../php/about.php'"> LEARN MORE </button> <!-- ADD ABOUT US PAGE -->

      <div class="chooseus">
        <img src="../../IMGS/HILEELEARN.jpg"></img>

      </div>


    </div>

</div>
</div>
  </div>

<script src="../js/hileehome.js"></script>
  <script src="../js/Product-Cart.js"></script>
</body>
<footer>
  
  <ul class="social-icon">
  <li>
  <a href= "https://facebook.com/profile.php?id=61565449175554"><i class="fa-brands fa-facebook"></i></i></a>
  </li>
  <li>
  <a href= "https://tiktok.com/@hilee_53?_t=ZS-8vQGqC7T4fC&_r=1"><i class="fa-brands fa-tiktok"></i></a>
  </li>
  <li>
  <a href= "https://ph.shp.ee/i2qQSbL"><i class="fa-brands fa-shopify"></i></a>
  </li>
  <li>
  <a href= "https://instagram.com/hilee_53?igsh=MWd6MG1tdnE5MWl5dQ=="><i class="fa-brands fa-instagram"></i></a>
  </li>
  </ul>
 
  <p>   ©2025 HILEE | All Rights Reserved </p>
  </footer>
</html>