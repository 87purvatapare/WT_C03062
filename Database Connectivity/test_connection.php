<?php
// Database connection parameters
$servername = "localhost:3307"; // Changed port to 3307
$username = "root";
$password = "";
$dbname = "test"; // We'll create this database

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to MySQL server<br>";

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS test";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>