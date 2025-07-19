<?php
// Include database configuration
include("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $tourname = $_POST['tourname'];

    // Loop through each day to get hotel details
    for ($day = 1; $day <= 8; $day++) {
        $hotelName = isset($_POST['h' . $day]) ? $_POST['h' . $day] : '';
        $hotelDescription = isset($_POST['h' . $day . 'des']) ? $_POST['h' . $day . 'des'] : '';
        $hotelImage = isset($_FILES['h' . $day . 'img']['name']) ? $_FILES['h' . $day . 'img']['name'] : '';

        $targetDirectory = "../hotel/";

        // Ensure the directory exists
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        $imagePath = "";
        $uniqueFilename = "";
        if (!empty($hotelImage) && is_uploaded_file($_FILES['h' . $day . 'img']['tmp_name'])) {
            // Generate a unique filename to avoid overwriting
            $fileExtension = pathinfo($hotelImage, PATHINFO_EXTENSION);
            $uniqueFilename = "hotel_" . time() . "_day" . $day . "." . $fileExtension;
            $imagePath = $targetDirectory . $uniqueFilename;

            if (!move_uploaded_file($_FILES['h' . $day . 'img']['tmp_name'], $imagePath)) {
                echo '<script>alert("Failed to upload image for Day ' . $day . '");</script>';
                $uniqueFilename = ""; // Reset filename in case of failure
            }
        }

        // Only insert if hotel name is provided
        if (!empty($hotelName)) {
            $stmt = $con->prepare("INSERT INTO hotel (tourname, hotel_name, hotel_image, hotel_description) 
                                   VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $tourname, $hotelName, $uniqueFilename, $hotelDescription);
            $success = $stmt->execute();

            if (!$success) {
                echo '<script>alert("Error inserting data for Day ' . $day . ': ' . $stmt->error . '");</script>';
            }
            $stmt->close();
        }
    }

    echo '<script>alert("All hotel details inserted successfully!"); window.location.href="addhotel.php";</script>';
}
?>