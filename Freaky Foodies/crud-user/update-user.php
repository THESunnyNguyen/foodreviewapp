<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Update User</h2>
    <form action="update-user.php" method="POST">
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required><br><br>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="role_id">Role ID:</label>
    <input type="number" id="role_id" name="role_id" required><br><br>
    
    <input type="submit" name="submit" value="Update User">
</form>

<?php

$page_roles = array('admin'); // Paste this - modify as necessary 
require_once '../main-pages/checksession.php';// Paste this

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the form data
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

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
    $sql = "UPDATE Users SET username='$username', password='$password', email='$email', role_id='$role_id' WHERE user_id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>User information updated successfully!</p>";
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
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>User ID:</strong> " . $row["user_id"] . "</p>";
        echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
        echo "<p><strong>Password:</strong> " . $row["password"] . "</p>";
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