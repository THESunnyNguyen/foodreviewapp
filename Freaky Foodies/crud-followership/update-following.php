<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Super Follow</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Change Super Follow</h2>
    <form action="change-following.php" method="POST">
        <label for="user">User:</label>
        <select id="user" name="user">
            <?php
            // Retrieve the users from the database
            $servername = 'localhost:8889';         // Hostname
            $username = 'root'; // Database username
            $password = 'root'; // Database password
            $dbname = 'freakyFoodies';   // Database name

            // Create a new connection
            $conn_user = new mysqli($servername, $username, $password, $dbname);

            if ($conn_user->connect_error) {
                die("Connection failed: " . $conn_user->connect_error);
            }

            // Prepare and execute the SQL query to retrieve the users
            $sql_user = "SELECT * FROM Users";
            $result_user = $conn_user->query($sql_user);

            // Display the dropdown list of users
            if ($result_user->num_rows > 0) {
                while($row_user = $result_user->fetch_assoc()) {
                    echo "<option value='".$row_user["user_id"]."'>".$row_user["username"]."</option>";
                }
            } else {
                echo "No users found.";
            }

            // Close the database connection
            $conn_user->close();
            ?>
        </select><br><br>

        <label for="new_following">Change Super Follow to:</label>
        <select id="new_following" name="new_following">
            <?php
            // Retrieve the restaurants from the database
            $conn_restaurant = new mysqli($servername, $username, $password, $dbname);

            if ($conn_restaurant->connect_error) {
                die("Connection failed: " . $conn_restaurant->connect_error);
            }

            // Prepare and execute the SQL query to retrieve the restaurants
            $sql_restaurant = "SELECT * FROM Restaurants";
            $result_restaurant = $conn_restaurant->query($sql_restaurant);

            // Display the dropdown list of restaurants
            if ($result_restaurant->num_rows > 0) {
                while($row_restaurant = $result_restaurant->fetch_assoc()) {
                    echo "<option value='".$row_restaurant["restaurant_id"]."'>".$row_restaurant["restaurant_name"]."</option>";
                }
            } else {
                echo "No restaurants found.";
            }

            // Close the database connection
            $conn_restaurant->close();
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Update Following">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $user = $_POST['user'];
        $newFollowing = $_POST['new_following'];

        // Database connection and query execution
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_update_following = "UPDATE Followership SET restaurant_id = '$newFollowing' WHERE user_id = '$user'";

        if ($conn->query($sql_update_following) === TRUE) {
            echo "<p>Following updated successfully!</p>";
        } else {
            echo "Error: " . $sql_update_following . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>