<?php
session_start();

// Determine if user is a guest
$isGuest = !isset($_SESSION['username']);
$name = isset($_SESSION['sname']) ? $_SESSION['sname'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HILEE</title>
  <link rel="icon" type="image/png" href="logohillee-removebg-preview.png">
  <link rel="stylesheet" href="code/STYLE/hileehome.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.6);
    }
    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      width: 300px;
      border-radius: 10px;
      text-align: center;
    }
    .modal-login-btn {
      display: inline-block;
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    .close {
      float: right;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>

<body>
<?php if ($isGuest): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById("loginModal");
  const closeBtn = modal.querySelector(".close");

  // Target only guest-blocked elements
  const protectedElements = document.querySelectorAll("a.requires-login, button.requires-login");

  protectedElements.forEach(el => {
    el.addEventListener("click", function (e) {
      e.preventDefault();
      modal.style.display = "block";
    });
  });

  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (e) {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
</script>
<?php endif; ?>

<header>
  <div class="navbar">
    <div class="logo">
      <a href="code/php/HILEETUMBLER.php"><img src="imgs/hilee.png" alt="HILEE Logo"></a>
    </div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="<?= $isGuest ? '#' : 'ABOUT.php' ?>" class="<?= $isGuest ? 'requires-login' : '' ?>">About</a></li>
      <li><a href="<?= $isGuest ? '#' : 'product.php' ?>" class="<?= $isGuest ? 'requires-login' : '' ?>">Product</a></li>
      <li>
        <a href="<?= $isGuest ? '#' : 'shoppingcart.php' ?>" class="cart-icon <?= $isGuest ? 'requires-login' : '' ?>">
          <i class="ri-shopping-cart-2-line"></i>
          <span class="cart-count">0</span>
        </a>
      </li>
</li>
    </ul>
  </div>
</header>

<div class="fullbg">
  <div class="gradientbg">
    <a href="#" class="toTOP">
      <img src="IMGS/UPBUTTON-removebg-preview.png" alt="Back to Top">
    </a>

    <!-- Image slider -->
    <div class="halfbg-container">
      <div class="halfbg">
        <img class="slide active" src="IMGS/METALLIC1STHALFBG.jpg" alt="Slide 1">
        <img class="slide" src="IMGS/BLUEBOWHALFBG.jpg" alt="Slide 2">
        <img class="slide" src="IMGS/SAKURAHALFBETTER.jpg" alt="Slide 3">
        <img class="slide" src="IMGS/FRUITHALFBG.jpg" alt="Slide 4">
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

    <!-- Products -->
    <div class="text">
      <h2>FEATURED PRODUCTS</h2>
    </div>
    <div class="boxcontainer">
      <div class="box" id="box1">
        <p class="boxtext1">SWEET HARVEST [PEAR]</p>
        <img src="IMGS/pearrr-removebg-preview.png" alt="Pear">
      </div>
      <div class="box" id="box2">
        <p class="boxtext2">SWEET HARVEST [PINEAPPLE]</p>
        <img src="IMGS/pineapple-removebg-preview.png" alt="Pineapple">
      </div>
      <div class="box" id="box3">
        <p class="boxtext3">SWEET HARVEST [GREEN APPLE]</p>
        <img src="IMGS/green_apple-removebg-preview.png" alt="Green Apple">
      </div>
      <div class="box" id="box4">
        <p class="boxtext4">SWEET HARVEST [WAX APPLE]</p>
        <img src="IMGS/wax_apple-removebg-preview.png" alt="Wax Apple">
      </div>
    </div>
    <button class="button1 <?= $isGuest ? 'requires-login' : '' ?>" onclick="location.href='<?= $isGuest ? '#' : 'product.php' ?>'">SHOP FOR MORE</button>

    <!-- Flask features -->
    <div class="flaskcontainer">
      <div class="flask" id="flaskleak">
        <img src="IMGS/hileeflascoldhot.jpg_medium.jpg" alt="Leakproof Flask">
      </div>
      <div class="flask" id="flaskcoldhot">
        <img src="IMGS/hileeflascoldhot.jpg_medium.jpg" alt="Cold/Hot Flask">
      </div>
    </div>

    <!-- Choose us section -->
    <div class="chooseuscontainer">
      <h1 class="chooseustext">Introducing the HILEE Tumbler, designed for your ultimate hydration needs with a stylish touch.</h1>
      <p class="chooseustext1">Material: Crafted from durable stainless steel, ensuring long-lasting use.</p>
      <p class="chooseustext2">Volume: Holds between 1,000-2,000 ml of liquid for ample hydration.</p>
      <p class="chooseustext3">Features: Leak-proof design and heat-resistant properties to keep your drinks secure and safe from burns.</p>
      <p class="chooseustext4">Keeps Drinks Hot/Cold: Effective warming time of 12-24 hours for optimal temperature retention.</p>
      <h1 class="chooseustext5">This stylish tumbler not only looks great but also offers practicality for everyday use!</h1>
      <button class="button2 <?= $isGuest ? 'requires-login' : '' ?>" onclick="location.href='<?= $isGuest ? '#' : 'ABOUT.php' ?>'">LEARN MORE</button>
      <div class="chooseus">
        <img src="IMGS/HILEELEARN.jpg" alt="Learn More">
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer>
  <ul class="social-icon">
    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
    <li><a href="#"><i class="fa-brands fa-shopify"></i></a></li>
    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
  </ul>
  <p>©2025 HILEE | All Rights Reserved</p>
</footer>

<!-- Login Modal -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>You must log in to use this feature.</p>
    <a href="code/PHP/login.php" class="modal-login-btn">Go to Login</a>
  </div>
</div>

<!-- Scripts -->
<script src="code/js/hileehome.js"></script>
<script src="code/js/Product-Cart.js"></script>

<?php if ($isGuest): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById("loginModal");
  const closeBtn = document.querySelector(".modal .close");
  const protectedElements = document.querySelectorAll(".requires-login");

  protectedElements.forEach(el => {
    el.addEventListener("click", function (e) {
      e.preventDefault();
      modal.style.display = "block";
    });
  });

  closeBtn.onclick = () => modal.style.display = "none";
  window.onclick = (e) => { if (e.target == modal) modal.style.display = "none"; };
});
</script>
<?php endif; ?>

</body>
</html>
