<?php
include 'connect.php';

$conn = new mysqli("localhost", "root", "", "simple_crud");
$id = $_GET["id"];

if ($conn->query("DELETE FROM users WHERE id=$id")) {
    header("Location: index.php?message=deleted");
} else {
    header("Location: index.php?message=error");
}
?>