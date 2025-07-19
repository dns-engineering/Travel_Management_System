<?php
require_once('../confi.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete the tour package
    $query = "DELETE FROM hollydays WHERE id = $id";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Package deleted successfully.'); window.history.back();</script>";
    } else {
        echo "<script>alert('Error deleting package.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.history.back();</script>";
}
?>
