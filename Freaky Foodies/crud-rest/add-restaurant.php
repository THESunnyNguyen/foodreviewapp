<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurant</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Add Restaurant</h2>
    <form action="add-restaurant.php" method="POST">
        <label for="name">Restaurant Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="rating">Rating:</label>
        <input type="text" id="rating" name="rating" required><br><br>
        
        <label for="premium_status">Premium Status:</label>
        <select id="premium_status" name="premium_status">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select><br><br>
        
        <input type="submit" name="submit" value="Add Restaurant">
    </form>

    <?php
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve the form data
        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        $rating = $_POST['rating'];
        $premiumStatus = $_POST['premium_status'];
        
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
        $sql = "INSERT INTO Restaurants (restaurant_name, contact_number, address, rating, premium_status) VALUES ('$name', '$contactNumber', '$address', '$rating', '$premiumStatus')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Restaurant added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>