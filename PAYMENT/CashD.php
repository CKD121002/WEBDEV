<!DOCTYPE html>
<html>

<head>
    <title>Hilee Payment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <form action="CashD_db.php" method="POST">
            <div class="row">
                <div class="column">
                <a href="Payment Method.php"> <input type="button" name="BACK" class="bbt" value="BACK"></a>
                     <br>
                     <br>
       
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span for="Firstname">Firstname:</span>
                        <input type="text" placeholder="Mark Jazper" name="Firstname">
                    </div>
                    <div class="input-box">
                        <span for="Lastname">Lastname:</span>
                        <input type="text" placeholder="Velasco" name="Lastname">
                    </div>
                    <div class="input-box">
                        <span for="Email">Email :</span>
                        <input type="email" placeholder="@gmail.com" name="Email">
                    </div>
                    <div class="input-box">
                        <span for="Address">Address:</span>
                        <input type="text" placeholder="Blk - st." name="Address">
                    </div>

                    <div class="flex">
                        <div class="input-box">
                            <span for="City">City :</span>
                            <input type="text" placeholder="Rizal" name="City">
                        </div>
                        <div class="input-box">
                            <span for="ZipCode">Zip Code :</span>
                            <input type="number" placeholder="123 456" name="ZipCode">
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
                        <img src="cod.png"></a>
        
                    </div>
                    
                    <input type="Submit" name="Submit" class="btn" value="Submit"></a>
                      </form>
                
                    </div>
                </div>
            </div>
    </div>


</body>

</html>