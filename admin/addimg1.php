<?php
include("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_GET['id'];

    // Handle file uploads
    $imageDirectory = "../package/";
    $uploadedImages = [];

    foreach (['timg', 'timg1', 'timg2', 'd1img', 'd2img', 'd3img', 'd4img', 'd5img', 'd6img', 'd7img', 'd8img'] as $imageName) {
        $uploadedImage = $_FILES[$imageName]['name'];
        $tmpName = $_FILES[$imageName]['tmp_name'];
        $targetPath = $imageDirectory . $uploadedImage;

        if (!empty($uploadedImage) && move_uploaded_file($tmpName, $targetPath)) {
            $uploadedImages[$imageName] = $uploadedImage;
        }
    }

    // Generate the update query
    $updateQuery = "UPDATE hollydays SET";

    // Update only the images that are provided
    foreach (['timg', 'timg1', 'timg2', 'd1img', 'd2img', 'd3img', 'd4img', 'd5img', 'd6img', 'd7img', 'd8img'] as $imageName) {
        if (!empty($uploadedImages[$imageName])) {
            $updateQuery .= " $imageName = '$uploadedImages[$imageName]',";
        }
    }

    // Remove the trailing comma and complete the query
    $updateQuery = rtrim($updateQuery, ',') . " WHERE id = $id";

    $update = mysqli_query($con, $updateQuery);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($update) {
        echo '<script>alert("Update successful!");
               window.location = "addpack.php";
              </script>';

    } else {
        echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
    }
}
?>
