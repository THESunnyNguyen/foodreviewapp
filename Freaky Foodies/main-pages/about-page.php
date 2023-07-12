
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            margin-top: 50;

            background-color: #FFA500;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .section {
            display: flex;
            flex-direction: row;
            margin-bottom: 40px;
        }

        .content {
            flex: 1;
        }

        h2 {
            margin-top: 0;
        }

        p {
            margin-bottom: 20px;
        }

        .image {
            flex: 1;
            text-align: center;
        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        .section:nth-child(even) .content {
            order: 2;
        }

        .section:nth-child(even) .image {
            order: 1;
        }

        .navbar {
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px;
            box-sizing: border-box; /* Added to include padding in the width calculation */    
        }
        
    </style>
</head>

<body>

<div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>   

    <header>
        <h1>About Us</h1>
    </header>
    <div class="container">
        <div class="section">
            <div class="content">
                <h2>Discover Extraordinary Culinary Experiences</h2>
                <p>At Freaky Foodies, we are passionate about all things food. We believe that food is not just nourishment for the body, but also an adventure for the taste buds. Our mission is to connect food enthusiasts with the most unique, exciting, and delicious culinary experiences out there.</p>
            </div>
            <div class="image">
                <img src="image1.jpg" alt="Image 1">
            </div>
        </div>

        <div class="section">
            <div class="image">
                <img src="image2.jpg" alt="Image 2">
            </div>
            <div class="content">
                <h2>Unleash Your Inner Foodie</h2>
                <p>Whether you're a dedicated foodie, an adventurous eater, or someone simply looking for new flavors to explore, Freaky Foodies is here to be your trusted companion. We have created a vibrant and interactive platform where you can discover extraordinary restaurants, mouthwatering dishes, and share your own gastronomic journey with fellow food lovers.</p>
            </div>
        </div>

        <div class="section">
            <div class="content">
                <h2>What sets Freaky Foodies apart</h2>
                <p>What sets Freaky Foodies apart is our focus on individual food items and their reviews. We understand that every dish has its own story to tell and deserves attention. With our intuitive interface, you can easily browse through a wide range of food items, explore their ratings, and dive into detailed reviews that capture the essence of each culinary creation.</p>
            </div>
            <div class="image">
                <img src="image3.jpg" alt="Image 3">
            </div>
        </div>

        <div class="section">
            <div class="image">
                <img src="image4.jpg" alt="Image 4"> </div> <div class="content"> <h2>Follow Your Favorite Restaurants</h2> <p>But Freaky Foodies is not just about the food itself; it's about the entire dining experience. We believe that restaurants play a crucial role in shaping our food adventures. That's why we give you the power to follow your favorite restaurants, stay updated with their latest offerings, and even become their ultimate fan by sharing your reviews and recommendations.</p> </div> </div>

    <div class="section">
        <div class="content">
            <h2>Premium Memberships for Restaurants</h2>
            <p>For the restaurateurs out there, we offer premium memberships that provide a spotlight for your culinary artistry. With featured placement within our app, you can attract a dedicated audience and showcase your unique creations to food enthusiasts from all walks of life.</p>
        </div>
        <div class="image">
            <img src="image5.jpg" alt="Image 5">
        </div>
    </div>

    <div class="section">
        <div class="image">
            <img src="image6.jpg" alt="Image 6">
        </div>
        <div class="content">
            <h2>Join Our Foodie Community</h2>
            <p>At Freaky Foodies, we are committed to creating a vibrant community where food lovers can connect, inspire, and share their passion. Whether you're seeking inspiration for your next food adventure or looking to become a connoisseur in your own right, we invite you to join our ever-growing family of Freaky Foodies. Indulge in the extraordinary. Embrace the freaky. Join Freaky Foodies today!</p>
        </div>
    </div>
</div>