<?php
include "confi.php";

var_dump($_POST); // Debugging: Show received POST data

if (isset($_POST['hiddenEmail']) && isset($_POST['newPassword'])) {
    // Get data
    $email = $_POST['hiddenEmail'];
    $newPassword = $_POST['newPassword'];

    // Hash the new password securely
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Prepare SQL statement with the hashed password
    $query = "UPDATE `user` SET `pass` = ? WHERE `email` = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $email);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            echo '<script>
            alert("Password update successful");
            window.location = "login.php";
            </script>';
        } else {
            echo "Error updating password: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Missing parameters!";
}
?>
