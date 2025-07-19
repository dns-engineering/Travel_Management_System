<?php

include "../confi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

$query="UPDATE `book` SET `status`='cancel by admin' WHERE `id`='$id' ";
$data = mysqli_query($con,$query);



if ($data){
  echo
 '<script>
       alert("deleted successfully."); 
       window.history.back();</script>";
 </script>';

}
else {
  echo 'no';
}

}

?>