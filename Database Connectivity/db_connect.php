<?php
// Database connection parameters
$servername = "127.0.0.1"; // Using IP instead of localhost
$port = 3307; // This matches your my.ini configuration
$username = "root";
$password = "";
$dbname = "test"; // We'll create this database if it doesn't exist

// Create connection
try {
    // Create connection with explicit port
    $conn = new mysqli($servername, $username, $password, "", $port);

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

    // Select the database
    $conn->select_db($dbname);

    // Create a sample table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'users' created successfully or already exists<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // Close connection
    $conn->close();
    echo "Connection closed";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>