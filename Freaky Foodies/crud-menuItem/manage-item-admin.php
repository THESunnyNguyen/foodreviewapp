<?php
    $page_roles = array('admin','user'); // Paste this - modify as necessary 
    require_once '../main-pages/checksession.php';// Paste this
    ?>


<!DOCTYPE html>
<html>
<head>
    <title> Menu Item Actions</title>
    <style>
        body, html {
            /* Set the height of the body and html elements to 100% */
            height: 100%;

            /* Use flexbox to center content vertically and horizontally */
            display: flex;
            flex-direction: column; /* Added to make the items stack vertically */
            align-items: center;
            justify-content: center;
            
            font-family: Arial, sans-serif;
        }
        
        /* Add space between navbar and container */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            box-sizing: border-box; /* Added to include padding in the width calculation */    
        }

        .container {
            /* Set the maximum width of the container */
            max-width: 400px;

            /* Center the container horizontally */
            margin: 0 auto;

            /* Add padding and background color to the container */
            padding: 100px;
            background-color: #fff;

            /* Add border radius and box shadow for styling */
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            /* Center the heading text */
            text-align: center;

            /* Add bottom margin to create spacing */
            margin-bottom: 20px;
        }

        .login-btn {
            /* Set the buttons to block level and center the text */
            display: block;
            width: 100%;
            text-align: center;

            /* Add margin and padding for spacing */
            margin: 10px 0;
            padding: 10px;

            /* Set background color, text color, and border styles */
            background-color: #FFA500;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            /* Change background color on hover */
            background-color: #c00;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>

    <div class="container">
        <h1>Menu Item Actions</h1>
        <a href="add-menuItem.php" class="login-btn">Add Menu Item</a>
        <a href="menuItem-list.php" class="login-btn">View Menu Items</a>
        <a href="update-menuItem.php" class="login-btn">Update Menu Item</a>
        <a href="delete-menuItem.php" class="login-btn">Delete Menu Item</a>
    </div>

    <!-- PHP code and SQL database integration will be added here -->
</body>
</html>