<?php
include("confi.php");
session_start();
$un = $_SESSION['un'];

// Get form data
$tourname = $_POST['tour'];
$tourdate = $_POST['tourDate'];
$totalPrice = $_POST['totalPrice'];
$tourduration = $_POST['duration'];
$bimg = $_POST['bimg'];
$noOfPeople = $_POST['noOfPeople'];

// Get user details
$user_query = mysqli_query($con, "SELECT name, email, phone FROM user WHERE un = '$un'");
$user_row = mysqli_fetch_assoc($user_query);
$user_name = $user_row['name'];
$user_email = $user_row['email'];
$user_phone = $user_row['phone'];

// Insert booking details
$insert_booking = mysqli_query($con, "INSERT INTO book (user, phone, email, tourname, tourdate, tourduration, totalPrice, person1, bimg, noofpeople) 
                                      VALUES ('$un', '$user_phone', '$user_email', '$tourname', '$tourdate', '$tourduration', '$totalPrice', '$user_name', '$bimg', '$noOfPeople')");

if ($insert_booking) {
    $bookingID = mysqli_insert_id($con); // Get the last inserted booking ID

    // Insert each person's details into book_details
    for ($i = 0; $i < $noOfPeople; $i++) {
        $personName = mysqli_real_escape_string($con, $_POST['personName'][$i]);
        $personAge = mysqli_real_escape_string($con, $_POST['personAge'][$i]);
        $personGender = mysqli_real_escape_string($con, $_POST['personGender'][$i]);

        $insert_person = mysqli_query($con, "INSERT INTO book_details (bookingID, personName, personAge, personGender) 
                                            VALUES ('$bookingID', '$personName', '$personAge', '$personGender')");
    }
    
    echo '<script>
            alert("Booking request successful!");
            window.location = "tourhistory.php";
          </script>';
} else {
    echo '<script>
            alert("Issues found! Please try again.");
            window.location = "registration.php";
          </script>';
}
?>
