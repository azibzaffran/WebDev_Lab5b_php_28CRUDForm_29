<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'db.php';

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2>User List</h2>
        <table>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['matric'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                    <a href="update.php?matric=<?= $row['matric'] ?>">Update</a> | 
                    <a href="delete.php?matric=<?= $row['matric'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>