<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'db.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";
    if ($conn->query($sql) === TRUE) { header("Location: read.php"); }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form method="POST">
            Matric: <input type="text" name="matric" value="<?= $row['matric'] ?>" readonly>
            Name: <input type="text" name="name" value="<?= $row['name'] ?>" required>
            Access Level: 
            <select name="role">
                <option value="lecturer" <?= $row['role'] == 'lecturer' ? 'selected' : '' ?>>Lecturer</option>
                <option value="student" <?= $row['role'] == 'student' ? 'selected' : '' ?>>Student</option>
            </select>
            <input type="submit" value="Update">
            <a href="read.php">Cancel</a>
        </form>
    </div>
</body>
</html>