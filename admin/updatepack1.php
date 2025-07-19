<?php
include("../confi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_GET['id'];
    $packname = $_POST['packname'];
    $state = $_POST['state'];
    $landscap = $_POST['landscap'];
    $transportation = $_POST['transportation'];
    $meals = $_POST['meals'];
    $price = $_POST['price'];
    $abouttour = $_POST['abouttour'];
    $tourduration = $_POST['tourduration'];
    $fromdate = $_POST['fromdate'];
    $accommodation = $_POST['accommodation'];
    $country = $_POST['country'];
    $tourtype = $_POST['tourtype'];
    $days = [
        $_POST['day1'], $_POST['day2'], $_POST['day3'],
        $_POST['day4'], $_POST['day5'], $_POST['day6'],
        $_POST['day7'], $_POST['day8']
    ];

    // Handle file uploads
    

    // Build the UPDATE query
    $updateQuery = "UPDATE hollydays SET 
        packname = IF('$packname' = '', packname, '$packname'),
        state = IF('$state' = '', state, '$state'),
        landscap = IF('$landscap' = '', landscap, '$landscap'),
        transportation = IF('$transportation' = '', transportation, '$transportation'),
        meals = IF('$meals' = '', meals, '$meals'),
        price = IF('$price' = '', price, '$price'),
        abouttour = IF('$abouttour' = '', abouttour, '$abouttour'),
        tourduration = IF('$tourduration' = '', tourduration, '$tourduration'),
        fromdate = IF('$fromdate' = '', fromdate, '$fromdate'),
        accommodation = IF('$accommodation' = '', accommodation, '$accommodation'),
        country = IF('$country' = '', country, '$country'),
        tourtype = IF('$tourtype' = '', tourtype, '$tourtype'),
        day1 = IF('$days[0]' = '', day1, '$days[0]'),
        day2 = IF('$days[1]' = '', day2, '$days[1]'),
        day3 = IF('$days[2]' = '', day3, '$days[2]'),
        day4 = IF('$days[3]' = '', day4, '$days[3]'),
        day5 = IF('$days[4]' = '', day5, '$days[4]'),
        day6 = IF('$days[5]' = '', day6, '$days[5]'),
        day7 = IF('$days[6]' = '', day7, '$days[6]'),
        day8 = IF('$days[7]' = '', day8, '$days[7]')
        WHERE id = '$id'";

    $update = mysqli_query($con, $updateQuery);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($update) {
        echo '<script>
            alert("Update successful!!!!!");
            window.history.go(-2);
        </script>';
    } else {
        echo '<script>
            alert("Error: ' . mysqli_error($con) . '");
        </script>';
    }
    
    
}
?>
