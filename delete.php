<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }
include 'db.php';

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "DELETE FROM users WHERE matric='$matric'";
    $conn->query($sql);
}
header("Location: read.php");
?>