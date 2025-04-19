<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $ZipCode = $_POST['ZipCode'];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'payment_db';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO cashd (Firstname, Lastname, Email, Address, City, ZipCode) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssi", $Firstname, $Lastname, $Email, $Address, $City, $ZipCode);

    if ($stmt->execute()) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>HiLEE</title>
            <style>
                body {
                    background-image: linear-gradient(#fff);
                    margin: 0;
                }
                h1, p {
                    text-align: center;
                }
                h1 {
                    font-size: 60px;
                }
                .mj {
                    background-color: black;
                    color: white;
                    height: 100px;
                    margin: 0;
                    overflow: hidden;
                    font-size: 30px;
                }
                img {
                    padding-top: 30px;
                    height: 120px;
                }
                .ay {
                    width: 190px;
                    height: 35px;
                    margin-left: 545px;
                    background-color: black;
                    color: white;
                    border: none;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <div class="mj">
                <h1><b>HiLєє</b></h1>
            </div>

            <center>
                <img src="AY.png" height="150px" width="150px">
            </center>

            <br><br><br>

            <h1 style="color:black">"THANK YOU"</h1>
            <br>
            <p><b style="color:black;">"PAYMENT HAS BEEN SUCCESSFULLY PROCESSED"</b></p>

            <a href="Payment Method.php">
                <input type="button" name="BACK" class="ay" value="BACK TO HOME">
            </a>
        </body>
        </html>
        <?php
    } else {
        echo "Execute failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
