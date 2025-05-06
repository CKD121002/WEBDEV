<?php
include 'db_conn.php';

$conn = new mysqli("localhost", "root", "", "simple_crud");
$id = $_GET["id"];

if ($conn->query("DELETE FROM users WHERE id=$id")) {
    header("Location: read.php?message=deleted");
} else {
    header("Location: read.php?message=error");
}
?>
