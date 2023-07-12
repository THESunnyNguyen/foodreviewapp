<?php
    $page_roles = array('admin', 'user'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant List</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Restaurant List</h2>

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
    
    $query = "SELECT * FROM Restaurants";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Contact Number</th><th>Address</th><th>Premium Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['restaurant_id'] . "</td>";
            echo "<td><a href='restaurant-details.php?id=" . $row['restaurant_id'] . "'>" . $row['restaurant_name'] . "</a></td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . ($row['premium_status'] ? 'Yes' : 'No') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No restaurants found.";
    }
    
    $conn->close();
    ?>
</body>
</html>