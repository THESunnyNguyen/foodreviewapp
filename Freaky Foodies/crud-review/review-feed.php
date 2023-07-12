<?php
    $page_roles = array('admin', 'user'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Feed</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        body {
            font-family: 'Montserrat';
            font-size: 22px;
        }

        /* CSS styles */
        h2 {
            background-color: orange;
            color: white;
            padding: 10px;
        }

        .add {
            display: flex;
            justify-content: center;
        }

        .styled-button {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .styled-button:hover {
            background-color: darkorange;
        }

        .restaurant-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }

        .restaurant-link:hover {
            color: darkblue;
        }
    </style>
</head>
<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   
    
<h2>Review Feed</h2>

<div class="add">

    <form action="add-review.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="menu_item_id">Menu Item ID:</label>
        <input type="number" id="menu_item_id" name="menu_item_id" required><br><br>

        <label for="review_text">Review Text:</label>
        <textarea id="review_text" name="review_text" required></textarea><br><br>

        <label for="item_rating">Item Rating:</label>
        <input type="number" id="item_rating" name="item_rating" step="0.1" min="0" max="10" required><br><br>

        <input type="submit" name="submit" value="Add Review" class="styled-button">
    </form>

    <?php
    // Check if the form is submitted
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

            // Prepare and execute the SQL query
            $sql = "INSERT INTO Reviews (user_id, menu_item_id, review_text, item_rating) VALUES ('$user_id', '$menu_item_id', '$review_text', '$item_rating')";

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

</div>

<?php
// Database connection and query execution
$servername = 'localhost:8889';     // Hostname
$username = 'root';             // Database username
$password = 'root';             // Database password
$dbname = 'freakyFoodies';      // Database name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query
$sql = "SELECT r.review_id, r.menu_item_id, r.review_text, r.item_rating, r.review_date, u.username, res.restaurant_name, res.restaurant_id, m.menu_item_name
            FROM Reviews r
            INNER JOIN Users u ON r.user_id = u.user_id
            INNER JOIN MenuItems m ON r.menu_item_id = m.menu_item_id
            INNER JOIN Restaurants res ON m.restaurant_id = res.restaurant_id
            ORDER BY r.review_date DESC";  // Order by review_date in descending order
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Restaurant Name:</strong> ";
        echo "<a href='../crud-rest/restaurant-details.php?id=" . urlencode($row["restaurant_id"]) . "'>";
        echo $row["restaurant_name"];
        echo "</a></p>";
        echo "<p><strong>Menu Item Name:</strong> " . $row["menu_item_name"] . "</p>";
        echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
        echo "<p><strong>Review Text:</strong> " . $row["review_text"] . "</p>";
        echo "<p><strong>Item Rating:</strong> " . $row["item_rating"] . "</p>";
        echo "<p><strong>Review Date:</strong> " . $row["review_date"] . "</p>";
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
