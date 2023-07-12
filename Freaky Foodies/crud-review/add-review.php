<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Add Review</h2>
    <form action="add-review.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="menu_item_id">Menu Item ID:</label>
        <input type="number" id="menu_item_id" name="menu_item_id" required><br><br>
        
        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" required></textarea><br><br>
        
        <label for="item_rating">Item Rating:</label>
        <input type="number" id="item_rating" name="item_rating" step="0.1" min="0" max="10" required><br><br>
        
        <input type="submit" name="submit" value="Add Review">
    </form>

    <?php

$page_roles = array('admin', 'user'); // Paste this - modify as necessary 
require_once '../main-pages/checksession.php';// Paste this
    
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $username = $_POST['username'];
    $menu_item_id = $_POST['menu_item_id'];
    $review_text = $_POST['review_text'];
    $item_rating = $_POST['item_rating'];

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

    // Get the user ID based on the provided username
    $userQuery = "SELECT user_id FROM Users WHERE username = '$username'";
    $userResult = $conn->query($userQuery);

    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $user_id = $userRow["user_id"];

        // Get the current date
        $review_date = date("Y-m-d");

        // Prepare and execute the SQL query
        $sql = "INSERT INTO Reviews (user_id, menu_item_id, review_text, item_rating, review_date) 
                VALUES ('$user_id', '$menu_item_id', '$review_text', '$item_rating', '$review_date')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Review added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No user found with the provided username.";
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>
