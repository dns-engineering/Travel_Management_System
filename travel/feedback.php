<?php
include "confi.php";

if (isset($_GET['id']) && isset($_POST['message'])) {
    $id = $_GET['id'];
    $message = mysqli_real_escape_string($con, $_POST['message']); // Escape the message to prevent SQL injection

    $query = "UPDATE `review` SET `message`='$message' WHERE `id`='$id'";
    $data = mysqli_query($con, $query);

    if ($data) {
        echo '<script>window.location = "index.php";</script>';
    } else {
        echo 'Failed to update message.';
    }
} else {
    echo 'Invalid request.';
}
?>
