<?php
include 'connect.php';

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'deleted') {
        echo "<p style='color: green;'>User deleted successfully.</p>";
    } elseif ($_GET['message'] == 'error') {
        echo "<p style='color: red;'>Error deleting user.</p>";
    }
}

$result = $conn->query("SELECT * FROM users");
?>

<h2>User List</h2>
<a href="add.php">Add New User</a>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= htmlspecialchars($row['id']) ?></td>
  <td><?= htmlspecialchars($row['name']) ?></td>
  <td><?= htmlspecialchars($row['email']) ?></td>
  <td>
    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
  </td>
</tr>
<?php endwhile; ?>
</table>
