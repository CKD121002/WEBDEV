<?php include "db_conn.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="read.css">
  <title>Home</title>
  

</head>

<body>
  <nav>User Info</nav>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];  
      echo '<div class="alert" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" onclick="this.parentElement.style.display=\'none\'">x</button>
      </div>';
    }
    ?>
    <a href="add-new.php" class="btn">Add New</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Birthday</th>
          <th>Gender</th>
          <th>Course</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["Name"] ?></td>
            <td><?php echo $row["Address"] ?></td>
            <td><?php echo $row["Birthday"] ?></td>
            <td><?php echo $row["Gender"] ?></td>
            <td><?php echo $row["Course"] ?></td>
            <td class="action-icons">
              <a href="edit.php?id=<?php echo $row["id"] ?>">Edit</a>
              <a href="delete.php?id=<?php echo $row["id"] ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
