<?php
include("confi.php");

if (isset($_POST['login'])) {
    session_start();

    $un = $_POST['un'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM user WHERE un='$un'";
    $data = mysqli_query($con, $query);

    if (mysqli_num_rows($data) == 1) {
        $row = mysqli_fetch_assoc($data);
        $hashedPassword = $row['pass'];

        // Verify entered password with hashed one
        if (password_verify($pass, $hashedPassword)) {
            // Success - login
            $_SESSION['un'] = $un;
            $_SESSION['email'] = $row['email']; // optionally store email
            echo '<script>
                alert("LOG IN SUCCESS!");
                window.location = "./";
                </script>';
        } else {
            echo '<script>
                alert("Incorrect Password!");
                window.location = "login.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("Invalid Username!");
            window.location = "login.php";
            </script>';
    }
}
?>
