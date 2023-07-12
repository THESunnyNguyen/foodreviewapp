<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add MenuItem</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
<h2>Add Menu Item</h2>
<form action="add-menuItem.php" method="POST">
    <label for="restaurant_id">Restaurant ID:</label>
    <input type="text" id="restaurant_id" name="restaurant_id" required><br><br>
    
    <label for="menu_item_name">Menu Item Name:</label>
    <input type="text" id="menu_item_name" name="menu_item_name" required><br><br>
    
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required><br><br>
    
    <input type="submit" name="submit" value="Add Menu Item">
</form>

    <?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the form data
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
    $sql = "INSERT INTO MenuItems (restaurant_id, menu_item_name, price) VALUES ('$restaurantId', '$menuItemName', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Menu item added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>
