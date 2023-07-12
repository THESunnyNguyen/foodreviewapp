<?php
// Include the database connection file
require_once 'db_connect.php';

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    // Validate the username and password
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        // Prepare the SQL statement to check if the username and password match
        $sql = "SELECT * FROM Users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Store the user's ID and role in the session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirect the user to their role-specific dashboard
            switch ($user['role_id']) {
                case 1:
                    // Redirect to the Admin dashboard
                    header("Location: admin_dashboard.php");
                    exit();
                case 2:
                    // Redirect to the User dashboard
                    header("Location: user_dashboard.php");
                    exit();
                case 3:
                    // Redirect to the Restaurant dashboard
                    header("Location: restaurant_dashboard.php");
                    exit();
                default:
                    // Redirect to a generic dashboard if the role is not recognized
                    header("Location: generic_dashboard.php");
                    exit();
            }
        } else {
            // Invalid username or password
            $error = "Invalid username or password. Please try again.";
        }
    }
}
?>