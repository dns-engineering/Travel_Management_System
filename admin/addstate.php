<?php
include("../confi.php");

// Assuming you want to insert the state name as message
$message = $_POST['state'];

// File upload
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];

// Move uploaded file to a directory
move_uploaded_file($tmp_name, "../states/$image");

// Insert data into the database
$insert = mysqli_query($con, "INSERT INTO states (name, img) VALUES ('$message', '$image') ");

if ($insert) {
    echo '<script>
            alert("Added successfully!");
            window.location = "location.php";
          </script>';
} else {
    echo "Error: " . mysqli_error($connect);
}


?>
