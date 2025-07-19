<?php
    session_start();
    unset($_SESSION['un']); // Unset the specific session variable $un
    session_destroy(); // Destroy the session
    header("location: index.php");
?>
