<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lab_5b";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli("localhost", "root", "", "Lab_5b");

// Check connection [cite: 3]
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>