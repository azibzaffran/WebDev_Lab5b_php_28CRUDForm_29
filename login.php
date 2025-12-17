<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['matric'];
            header("Location: read.php");
        } else {
            $error = "Invalid username or password, try <a href='login.php'>login</a> again.";
        }
    } else {
        $error = "Invalid username or password, try <a href='login.php'>login</a> again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            Matric: <input type="text" name="matric" required>
            Password: <input type="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p><a href="register.php">Register</a> here if you have not.</p>
    </div>
</body>
</html>