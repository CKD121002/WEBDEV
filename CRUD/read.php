<?php include "database.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>User Info</title>
  <link rel="stylesheet" href="read.css">
</head>
<body>
  <nav>User Info</nav>
  <div class="container">
  <?php
if (isset($_SESSION["msg"])): ?>
  <div class="alert" role="alert">
    <?= htmlspecialchars($_SESSION["msg"]) ?>
    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">x</button>
  </div>
  <?php unset($_SESSION["msg"]); ?>
<?php endif; ?>

    <a href="create.php" class="btn">Add New</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Course</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Fetch all records from the student table
        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0):
          while ($row = mysqli_fetch_assoc($result)):
        ?>
            <tr>
              <td><?= $row["ID"] ?></td>
              <td><?= htmlspecialchars($row["name"]) ?></td>
              <td><?= htmlspecialchars($row["address"]) ?></td>
              <td><?= htmlspecialchars($row["gender"]) ?></td>
              <td><?= htmlspecialchars($row["course"]) ?></td>
              <td class="action-icons">
              <a href="UPDATE.php?ID=<?= $row["ID"] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row["ID"] ?>" onclick="return confirm('Are you sure?')">Delete</a>
              </td>
            </tr>
        <?php
          endwhile;
        else:
        ?>
          <tr><td colspan="6">No student records found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
