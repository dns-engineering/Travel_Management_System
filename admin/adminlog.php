<?php
session_start();

// Validate the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the provided username and password are correct
    $username = "admin147"; // Replace with your admin username
    $password = "147147"; // Replace with your admin password

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Authentication successful, set session variables and redirect to dashboard
        $_SESSION['admin_username'] = $username; // Store the username in session
        $_SESSION['admin_logged_in'] = true; // Flag to indicate admin is logged in
        header("Location: dashbord.php");
        exit;
    } else {
        // Authentication failed, redirect back to login page with error
        header("Location: adminlog.php?error=1");
        exit;
    }
} else {
    // Redirect to login page if accessed without form submission
    header("Location: adminlog.php");
    exit;
}
?>
