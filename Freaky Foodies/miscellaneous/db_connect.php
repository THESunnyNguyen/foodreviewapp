<?php
// Database configuration
$host = 'localhost:8889';         // Hostname
$dbname = 'freakyFoodies';   // Database name
$username = 'root'; // Database username
$password = 'root'; // Database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set PDO fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Display an error message if the connection fails
    echo "Database connection failed: " . $e->getMessage();
    exit();
}