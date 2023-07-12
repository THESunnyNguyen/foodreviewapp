<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>User List</h2>

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
    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["user_id"] . "</p>";
            echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No users found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
