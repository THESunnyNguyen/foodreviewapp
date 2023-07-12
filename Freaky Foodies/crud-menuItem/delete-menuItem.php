<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete MenuItem</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h1>Delete MenuItem</h1>
    <form method="post" action="">
        <label for="menu_item_id">Menu Item ID:</label>
        <input type="number" name="menu_item_id" id="menu_item_id" required>
        <input type="submit" name="submit" value="Delete">
    </form>

    <?php
    // Database connection settings
    $servername = 'localhost:8889';         // Hostname
    $username = 'root'; // Database username
    $password = 'root'; // Database password
    $dbname = 'freakyFoodies';   // Database name

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $menuItemId = $_POST['menu_item_id'];

        // Delete the menu item from the database
        $sql = "DELETE FROM MenuItems WHERE menu_item_id = $menuItemId";
        if ($conn->query($sql) === TRUE) {
            echo "Menu Item with ID $menuItemId has been deleted.";
        } else {
            echo "Error deleting menu item: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>

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
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["menu_item_id"] . "</p>";
            echo "<p><strong>Restaurant ID:</strong> " . $row["restaurant_id"] . "</p>";
            echo "<p><strong>Menu Item Name:</strong> " . $row["menu_item_name"] . "</p>";
            echo "<p><strong>Price:</strong> " . $row["price"] . "</p>";
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