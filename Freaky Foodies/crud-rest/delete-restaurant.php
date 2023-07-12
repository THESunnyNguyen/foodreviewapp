<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Restaurant</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h1>Delete Restaurant</h1>
    <form method="post" action="">
        <label for="restaurant_id">Restaurant ID:</label>
        <input type="number" name="restaurant_id" id="restaurant_id" required>
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
        $restaurant_id = $_POST['restaurant_id'];

        // Delete the restaurant from the database
        $sql = "DELETE FROM Restaurants WHERE restaurant_id = $restaurant_id";
        if ($conn->query($sql) === TRUE) {
            echo "Restaurant with ID $restaurant_id has been deleted.";
        } else {
            echo "Error deleting restaurant: " . $conn->error;
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
