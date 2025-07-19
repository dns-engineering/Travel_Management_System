<?php
include("confi.php");

if (isset($_POST['name'], $_POST['un'], $_POST['email'], $_POST['phone'], $_POST['pass'], $_POST['date'])) {
    $name = $_POST['name'];
    $un = $_POST['un'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $date = $_POST['date'];

    // Check if the email, username, or phone already exist in the database
    $check_query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' OR un='$un' OR phone='$phone'");
    $count = mysqli_num_rows($check_query);

    if ($count == 0) {
        // Hash the password before saving it
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        // Insert into database
        $insert = mysqli_query($con, "INSERT INTO user (name, email, phone, un, pass, date) VALUES ('$name', '$email', '$phone', '$un', '$hashedPass', '$date')");
        if ($insert) {
            echo '<script>
                    alert("Registration successful!");
                    window.location = "login.php";
                </script>';
        } else {
            echo '<script>
                    alert("Issues found!");
                    window.location = "registration.php";
                </script>';
        }
    } else {
        echo '<script>
                alert("Email, Username, or Phone number already exists!");
                window.location = "registration.php";
            </script>';
    }
} else {
    echo '<script>
            alert("Required fields missing!");
            window.location = "registration.php";
        </script>';
}
?>
