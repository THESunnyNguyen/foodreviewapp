<?php
    $page_roles = array('admin'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Review</title>
</head>
<body>
<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    <h2>Update Review</h2>
    <form action="update-review.php" method="POST">
        <label for="review_id">Review ID:</label>
        <input type="number" id="review_id" name="review_id" required><br><br>
        
        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required><br><br>
        
        <label for="menu_item_id">Menu Item ID:</label>
        <input type="number" id="menu_item_id" name="menu_item_id" required><br><br>
        
        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" required></textarea><br><br>
        
        <label for="item_rating">Item Rating:</label>
        <input type="number" id="item_rating" name="item_rating" step="0.1" min="0" max="10" required><br><br>
        
        <input type="submit" name="submit" value="Update Review">
    </form>

    <?php
    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve the form data
        $review_id = $_POST['review_id'];
        $user_id = $_POST['user_id'];
        $menu_item_id = $_POST['menu_item_id'];
        $review_text = $_POST['review_text'];
        $item_rating = $_POST['item_rating'];
        
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
        $sql = "UPDATE Reviews SET user_id='$user_id', menu_item_id='$menu_item_id', review_text='$review_text', item_rating='$item_rating' WHERE review_id='$review_id'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Review information updated successfully!</p>";
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
    $sql = "SELECT r.review_id, r.user_id, r.menu_item_id, r.review_text, r.item_rating, u.username
            FROM Reviews r
            INNER JOIN Users u ON r.user_id = u.user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
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