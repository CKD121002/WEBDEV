<?php
include 'database.php';

$conn = new mysqli("localhost", "root", "", "database");
$id = $_GET["id"];

if ($conn->query("DELETE FROM user WHERE id=$id")) {
    header("Location: read.php?message=deleted");
} else {
    header("Location: read.php?message=error");
}
?>