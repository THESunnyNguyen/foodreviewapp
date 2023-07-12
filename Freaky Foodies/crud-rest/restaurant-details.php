<?php
    $page_roles = array('admin', 'user'); // Array of page roles (admin, user) - Modify as necessary
    require_once '../main-pages/checksession.php'; // Include session check file - Modify path if necessary
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Details</title>
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
<?php
include('login.php'); // Include login file - Modify if necessary

if (isset($_GET['id'])) { // Check if 'id' parameter is set in the URL
    $id = $_GET['id']; // Get the 'id' parameter value

    $conn = new mysqli($hn, $un, $pw, $db); // Create a new MySQLi connection using provided credentials
    if ($conn->connect_error) { // Check if the connection to the database was unsuccessful
        die("Connection failed: " . $conn->connect_error); // Display an error message and stop executing the script
    }


    $stmt = $conn->prepare("SELECT * FROM Restaurants WHERE restaurant_id = ?"); // Prepare a SELECT statement to retrieve restaurant details
    $stmt->bind_param("i", $id); // Bind the 'id' parameter to the SQL statement
    $stmt->execute(); // Execute the prepared statement
    $result = $stmt->get_result(); // Get the result set from the executed statement
    
    if ($result->num_rows > 0) { // Check if any rows were returned in the result set
        $row = $result->fetch_assoc(); // Fetch the first row from the result set into an associative array
        echo "<h2>Restaurant Details</h2>"; // Display a heading for the restaurant details
        echo "ID: " . $row['restaurant_id'] . "<br>"; // Display the restaurant ID
        echo "Name: " . $row['restaurant_name'] . "<br>"; // Display the restaurant name
        echo "Contact Number: " . $row['contact_number'] . "<br>"; // Display the contact number
        echo "Address: " . $row['address'] . "<br>"; // Display the address
        echo "Premium Status: " . ($row['premium_status'] ? 'Yes' : 'No') . "<br>"; // Display the premium status (Yes or No)
    } else {
        echo "Restaurant not found."; // Display an error message if no restaurant was found with the provided ID
    }


    // Calculate average rating of food items for the restaurant
    $stmt = $conn->prepare("SELECT AVG(item_rating) AS average_rating FROM Reviews WHERE menu_item_id IN (SELECT menu_item_id FROM MenuItems WHERE restaurant_id = ?)"); 
    $stmt->bind_param("i", $id); // Bind the 'id' parameter to the SQL statement
    $stmt->execute(); // Execute the prepared statement
    $result = $stmt->get_result(); // Get the result set from the executed statement

    if ($result->num_rows > 0) { // Check if any rows were returned in the result set
        $row = $result->fetch_assoc(); // Fetch the first row from the set into an associative array
        $averageRating = $row['average_rating']; // Get the average rating
        
        // Update the restaurant's rating with the average rating of food items
        $updateStmt = $conn->prepare("UPDATE Restaurants SET rating = ? WHERE restaurant_id = ?");
        $updateStmt->bind_param("di", $averageRating, $id);
        $updateStmt->execute();

        // Display the restaurant details with the updated rating

        echo "Rating: " . number_format($averageRating, 1) . "<br>"; // Display the average rating with two decimal places

    } else {
        echo "Restaurant not found."; // Display an error message if no restaurant was found with the provided ID
    }


    // Prepare and execute the SQL query to get menu items for the specific restaurant
    $stmt = $conn->prepare("SELECT * FROM MenuItems WHERE restaurant_id = ?");
    $stmt->bind_param("i", $id); // Bind the 'id' parameter to the SQL statement
    $stmt->execute(); // Execute the prepared statement
    $result = $stmt->get_result(); // Get the result set from the executed statement

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Menu Item ID:</strong> " . $row["menu_item_id"] . "</p>";
            echo "<p><strong>Restaurant ID:</strong> " . $row["restaurant_id"] . "</p>";
            echo "<p><strong>Menu Item Name:</strong> " . $row["menu_item_name"] . "</p>";
            echo "<p><strong>Price:</strong> $" . $row["price"] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No menu items found for the restaurant.";
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
} else {
    echo "No restaurant ID specified."; // Display an error message if no 'id' parameter was provided in the URL
}
?>
</body>
</html>
