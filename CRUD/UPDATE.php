<?php
session_start();
include "database.php";

$id = $name = $address = $birthday = $gender = "";
$courses = [];
$errors = [];

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST['ID'];

    // Validation
    if (empty($_POST["name"])) {
        $errors['name'] = "Name is required";
    } else {
        $name = htmlspecialchars($_POST["name"]);
        if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
            $errors['name'] = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["address"])) {
        $errors['address'] = "Address is required";
    } else {
        $address = htmlspecialchars($_POST["address"]);
    }

    if (empty($_POST["birthday"])) {
        $errors['birthday'] = "Birthday is required";
    } else {
        $birthday = $_POST["birthday"];
    }

    if (empty($_POST["gender"])) {
        $errors['gender'] = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["courses"])) {
        $errors['courses'] = "At least one course must be selected";
    } else {
        $courses = $_POST["courses"];
    }

    // Update if valid
    if (empty($errors)) {
        $courseStr = implode(", ", $courses);
        $stmt = $conn->prepare("UPDATE student SET NAME=?, ADDRESS=?, GENDER=?, COURSE=?, BIRTHDAY=? WHERE ID=?");
        $stmt->bind_param("sssssi", $name, $address, $gender, $courseStr, $birthday, $id);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "Record updated successfully.";
            header("Location: read.php");
            exit;
        } else {
            $_SESSION['msg'] = "Update failed.";
        }
    }
}

// Handle GET request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ID"])) {
    $id = $_GET["ID"];
    $stmt = $conn->prepare("SELECT * FROM student WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($student) {
        $name = $student["NAME"] ?? '';
        $address = $student["ADDRESS"] ?? '';
        $birthday = $student["BIRTHDAY"] ?? '';
        $gender = $student["GENDER"] ?? '';
        $courses = isset($student["COURSE"]) ? explode(", ", $student["COURSE"]) : [];
    } else {
        echo "Student not found.";
        exit;
    }
    
} elseif (!isset($_POST["update"])) {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit information</title>
    <link rel="stylesheet" href="create.css"> <!-- Use same CSS as create -->
</head>
<body>

<h2>Edit your information</h2>
<form method="post" action="UPDATE.php?id=<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="ID" value="<?= htmlspecialchars($id) ?>">

    Name: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    <span style="color:red"><?= $errors['name'] ?? '' ?></span><br><br>

    Address: <textarea name="address"><?= htmlspecialchars($address) ?></textarea>
    <span style="color:red"><?= $errors['address'] ?? '' ?></span><br><br>

    Birthday: <input type="date" name="birthday" value="<?= htmlspecialchars($birthday) ?>">
    <span style="color:red"><?= $errors['birthday'] ?? '' ?></span><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?= ($gender == "Male") ? "checked" : "" ?>>Male
    <input type="radio" name="gender" value="Female" <?= ($gender == "Female") ? "checked" : "" ?>>Female
    <span style="color:red"><?= $errors['gender'] ?? '' ?></span><br><br>

    Courses:
    <input type="checkbox" name="courses[]" value="BSIS" <?= in_array("BSIS", $courses) ? "checked" : "" ?>>BSIS
    <input type="checkbox" name="courses[]" value="BSE" <?= in_array("BSE", $courses) ? "checked" : "" ?>>BSE
    <input type="checkbox" name="courses[]" value="BTVTED" <?= in_array("BTVTED", $courses) ? "checked" : "" ?>>BTVTED
    <span style="color:red"><?= $errors['courses'] ?? '' ?></span><br><br>

    <input type="submit" name="update" value="Update">
</form>

</body>
</html>
