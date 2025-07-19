<?php
include "confi.php";

if (!isset($_GET['email'])) {
    echo '<script>alert("Email not provided."); window.location.href = "profile.php";</script>';
    exit;
}

$email = $_GET['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['oldPassword'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if ($oldPassword === '' || $newPassword === '' || $confirmPassword === '') {
        echo '<script>alert("All fields are required."); window.history.back();</script>';
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        echo '<script>alert("New and confirm passwords do not match."); window.history.back();</script>';
        exit;
    }

    // Fetch hashed password from DB
    $query = "SELECT `pass` FROM `user` WHERE `email` = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $dbPasswordHash);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Verify old password
    if (!password_verify($oldPassword, $dbPasswordHash)) {
        echo '<script>alert("Old password is incorrect."); window.history.back();</script>';
        exit;
    }

    // Hash new password
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update new hashed password in DB
    $updateQuery = "UPDATE `user` SET `pass` = ? WHERE `email` = ?";
    $updateStmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "ss", $newHashedPassword, $email);

    if (mysqli_stmt_execute($updateStmt)) {
        echo '<script>alert("Password changed successfully!"); window.location.href = "profile.php";</script>';
    } else {
        echo '<script>alert("Failed to update password: ' . mysqli_error($con) . '"); window.history.back();</script>';
    }

    mysqli_stmt_close($updateStmt);
} else {
    echo '<script>alert("Invalid request method."); window.history.back();</script>';
}
?>
