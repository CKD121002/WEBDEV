<?php
include 'database.php';

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM user WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $address = trim($_POST["address"]);
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $course = trim($_POST["course"]);

    if (!empty($name) && !empty($address) && !empty($birthday) && !empty($gender) && !empty($course)) {
        $stmt = $conn->prepare("UPDATE user SET name=?, address=?, birthday=?, gender=?, course=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $address, $birthday, $gender, $course, $id);
        $stmt->execute();
        header("Location: read.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="form-container">
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($student['name']) ?>">
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address"><?= htmlspecialchars($student['address']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" id="birthday" value="<?= $student['birthday'] ?>">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender">
                    <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" value="<?= htmlspecialchars($student['course']) ?>">
            </div>

            <div class="form-group">
                <input type="submit" value="Update Student">
            </div>
        </form>
    </div>
</body>
</html>

