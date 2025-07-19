<?php
session_start();

// Unset the admin session variables
unset($_SESSION['admin_username']);
unset($_SESSION['admin_logged_in']);

// Redirect to the admin login page
header("Location: index.php");
exit;
?>
