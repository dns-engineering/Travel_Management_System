<?php

include "confi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

$query="DELETE FROM hollydays WHERE id='$id' ";
$data = mysqli_query($con,$query);
}
?>