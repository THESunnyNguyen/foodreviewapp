<?php
// Replace the placeholders with your actual database credentials
$host = 'localhost:8889';         // Hostname
$dbname = 'freakyFoodies';   // Database name
$username = 'root'; // Database username
$password = 'root'; // Database password

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = validateInput($_POST['name']);
$email = validateInput($_POST['email']);
$password = validateInput($_POST['password']);
$confirmPassword = validateInput($_POST['confirm-password']);
$role = validateInput($_POST['role']);

// Validate input fields
if ($password !== $confirmPassword) {
  die("Password and confirm password do not match");
}

// Determine the role_id based on the selected role
switch ($role) {
  case 'admin':
    $role_id = 1;
    break;
  case 'restaurant':
    $role_id = 3;
    break;
  case 'user':
    $role_id = 2;
    break;
  default:
    die("Invalid role");
}

// Prepare the statement
$stmt = $conn->prepare("INSERT INTO Users (username, password, email, role_id) VALUES (?, ?, ?, ?)");

// Bind parameters to the statement
$stmt->bind_param("sssi", $name, $password, $email, $role_id);

// Execute the statement
if ($stmt->execute() === TRUE) {
  echo "User created successfully";
} else {
  echo "Error creating user: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Function to validate and sanitize user input
function validateInput($input) {
  // Remove leading and trailing whitespaces
  $input = trim($input);

  // Remove backslashes
  $input = stripslashes($input);

  // Convert special characters to HTML entities
  $input = htmlspecialchars($input);

  return $input;
}
?>