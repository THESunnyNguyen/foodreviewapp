<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Update MenuItem</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Update MenuItem</h2>
    <form action="update-menuItem.php" method="POST">
        <label for="menu_item_id">Menu Item ID:</label>
        <input type="number" id="menu_item_id" name="menu_item_id" required><br><br>
        <label for="restaurant_id">Restaurant ID:</label>
        <input type="number" id="restaurant_id" name="restaurant_id" required><br><br>
        <label for="menu_item_name">Menu Item Name:</label>
        <input type="text" id="menu_item_name" name="menu_item_name" required><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>
        <input type="submit" name="submit" value="Update MenuItem">
    </form>

    <?php
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve the form data
        $menuItemId = $_POST['menu_item_id'];
        $restaurantId = $_POST['restaurant_id'];
        $menuItemName = $_POST['menu_item_name'];
        $price = $_POST['price'];

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
        $sql = "UPDATE MenuItems SET restaurant_id='$restaurantId', menu_item_name='$menuItemName', price='$price' WHERE menu_item_id='$menuItemId'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Menu Item information updated successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
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
            echo "<p><strong>Menu Item ID:</strong> " . $row["menu_item_id"] . "</p>";
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
