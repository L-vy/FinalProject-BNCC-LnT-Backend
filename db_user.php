<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "login_system"; // Change this if your DB name is different

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>