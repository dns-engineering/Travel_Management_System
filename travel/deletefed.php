<?php
include "confi.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the review with the given id
    $query = "DELETE FROM `review` WHERE `id`='$id'";
    $result = mysqli_query($con, $query);

    if($result) {
        echo '<script>alert("Review deleted successfully."); window.location = "index.php";</script>';
    } else {
        echo '<script>alert("Failed to delete review."); window.location = "index.php";</script>';
    }
} else {
    echo '<script>alert("Invalid request."); window.location = "index.php";</script>';
}
?>
