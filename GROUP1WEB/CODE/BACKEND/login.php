<?php
include "connectdb.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['signin'])) {
        $email = $_POST['Email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();


        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo "works";
            if ($password == $row['PASSWORD']) {
                $_SESSION['semail'] = $email;
                $_SESSION['sname'] = $row['NAME'];
                header("Location: ../PHP/HILEETUMBLER.php");
                exit();
            } else {
                $_SESSION["icreds"] = true;
                header("Location: ../../index.php");
            }
        } else {
            $_SESSION["icreds"] = true;
            header("Location: ../../index.php");
        }
    }
}
