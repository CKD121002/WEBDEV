<?php
include("../backend/connectdb.php");
session_start();

$adr = "";
$stmt = $conn->prepare("SELECT ADDRESS FROM users WHERE email = ?");
$stmt->bind_param("s", $_SESSION['semail']);
$stmt->execute();

$result = $stmt->get_result();
$adr = "";
if ($row = $result->fetch_assoc()) {

    $adr = $row['ADDRESS'];

    
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/check.css">

    <link rel="stylesheet" href="../style/HileeTumblerCart.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style/mjcss.css">

</head>

<body>
    <div class="bgcontainer"></div>
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
                    <a href="../imgss/shoppingcart.php" class="cart-icon">
                        <i class="ri-shopping-cart-2-line"></i>
                        <span class="cart-count">0</span>
                    </a>
                </li>

            </ul>
        </div>
    </header>

    <div class="cart">
        <div class="shopheader">
            <span>Product</span>
            <span>Quantity</span>
            <span>Price</span>
            <span>Total</span>
            <span>Remove</span>
        </div>

        <div class="hl-items">

            <!----- <div class="hl-item">
 <div class="product">
        <img src="Sakura pink.png">
        <div class="item-detail">
            <p>HILEE Flask Sakura Hydration Stainless Steel</p>
            <div class="sizencolorvariety">
                <span class="size">20oz</span>

            </div>
        </div>
    </div>



<div class="quantity"><input type="number" value="1" min="1"></div>
    <span class="price">₱ 341.91</span>
    <span class="total">₱ 341.91</span>
    <button class="remove"><i class="ri-close-circle-fill"></i></button>

  </div>  ---->

        </div>

        <div class="hl-total">
            <h1>Shopping Cart Total</h1>
            <p>Subtotal <span class="subtotal">₱0</span></p>
            <p>Shipping Fee <span>Free</span></p>
            <p>TOTAL <span class="alltotal">₱0</span></p>

            <a href="../php/product.html"><button class="add-prod">Add Product</button></a>
            <button class="check-out" onclick="payment()">Check Out</button>
        </div>

        <div class="order-summary-container" id="order">
            <div class="left-column">
                <h2>Order Summary</h2>

                <div class="form-group">
                    <label for="paymentMethod">Mode of Payment:</label>
                    <select id="paymentMethod" class="form-input" onclick="togglePaymentOptions()" required>
                        <option value="">Select Payment Method</option>
                        <option value="cod">Cash on Delivery</option>
                        <option value="online">Online Payment</option>
                    </select>
                </div>

                <!-- Online Payment Options (GCash and PayMaya) -->
                <div id="onlinePaymentOptions" class="hidden">
                    <div class="form-group">
                        <label for="onlinePaymentMethod">Select Online Payment Method:</label>
                        <select id="onlinePaymentMethod" class="form-input">
                            <option value="">Select Payment Option</option>
                            <option value="gcash">GCash</option>
                            <option value="paymaya">PayMaya</option>
                        </select>
                    </div>
                </div>

                <!-- Subtotal -->
                <div class="form-group">
                    <label class="fortotals">Subtotal:</label>
                    <h5 class="totals" id="sub">₱0</h5> <!-- Static value -->
                </div>

                <!-- Shipping Fee -->
                <div class="form-group">
                    <label class="fortotals">Shipping Fee:</label>
                    <h5 class="totals" id="deduc">₱0</h5> <!-- Static value -->
                </div>

                <!-- Total -->
                <div class="form-group">
                    <label class="fortotals">Total:</label>
                    <h5 class="totals" id="total">₱0</h5> <!-- Static value -->
                </div>

            </div>

            <div class="right-column">
                <!-- Mode of Payment -->


                <!-- Address -->
                <div class="form-group">
                    <label class="adrs">Address:</label><textarea id="additionalInfo" class="form-input"
                        placeholder="Address" rows="3"><?php echo $adr ?></textarea>

                </div>

                <!-- Additional Info -->
                <div class="form-group">
                    <label class="adrs">Additional Info:</label>
                    <textarea id="additionalInfo" class="form-input" placeholder="Any additional information"
                        rows="3"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="form-button" onclick="showCheckmark()">Order Now</button>

                <!-- Cancel Button -->
                <button type="button" class="cancel-button" onclick="cancel()">Cancel</button>
            </div>
        </div>

        <div class="blurback"></div>
        <div id="checkWrap">
            <h3 class="titleo" id="tite">HILEE</h3>

            <div class="checkmark-container">
                <div class="checkmark-circle">
                    <svg class="checkmark" viewBox="0 0 52 52">
                        <path class="checkmark-check" d="M14 27l10 10 20-20" />
                    </svg>
                </div>
            </div>

            <div class="messageo">Thank you for ordering!</div>
        </div>

        <script src="../js/Product-Cart.js">

        </script>
    </div>
    </div>


    <script> // KAY MJ NA PART ITUUU

        function togglePaymentOptions() {
            var paymentMethod = document.getElementById('paymentMethod').value;
            var onlinePaymentOptions = document.getElementById('onlinePaymentOptions');

         
            if (paymentMethod === 'online') {
                onlinePaymentOptions.classList.remove('hidden');
            } else {
                onlinePaymentOptions.classList.add('hidden');
            }
        }

        function payment() {
            document.getElementById('order').style.display = "flex";
            document.getElementById('sub').innerHTML = document.querySelector('.subtotal').textContent;
            document.getElementById('total').innerHTML = document.querySelector('.alltotal').textContent;

        }


        function cancel() {
            document.getElementById('order').style.display = "none";

        }

        function showCheckmark() {
            const wrap = document.getElementById('checkWrap');
            wrap.style.display = 'flex';
            document.getElementById('order').style.display = "none";
            document.querySelector('.blurback').style.display = "block";
           
            wrap.classList.remove('fade-out');

           
            const checkPath = wrap.querySelector('.checkmark-check');
            checkPath.style.animation = 'none';

            void checkPath.offsetWidth; 
            checkPath.style.animation = 'draw 0.5s ease-out 0.3s forwards';

            setTimeout(() => {
                wrap.classList.add('fade-out');

                // Remove from view after fade animation
                setTimeout(() => {
                    wrap.style.display = 'none';
                    document.querySelector('.blurback').style.display = "none";
                }, 500);
            }, 3000);
        }
    </script>


</body>

</html>