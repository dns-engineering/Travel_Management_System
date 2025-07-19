<?php
include "../confi.php"; // Go one directory up to include the config file

if (isset($_GET['id'])) {
    // Sanitize input
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // Delete query
    $query = "DELETE FROM user WHERE id='$id'";
    $data = mysqli_query($con, $query);

    if ($data) {
        // Redirect to user list page
        header("Location: userdetails.php?msg=UserDeleted");
        exit;
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }
} else {
    echo "No user ID provided.";
}
?>
