<?php 
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";
   if ($conn->query($sql) === TRUE) {
        // This message will now appear in the HTML below
        $message = "Registration successful";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Register User</h2>
        <?php if (isset($message)) { echo "<p class='message'>" . htmlspecialchars($message) . "</p>"; } ?>
        <form method="POST">
            Matric: <input type="text" name="matric" required>
            Name: <input type="text" name="name" required>
            Password: <input type="password" name="password" required>
            Role: 
            <select name="role" required>
                <option value="">Please select</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>