<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Follower</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   

    <h2>Add Follower</h2>
    <label for="restaurant">Restaurant:</label>
    <form action="add-follower.php" method="POST">
        <select id="restaurant" name="restaurant">
            <?php
            // Retrieve the restaurants from the database
            $servername = 'localhost:8889';         // Hostname
            $dbUsername = 'root'; // Database username
            $dbPassword = 'root'; // Database password
            $dbname = 'freakyFoodies';   // Database name

            // Create a new connection
            $conn_restaurant = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

            // Check the connection
            if ($conn_restaurant->connect_error) {
                die("Connection failed: " . $conn_restaurant->connect_error);
            }

            // Prepare and execute the SQL query
            $sql_restaurant = "SELECT * FROM Restaurants";
            $result_restaurant = $conn_restaurant->query($sql_restaurant);

            // Loop through the restaurants and generate options
            if ($result_restaurant->num_rows > 0) {
                while($row_restaurant = $result_restaurant->fetch_assoc()) {
                    echo "<option value='".$row_restaurant["restaurant_id"]."'>".$row_restaurant["restaurant_name"]."</option>";
                }
            }

            // Close the database connection
            $conn_restaurant->close();
            ?>
        </select><br><br>

        <label for="user">User:</label>
        <select id="user" name="user">
            <?php
            // Retrieve the users from the database
            $conn_user = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

            if ($conn_user->connect_error) {
                die("Connection failed: " . $conn_user->connect_error);
            }

            $sql_user = "SELECT * FROM Users"; // SQL query to retrieve users
            $result_user = $conn_user->query($sql_user);

            if ($result_user->num_rows > 0) {
                while($row_user = $result_user->fetch_assoc()) {
                    echo "<option value='".$row_user["user_id"]."'>".$row_user["username"]."</option>";
                }
            }

            $conn_user->close();
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Add Follower">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $user = $_POST['user'];
        $restaurant = $_POST['restaurant'];

        // Database connection and query execution
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_follower = "INSERT INTO Followership (user_id, restaurant_id) VALUES ('$user', '$restaurant')";

        if ($conn->query($sql_follower) === TRUE) {
            echo "<p>Follower added successfully!</p>";
        } else {
            echo "Error: " . $sql_follower . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>