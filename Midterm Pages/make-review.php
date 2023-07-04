<!DOCTYPE html>
<html>
<head>
  <title>Make Review - Food Review App</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Food Review App</h1>
  </header>
  
  <nav>
    <a href="#">Home</a>
    <a href="#">Reviews</a>
    <a href="#">Top Rated</a>
    <a href="#">Contact</a>
  </nav>
  
  <main>
    <div class="container">
      <h2>Make a Review</h2>
      
      <form>
        <label for="restaurant-name">Restaurant Name:</label>
        <input type="text" id="restaurant-name" name="restaurant-name" required>
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
          <option value="">Select a rating</option>
          <option value="5">5 Stars</option>
          <option value="4">4 Stars</option>
          <option value="3">3 Stars</option>
          <option value="2">2 Stars</option>
          <option value="1">1 Star</option>
        </select>
        
        <label for="review">Your Review:</label>
        <textarea id="review" name="review" required></textarea>
        
        <input type="submit" value="Submit">
      </form>
    </div>
  </main>
  
  <footer>
    &copy; 2023 Food Review App. All rights reserved.
  </footer>
</body>
</html>
