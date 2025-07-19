<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are correct
    $username = "admin147"; // Replace with your admin username
    $password = "147147"; // Replace with your admin password

    if ($_POST['username'] === $username && $_POST['password'] === $password) {
        // Authentication successful, redirect to admin dashboard
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Authentication failed, redirect back to login page with error
        header("Location: admin_login_form.php?error=1");
        exit;
    }
}
?>
