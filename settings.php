<?php
// Database connection details
$host = "localhost"; // Hostname (usually localhost)
$username = "root"; // MySQL username
$password = ""; // MySQL password (empty by default in XAMPP)
$database = "project2"; // Name of the database

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>