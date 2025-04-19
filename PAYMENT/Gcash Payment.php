<!DOCTYPE html>
<html>
<head>
    <title>Hilee Payment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <form action="Gcash Payment_db.php" method="POST">
            <div class="row">
                <div class="column">
                    <a href="Payment Method.php"> <input type="button" name="BACK" class="bbt" value="BACK"></a>
                    <br>
                    <br>
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Firstname:</span>
                        <input type="text" placeholder="Mark Jazper" name="Firstname">
                    </div>
                    <div class="input-box">
                        <span>Lastname:</span>
                        <input type="text" placeholder="Velasco" name="Lastname">
                    </div>
                    <div class="input-box">
                        <span>Email :</span>
                        <input type="email" placeholder="@gmail.com" name="Email">
                    </div>
                    <div class="input-box">
                        <span>Address:</span>
                        <input type="text" placeholder="Blk-st." name="Address">
                    </div>

                    <div class="flex">
                        <div class="input-box">
                            <span>City:</span>
                            <input type="text" placeholder="Rizal" name="City">
                        </div>
                        <div class="input-box">
                            <span>ZipCode :</span>
                            <input type="number" placeholder="123 456" name=ZipCode>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <br>
                    <br>
                    <br>
                    <h3 class="title">Payment</h3>
                   
                    <div class="input-box">
                        <span>Accepted :</span>
                        <a href="Gcash Payment.php"><img src="gcash.png"></a>
                        <a href="Paymaya Payment.php"><img src="paymaya.jpg"></a>
                    </div>
                    <div class="input-box">
                        <span>Gcash Name:</span>
                        <input type="text" placeholder="Mar* *****co" name="gname">
                    </div>
                    <div class="input-box">
                        <span>Gcash Number:</span>
                        <input type="number" placeholder="0912*******" name="gnumber">
                    </div>
                  <input type="Submit" name="Submit" class="btn" value="Submit"></a>
                    </form>
                    </div>
                </div>
            </div>
    </div>

</body>
</html>