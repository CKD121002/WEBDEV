<?php
include("../backend/connectdb.php");
session_start();


$name = $_SESSION['sname'];
$email = $_SESSION['semail'];




if (!isset($_SESSION['semail'])) {
    echo "User not logged in.";
    exit;
}

$email = $_SESSION['semail'];

// Get user ID from email
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}

$user_id = $user['id'];

// Fetch user orders from usersdata
$query = $conn->prepare("SELECT product, size, quantity, tprice, date FROM usersdata WHERE id = ? ORDER BY date DESC");
$query->bind_param("i", $user_id);
$query->execute();
$orders = $query->get_result();
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
                    <a href="ACCOUNT.php" class="menu-link" style="background-color: white; color: #768499;"><i
                            class="fa-solid fa-circle-user menu-icon"></i>Account</a>
                    <a href="RPASS.php" class="menu-link" style="background-color: white; color: #768499;"><i
                            class="fa-solid fa-shield menu-icon"></i>Security &
                        Access</a>
                    <a href="Order_History.php" class="menu-link" style="background-color: #536DFE; color: white;"><i
                            class="fa fa-history" style="margin-right: 10px;"></i>Order History</a>
                    <a href="logout.php" class="menu-link"><i
                            class="fa-solid fa-right-from-bracket menu-icon"></i>Logout</a>
                </div>
            </div>

            <form class="account" action="../backend/accmanage.php" method="POST">
                <div class="account-header">
                    <h1 class="account-title">Account Order History</h1>
                </div><br>
                <div style="height: 300px; width: 95%; margin-bottom: 30px; border: 1px solid #ccc; overflow: hidden;">
                    <table style="width: 100%; border-collapse: collapse;" cellpadding="10" cellspacing="0">
                        <thead style="background-color: #f2f2f2;">
                            <tr>
                                <th style="width: 30%;">Product</th>
                                <th style="width: 15%;">Size</th>
                                <th style="width: 15%;">QTY</th>
                                <th style="width: 20%;">Total Price</th>
                                <th style="width: 20%;">Date</th>
                            </tr>
                        </thead>
                    </table>

                    <div style="max-height: 300px; overflow-y: auto;">
                        <table style="height: 200px; width: 100%; border-collapse: collapse;" cellpadding="10" cellspacing="0">
                            <tbody style="text-align: center;">
                                <?php if ($orders->num_rows > 0): ?>
                                    <?php while ($row = $orders->fetch_assoc()): ?>
                                        <tr>
                                            <td style="width: 30%;"><?php echo htmlspecialchars($row['product']); ?></td>
                                            <td style="width: 15%;"><?php echo htmlspecialchars($row['size']); ?></td>
                                            <td style="width: 15%;"><?php echo htmlspecialchars($row['quantity']); ?></td>
                                            <td style="width: 20%;">₱<?php echo number_format($row['tprice'], 2); ?></td>
                                            <td style="width: 20%;"><?php echo htmlspecialchars($row['date']); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5">No orders found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </form>
        </div>
    </main>
</body>

</html>