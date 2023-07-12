<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Restaurant</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Update Restaurant</h2>
    <form action="update-restaurant.php" method="POST">
        <label for="restaurant_id">Restaurant ID:</label>
        <input type="number" id="restaurant_id" name="restaurant_id" required><br><br>
        
        <label for="name">Restaurant Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        
        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required><br><br>
        
        <label for="premium_status">Premium Status:</label>
        <select id="premium_status" name="premium_status">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select><br><br>
        
        <input type="submit" name="submit" value="Update Restaurant">
    </form>

    <?php
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve the form data
        $restaurant_id = $_POST['restaurant_id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $premium_status = $_POST['premium_status'];

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
        $sql = "UPDATE Restaurants SET restaurant_name='$name', address='$address', contact_number='$contact_number', premium_status='$premium_status' WHERE restaurant_id='$restaurant_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Restaurant information updated successfully!</p>";
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
    $sql = "SELECT * FROM Restaurants";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $row["restaurant_id"] . "</p>";
            echo "<p><strong>Name:</strong> " . $row["restaurant_name"] . "</p>";
            echo "<p><strong>Contact Number:</strong> " . $row["contact_number"] . "</p>";
            echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
            echo "<p><strong>Rating:</strong> " . $row["rating"] . "</p>";
            echo "<p><strong>Premium Status:</strong> " . ($row["premium_status"] ? "Yes" : "No") . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No restaurants found.";
    }

    // Close the database connection
    $conn->close();
    ?>
    
</body>
</html>
