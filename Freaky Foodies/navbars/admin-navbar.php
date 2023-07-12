<!DOCTYPE html>
<html>
<head>
    <title>Navigation Bar</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<style>
body {
    font-family: 'Montserrat';font-size: 22px;
}
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
            <li><a href="../main-pages/home-page.php">Home</a></li>
            <li><a href="../main-pages/about-page.php">About</a></li>
            <li><a href="../main-pages/most-popular.php">Rankings</a></li>
            <li><a href="../crud-review/review-feed.php">Review Feed</a></li>
            <li><a href="../crud-rest/manage-rest-admin.php"> Restaurants</a></li>
            <li><a href="../crud-user/manage-users-admin.php"> Users</a></li>
            <li><a href="../crud-review/manage-reviews-admin.php"> Reviews</a></li>
            <li><a href="../crud-menuItem/manage-item-admin.php"> Menu Items</a></li>
            <li><a href="../crud-followership/manage-following-admin.php"> Followers</a></li>
            <li><a href="../main-pages/logout.php">Login/Logout</a></li>

        </ul>
    </nav>
</body>
</html>