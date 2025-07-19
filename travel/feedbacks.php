<?php
require_once('confi.php');
session_start();
$un = $_SESSION['un'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .review-container {
        margin-top: 20px;
    }

    .review-box {
        border: 2px solid #ddd;
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .review-box h2, .review-box h4 {
        margin-top: 0;
    }

    .review-box textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .review-box .btn-update,
    .review-box .btn-delete {
        margin-top: 10px;
    }

    @media (max-width: 768px) {
        .review-box {
            margin: 10px 0;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <center><h1 style="font-family: cursive;">Review</h1></center>
        <div class="review-container">
            <?php
            $query = "SELECT * FROM review where un='$un' ";
            $result = mysqli_query($con, $query);
            while($row = mysqli_fetch_assoc($result)) {
            ?> 
            <div class="col-sm-6 col-md-4">
                <div class="review-box">
                    <form action="feedback.php?id=<?php echo $row['id'];?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <h2>User: <?php echo $row['un'];?></h2>
                        <h4>Date: <?php echo $row['date'];?></h4>
                        <textarea name="message" rows="4" required><?php echo $row['message'];?></textarea>
                        <button type="submit" class="btn btn-primary btn-update">UPDATE</button>
                    </form>
                    <form action="deletefed.php?id=<?php echo $row['id'];?>" method="POST" style="margin-top: 10px;">
                        <button type="submit" class="btn btn-danger btn-delete">DELETE</button>
                    </form>
                </div>
            </div>
            <?php    
            }
            ?>
        </div>
    </div>
</body>
</html>
