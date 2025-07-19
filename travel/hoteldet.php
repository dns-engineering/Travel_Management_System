<?php

require_once('confi.php');

session_start();
$un = $_SESSION['un'];
$id = $_GET['id'];
$query = "SELECT * FROM hotel WHERE tourname='$id' ";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>HOTEL Details</title>
    <style>
        /* CSS Styles */
        /* Resetting default margin and padding for all elements */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        /* Package details styles */
        .package-details {

            overflow: auto;
            height: 300px;
            max-width: 800px;
            margin: 100px auto;
            background-color: rgb(181, 214, 243);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .hotel-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .hotel-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .days-activities {
            margin-bottom: 20px;
        }

        .days-activities h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .activity {
            margin-bottom: 10px;
        }

        h1 {
            color: brown;
            font-family: cursive;
        }

        h2 {
            color: brown;
            font-family: cursive;
            background-color: rgb(196, 224, 248);
        }

        p {
            color: rgb(44, 42, 165);
            font-family: cursive;
            background-color: rgb(249, 205, 170);
        }

        .row {
            border: 1px solid;
            margin: 20px auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>

<body>
    <center>
        <h1>hotel informations</h1>
    </center>

    <!-- Go Back Button -->
    <div class="container">
        <button onclick="goBack()" class="btn btn-primary">Go Back</button>
    </div>

    <!-- Package Details -->
    <div class="container package-details">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <?php for ($i = 1; $i <= 8; $i++) : ?>
                <?php $dayKey = 'h' . $i; ?>
                <?php $imgKey = 'h' . $i . 'img'; ?>
                <?php $desKey = 'h' . $i . 'des'; ?>
                <?php if (!empty($row[$dayKey])) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hotel-name">DAY<?php echo $i ?></div>
                        </div>
                        <div class="col-md-7">
                            <img src="hotels/<?php echo $row[$imgKey]; ?>" alt="Hotel Image" class="hotel-image">
                        </div>
                        <div class="col-md-5">
                            <h2><?php echo $row[$dayKey]; ?></h2>
                            <p><?php echo $row[$desKey]; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        <?php endwhile; ?>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>

