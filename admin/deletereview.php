<?php
require_once('../confi.php');
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}

// Check if an ID was provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the review from the database
    $query = "DELETE FROM review WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to reviews management page
            header("Location: review.php");
            exit;
        } else {
            die("Error deleting review: " . mysqli_error($con));
        }
    } else {
        die("Error preparing statement: " . mysqli_error($con));
    }
} else {
    die("Invalid request - no review ID provided.");
}
?>