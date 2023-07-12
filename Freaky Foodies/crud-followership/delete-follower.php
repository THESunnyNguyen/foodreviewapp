<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Follower</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   

    <h2>Remove Follower</h2>
    <label for="follower">Follower:</label>
    <form action="remove-follower.php" method="POST">
        <?php
        // Retrieve the followers from the database
        $servername = 'localhost:8889';         // Hostname
        $username = 'root'; // Database username
        $password = 'root'; // Database password
        $dbname = 'freakyFoodies';   // Database name

        // Create a new connection
        $conn_follower = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn_follower->connect_error) {
            die("Connection failed: " . $conn_follower->connect_error);
        }

        // Prepare and execute the SQL query to retrieve the followers
        $sql_follower = "
            SELECT f.user_id, u.username
            FROM Followership f
            JOIN Users u ON f.user_id = u.user_id";
        $result_follower = $conn_follower->query($sql_follower);

        // Display the dropdown list of followers
        if ($result_follower->num_rows > 0) {
            echo "<select id='follower' name='follower'>";
            while($row_follower = $result_follower->fetch_assoc()) {
                echo "<option value='".$row_follower["user_id"]."'>".$row_follower["username"]."</option>";
            }
            echo "</select>";
        } else {
            echo "No followers found.";
        }

        // Close the database connection
        $conn_follower->close();
        ?><br><br>

        <input type="submit" name="submit" value="Remove Follower">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $follower = $_POST['follower'];

        // Database connection and query execution
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_remove_follower = "DELETE FROM Followership WHERE user_id = '$follower'";

        if ($conn->query($sql_remove_follower) === TRUE) {
            echo "<p>Follower removed successfully!</p>";
        } else {
            echo "Error: " . $sql_remove_follower . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>