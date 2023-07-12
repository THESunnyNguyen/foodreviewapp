<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Add User</h2>
    <form action="add-user.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
<label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="role">Role:</label>
    <select id="role" name="role">
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select><br><br>
    
    <input type="submit" name="submit" value="Add User">
</form>

<?php

$page_roles = array('admin'); // Paste this - modify as necessary 
require_once '../main-pages/checksession.php';// Paste this

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection and query execution
    $servername = 'localhost:8889';         // Hostname
    $dbUsername = 'root'; // Database username
    $dbPassword = 'root'; // Database password
    $dbname = 'freakyFoodies';   // Database name

    // Create a new connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO Users (username, password, email, role_id) VALUES ('$username', '$hashedPassword', '$email', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>User added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>