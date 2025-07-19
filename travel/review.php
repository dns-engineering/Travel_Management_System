<?php
 include("confi.php");
 session_start();
    $un = $_SESSION['un'];
{
    $un = $_SESSION['un'];
    $message = $_POST['message'];
    
    $insert = mysqli_query($con, "insert into review (un, message) values('$un', '$message') ");
    if($insert){
        echo '<script>
                alert("add !");
                window.location = "index.php";
            </script>';
    }
    else
    {
        echo '<script>
        alert("issues found!");
    </script>';
    }

    
}
?>