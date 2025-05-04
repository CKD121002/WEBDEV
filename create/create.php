
<!DOCTYPE html>
 <html>
<head>
    <title> USER INFO </title>
    <link rel="stylesheet" href="create.css">
    </head>
    <body>
<?php
$id = $name = $address = $birthday = $gender = "";
$courses = [];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $errors['id'] = "ID is required";
    } else {
        $id = htmlspecialchars($_POST["id"]);
        if (!preg_match("/^[0-9]+$/", $id)) {
            $errors['id'] = "Only numbers are allowed";
        }
    }

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

    if (empty($errors)) {
        echo "<h3>Form submitted successfully!</h3>";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    ID: <input type="text" name="id" value="<?php echo $id; ?>">
    <span style="color:red"><?php echo $errors['id'] ?? ''; ?></span><br><br>

    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red"><?php echo $errors['name'] ?? ''; ?></span><br><br>

    Address: <textarea name="address"><?php echo $address; ?></textarea>
    <span style="color:red"><?php echo $errors['address'] ?? ''; ?></span><br><br>

    Birthday: <input type="date" name="birthday" value="<?php echo $birthday; ?>">
    <span style="color:red"><?php echo $errors['birthday'] ?? ''; ?></span><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>Female
    <span style="color:red"><?php echo $errors['gender'] ?? ''; ?></span><br><br>

    Courses:
    <input type="checkbox" name="courses[]" value="BSIS" <?php if (in_array("BSIS", $courses)) echo "checked"; ?>>BSIS
    <input type="checkbox" name="courses[]" value="BSE" <?php if (in_array("BSIS", $courses)) echo "checked"; ?>>BSE
    <input type="checkbox" name="courses[]" value="BTVTED" <?php if (in_array("BTVTED", $courses)) echo "checked"; ?>>BTVTED
    <span style="color:red"><?php echo $errors['courses'] ?? ''; ?></span><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>