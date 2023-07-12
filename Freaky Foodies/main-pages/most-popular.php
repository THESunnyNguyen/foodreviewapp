<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Rankings</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Restaurant Rankings</h2>

    <?php

$page_roles = array('admin'); // Paste this - modify as necessary 
require_once '../main-pages/checksession.php';// Paste this

    // Database connection and query execution
    $servername = 'localhost:8889';         // Hostname
    $username = 'root'; // Database username
    $password = 'root'; // Database password
    $dbname = 'freakyFoodies';   // Database name

    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "SELECT r.restaurant_name, COUNT(f.follower_id) AS follower_count
            FROM Restaurants r
            LEFT JOIN Followership f ON r.restaurant_id = f.restaurant_id
            GROUP BY r.restaurant_id
            ORDER BY follower_count DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $restaurantName = $row["restaurant_name"];
            $followerCount = $row["follower_count"];
            
            echo "<p><strong>Restaurant:</strong> " . $restaurantName . "</p>";
            echo "<p><strong>Follower Count:</strong> " . $followerCount . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No restaurants found with followers.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
