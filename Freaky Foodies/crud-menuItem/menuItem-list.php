<?php
    $page_roles = array('admin', 'user'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu Item List</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Menu Item List</h2>

    <?php
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
    $sql = "SELECT * FROM MenuItems";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Menu Item ID:</strong> " . $row["menu_item_id"] . "</p>";
            echo "<p><strong>Restaurant ID:</strong> " . $row["restaurant_id"] . "</p>";
            echo "<p><strong>Menu Item Name:</strong> " . $row["menu_item_name"] . "</p>";
            echo "<p><strong>Price:</strong> $" . $row["price"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No menu items found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>