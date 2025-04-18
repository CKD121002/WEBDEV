<?php
$host = "localhost";
$dbname = "hdb";
$username = "root"; // default for XAMPP
$password = "";     // default for XAMPP

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
