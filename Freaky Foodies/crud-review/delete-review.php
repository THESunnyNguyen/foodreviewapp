<!DOCTYPE html>
<html>
<head>
    <title>Delete Review</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h1>Delete Review</h1>
    <form method="post" action="">
        <label for="review_id">Review ID:</label>
        <input type="number" name="review_id" id="review_id" required>
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
        $review_id = $_POST['review_id'];

        // Delete the review from the database
        $sql = "DELETE FROM Reviews WHERE review_id = $review_id";
        if ($conn->query($sql) === TRUE) {
            echo "Review with ID $review_id has been deleted.";
        } else {
            echo "Error deleting review: " . $conn->error;
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
    $sql = "SELECT r.review_id, r.user_id, r.menu_item_id, r.review_text, r.item_rating, u.username
            FROM Reviews r
            INNER JOIN Users u ON r.user_id = u.user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>Review ID:</strong> " . $row["review_id"] . "</p>";
            echo "<p><strong>User ID:</strong> " . $row["user_id"] . "</p>";
            echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
            echo "<p><strong>Menu Item ID:</strong> " . $row["menu_item_id"] . "</p>";
            echo "<p><strong>Review Text:</strong> " . $row["review_text"] . "</p>";
            echo "<p><strong>Item Rating:</strong> " . $row["item_rating"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No reviews found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
