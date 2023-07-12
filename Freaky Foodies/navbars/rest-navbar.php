<!DOCTYPE html>
<html>
<head>
    <title>Navigation Bar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        
        nav {
            background-color: #FFA500;
            padding: 10px;
        }
        
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        nav ul li {
            display: inline-block;
        }
        
        nav ul li a {
            display: block;
            color: #fff;
            padding: 10px;
            text-decoration: none;
        }
        
        nav ul li a:hover {
            background-color: #c00;
        }
    </style>
<body>
    <nav>
        <ul>
            <li><a href="home-page.php">Home</a></li>
            <li><a href="about-page.php">About</a></li>
            <li><a href="update-restaurant.php">Update Restaurant</a></li>
        </ul>
    </nav>
</body>
</html>