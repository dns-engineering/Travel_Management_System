<?php
// deletes.php - Delete a state from the database

include("../confi.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // First, get image filename (optional if you want to delete associated image too)
    $getImage = mysqli_query($con, "SELECT img FROM global WHERE id='$id'");
    $row = mysqli_fetch_assoc($getImage);
    $imagePath = "../global/" . $row['img'];

    // Delete the record from the database
    $query = "DELETE FROM global WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Optional: delete the image from the server (uncomment if needed)
        // if (file_exists($imagePath)) {
        //     unlink($imagePath);
        // }

        echo '<script>
                alert("State deleted successfully!");
                window.location = "country.php";
              </script>';
    } else {
        echo "Error deleting state: " . mysqli_error($con);
    }
} else {
    echo "Invalid request!";
}
?>
