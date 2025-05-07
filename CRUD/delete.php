<?php
include 'database.php';

$conn = new mysqli("localhost", "root", "", "form");
$id = $_GET["id"];

if ($conn->query("DELETE FROM student WHERE id=$id")) {
    header("Location: read.php?message=deleted");
} else {
    header("Location: read.php?message=error");
}
?>