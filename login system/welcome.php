<?php
include 'db.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT name FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "<div class='success-message'>Welcome back, " . $user['name'] . "!</div>";
        echo "<div class='success-message'> WELCOME " . $user['name'] . "!</div>"; // Added welcome message
    } else {
        echo "<p style='color: red;'>Error: User not found.</p>";
    }
}
?>
