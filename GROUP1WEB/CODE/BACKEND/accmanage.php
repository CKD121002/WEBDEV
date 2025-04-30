<?php
session_start();
include "connectdb.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['pnum'];
        $address = $_POST['address'];

        $query = "UPDATE users SET ";
        $params = [];
        $setClauses = [];

        if (!empty($name)) {
            $setClauses[] = "name = ?";
            $params[] = $name;
            $_SESSION['sname'] = $name;
            echo "name";
        }
        if (!empty($email)) {
            $setClauses[] = "email = ?";
            $params[] = $email;
            $_SESSION['semail'] = $email;
            echo "email";
        }
        if (!empty($phone)) {
            $setClauses[] = "pnum = ?";
            $params[] = $phone;
            echo "phone";
        }
        if (!empty($address)) {
            $setClauses[] = "address = ?";
            $params[] = $address;
            echo "add";
        }

        if (empty($setClauses)) {
            echo "No fields to update.";
            return;
        }

        $query .= implode(", ", $setClauses);
        $query .= " WHERE email = ?";
        $params[] = $_SESSION['semail'];


        $stmt = $conn->prepare($query);

        if ($stmt->execute($params)) {
            $_SESSION['UP'] = true;
            echo 'works';
           
            $_SESSION['semail'] = $email;
            $_SESSION['mess'] = "Successfully Updated!";
            header("Location: ../PHP/ACCOUNT.php");
            exit();
        } else {
            $_SESSION['mess'] = 'error';
        }


    }

    if (isset($_POST['reset'])) {
        $email = $_SESSION['semail'];
        $oldPasswordInput = $_POST['OPass'];
        $newPassword = $_POST['NPass'];
        $confirmPassword = $_POST['CPass'];

        $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbpass = $row['password'];

            if ($oldPasswordInput == $dbpass) {
                if ($newPassword === $confirmPassword) {
                    $updateStmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
                    $updateStmt->execute([$newPassword, $email]);

                    $_SESSION['mess'] = "Password updated successfully.";
                    header("Location: ../PHP/RPASS.php");
                    exit();
                } else {
                    $_SESSION['mess'] = "New password and confirm password do not match.";
                    header("Location: ../PHP/RPASS.php");
                    exit();
                }
            } else {
                $_SESSION['mess'] = "Old password is incorrect.";
                header("Location: ../PHP/RPASS.php");
                exit();
            }
        } else {
            $_SESSION['mess'] = "User  not found.";
            header("Location: ../PHP/RPASS.php");
            exit();
        }
    }
}

?>