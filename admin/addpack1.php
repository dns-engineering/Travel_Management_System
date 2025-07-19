<?php
include("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $packname = $_POST['packname'];
    $state = $_POST['state'];
    $landscap = $_POST['landscap'];
    $transportation = $_POST['transportation'];
    $meals = $_POST['meals'];
    $price = $_POST['price'];
    $abouttour = $_POST['abouttour'];
    $tourduration = $_POST['tourduration'];
    $fromdate = $_POST['fromdate'];
    $accommodation = $_POST['accommodation'];
    $country = $_POST['country'];
    $tourtype = $_POST['tourtype'];
    
    // Get day-wise descriptions
    $days = [
        $_POST['day1'], $_POST['day2'], $_POST['day3'],
        $_POST['day4'], $_POST['day5'], $_POST['day6'],
        $_POST['day7'], $_POST['day8']
    ];

    // Handle file uploads
    $imageDirectory = "../package/";
    $uploadedImages = [];

    $imageFields = ['timg', 'timg1', 'timg2', 'd1img', 'd2img', 'd3img', 'd4img', 'd5img', 'd6img', 'd7img', 'd8img'];

    foreach ($imageFields as $imageName) {
        if (isset($_FILES[$imageName]) && $_FILES[$imageName]['error'] == 0) {
            $uploadedImage = $_FILES[$imageName]['name'];
            $tmpName = $_FILES[$imageName]['tmp_name'];
            $targetPath = $imageDirectory . $uploadedImage;

            if (move_uploaded_file($tmpName, $targetPath)) {
                $uploadedImages[$imageName] = $uploadedImage;
            } else {
                $uploadedImages[$imageName] = '';
            }
        } else {
            $uploadedImages[$imageName] = '';
        }
    }

    // Insert into database
    $insertQuery = "INSERT INTO hollydays 
    (packname, state, landscap, transportation, meals, price, abouttour, tourduration, fromdate, accommodation, country, tourtype, 
    day1, day2, day3, day4, day5, day6, day7, day8, 
    timg, timg1, timg2, d1img, d2img, d3img, d4img, d5img, d6img, d7img, d8img) 
    VALUES (
        '$packname', '$state', '$landscap', '$transportation', '$meals', '$price', '$abouttour', '$tourduration', '$fromdate', '$accommodation', '$country', '$tourtype', 
        '$days[0]', '$days[1]', '$days[2]', '$days[3]', '$days[4]', '$days[5]', '$days[6]', '$days[7]', 
        '{$uploadedImages['timg']}', '{$uploadedImages['timg1']}', '{$uploadedImages['timg2']}', 
        '{$uploadedImages['d1img']}', '{$uploadedImages['d2img']}', '{$uploadedImages['d3img']}', '{$uploadedImages['d4img']}', 
        '{$uploadedImages['d5img']}', '{$uploadedImages['d6img']}', '{$uploadedImages['d7img']}', '{$uploadedImages['d8img']}')";

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $insert = mysqli_query($con, $insertQuery);

    if ($insert) {
        echo '<script>alert("Package added successfully!");
        window.location = "addpack.php";
        </script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
    }
}
?>
