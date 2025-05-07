<?php
include 'database.php';

$errors = [];
$name = $address = $birthday = $gender = $course = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $address = trim($_POST["address"]);
    $birthday = $_POST["birthday"];
    $gender = $_POST["gender"];
    $course = trim($_POST["course"]);

    if (empty($name)) $errors['name'] = "Name is required";
    if (empty($address)) $errors['address'] = "Address is required";
    if (empty($birthday)) $errors['birthday'] = "Birthday is required";
    if (empty($gender)) $errors['gender'] = "Gender is required";
    if (empty($course)) $errors['course'] = "Course is required";

    if (count($errors) === 0) {
        $stmt = $conn->prepare("INSERT INTO user (name, address, birthday, gender, course) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $address, $birthday, $gender, $course);
        $stmt->execute();
        $stmt->close();
        header("Location: read.php?msg=Student added successfully");
        exit();
    }
}

// Fetch data
$students = $conn->query("SELECT * FROM user");
?>

<!DOCTYPE html>
<head>
    <title>USER Form</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $errors['name'] ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address"><?php echo $address; ?></textarea>
                <span class="error"><?php echo $errors['address'] ?? ''; ?></span>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday" id="birthday" value="<?php echo $birthday; ?>">
                <span class="error"><?php echo $errors['birthday'] ?? ''; ?></span>
            </div>
            <label>Gender:</label>
            <div class="gender-options">
            <label><input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male</label>
            <label><input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female</label>
            </div>
            <span style="color:red"><?php echo $errors['gender'] ?? ''; ?></span>

            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" name="course" id="course" value="<?= $course ?>">
                <span class="error"><?php echo $errors['course'] ?? ''; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
