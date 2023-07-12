

<!DOCTYPE html>
<html>
<head>
    <title>Food Review App</title>

    <link rel="stylesheet" href="styles.css">

    <!-- Add your CSS and other necessary files here -->
    <style>
        /* Add styles for your navbar and login button here */
        /* Example CSS for the navbar */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }
        
        .login-btn {
            background-color: #FFA500;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
        }
    </style>

        <style>
     body {
      background-color: #FFA500;
      background-repeat: no-repeat;
      background-size: cover;
    }

    #header {
      background-color: rgba(255, 165, 0, 0.5);
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #header h1 {
      color: white;
      font-family: "Single Fighter", Arial, sans-serif;
      font-size: 60px;
      margin: 0;
    }

    .navbar {
      background-color: #333;
      overflow: hidden;
    }

    .navbar a {
      float: left;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar a:hover {
      background-color: #FF9F1C;
    }

    #image-slideshow {
      height: 1000px;
      width: 1250px;
      overflow: hidden;
      position: relative;
      margin: 0 auto; /* Center the carousel horizontally */
    }

    #image-slideshow img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      animation: fade 10s infinite;
    }

    #image-slideshow img:nth-child(2) {
      animation-delay: 2s;
    }

    #image-slideshow img:nth-child(3) {
      animation-delay: 4s;
    }

    #image-slideshow img:nth-child(4) {
      animation-delay: 6s;
    }

    #image-slideshow img:nth-child(5) {
      animation-delay: 8s;
    }

    @keyframes fade {
      0% {
        opacity: 0;
      }
      20% {
        opacity: 1;
      }
      80% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }

    #carousel-overlay {
      position: absolute;
      top: 80%; 
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 1;
      padding: 10px 30px 20px;
    }

    #carousel-overlay::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    #carousel-overlay h2 {
      color: white;
      font-family: "montserrat", Arial, sans-serif;
      font-size: 40px;
      margin-bottom: 30px;
    }

    #carousel-overlay button {
      background-color: #FF9F1C;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    </style>
</head>
<body>

    <div id="header">
    <h1><a href="index.html" style="text-decoration: none; color: white;">Freaky Foodies</a></h1>
  </div>

  <div class="navbar">
        <?php
            include '../navbars/admin-navbar.php';
        ?>
    </div>

  <div id="image-slideshow">
    <img src="image1.jpg" alt="Image 1">
    <img src="image2.jpg" alt="Image 2">
    <img src="image3.jpg" alt="Image 3">
    <img src="image4.jpg" alt="Image 4">
    <img src="image5.jpg" alt="Image 5">
  </div>

  <div id="carousel-overlay">
    <h2>Capture the flavor. Share the delight. Let your words ignite culinary insight.</h2>
    <a href="authenticate.php">
      <button>Write a Review</button>
    </a>
  </div>

</body>
</html>