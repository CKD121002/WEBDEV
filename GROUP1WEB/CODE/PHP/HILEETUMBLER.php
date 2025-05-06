<?php
session_start();

$successMessage = "";
if (isset($_SESSION['success'])) {
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']); 
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../style/hileehome.css">
  <title> HILEE </title>
  <link rel="icon" type="png" href="../IMGS/logohillee-removebg-preview.png">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet" />
</head>

<body>
<?php if (!empty($successMessage)): ?>
    <div class="success-message" id="success-msg"><?php echo $successMessage; ?></div>
  <?php endif; ?>
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

        <li>
          <a href="../php/shoppingcart.php" class="cart-icon">
            <i class="ri-shopping-cart-2-line"></i>
            <span class="cart-count">0</span>
          </a>
        </li>

      </ul>
    </div>
  </header>

  <div class="fullbg">

    <div class="gradientbg">

      <a href="#" class="toTOP">
        <img src="../../IMGS/UPBUTTON-removebg-preview.png">
      </a>


      <div class="halfbg" style="max-width:120%">
        <img class="halfbg1" src="../../IMGS/HILEEHALF1ST.jpg" style="width: 100%">
        <img class="halfbg2" src="../../IMGS/BLUEBOWHALFBG.jpg" style="width:100%">
        <img class="halfbg3" src="../../IMGS/SAKURAHALFBG.jpg" style="width:100%">
        <img class="halfbg4" src="../../IMGS/FRUITHALFBG.jpg" style="width:100%">
      </div>

      <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.querySelectorAll(".halfbg img");
          for (i = 0; i < x.length; i++)
            x[i].classList.remove("active");
          myIndex++;
          if (myIndex > x.length) {
            myIndex = 1;
          }
          x[myIndex - 1].classList.add("active");
          setTimeout(carousel, 4000);
        }
      </script>

    </div>

    <div class="text">
      <h2> FEATURED PRODUCTS </h2>
    </div>

    <div class="boxcontainer">

      <div class="box" id="box1">
        <p class="boxtext1">
          <a href="HILEETUMBLER.html"> SWEET HARVEST [PEAR] </a>
        </p> <!-- CHANGE THE HREF HTML  -->
        <img src="../../IMGS/pearrr-removebg-preview.png">
      </div>

      <div class="box" id="box2">
        <p class="boxtext2">
          <a href="HILEETUMBLER.html"> SWEET HARVEST [PINEAPPLE] </a>
        </p>
        <img src="../../IMGS/pineapple-removebg-preview.png">
      </div>

      <div class="box" id="box3">
        <p class="boxtext3">
          <a href="HILEETUMBLER.html"> SWEET HARVEST [GREEN APPLE] </a>
        </p>
        <img src="../../IMGS/green_apple-removebg-preview.png">
      </div>

      <div class="box" id="box4">
        <p class="boxtext4">
          <a href="HILEETUMBLER.html"> SWEET HARVEST [RASPBERRY] </a>
        </p>
        <img src="../../IMGS/rasberry-removebg-preview.png">
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

  <script src="../js/Product-Cart.js"></script>
</body>

</html>