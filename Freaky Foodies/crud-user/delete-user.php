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
<h1>Delete User</h1>
<form method="post" action="">
    <label for="user_id">User ID:</label>
    <input type="number" name="user_id" id="user_id" required>
    <input type="submit" name="submit" value="Delete">
</form>

    <?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this

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
        $user_id = $_POST['user_id'];
    
        // Delete the user from the database
        $sql = "DELETE FROM Users WHERE user_id = $user_id";
        if ($conn->query($sql) === TRUE) {
            echo "User with ID $user_id has been deleted.";
        } else {
            echo "Error deleting user: " . $conn->error;
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
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>ID:</strong> " . $row["user_id"] . "</p>";
        echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Role ID:</strong> " . $row["role_id"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No users found.";
}

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
