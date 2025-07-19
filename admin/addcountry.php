<?php
include("../confi.php");

// Get form data
$message = $_POST['state'];

// File upload
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

// Validate upload
if (!empty($image)) {
    $uploadPath = "../global/" . basename($image);

    // Move uploaded file to destination
    if (move_uploaded_file($tmp_name, $uploadPath)) {
        // Insert into database
        $insert = mysqli_query($con, "INSERT INTO global (name, img) VALUES ('$message', '$image')");

        if ($insert) {
            echo '<script>
                    alert("Added successfully!");
                    window.location = "location.php";
                  </script>';
        } else {
            echo "Error inserting record: " . mysqli_error($con);
        }
    } else {
        echo "Failed to upload image to server.";
    }
} else {
    echo "Please select an image.";
}
?>
