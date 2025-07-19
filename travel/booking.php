<?php
session_start();
if (!isset($_SESSION['un'])) {
    header("Location: login.php"); // Redirect to your login page
    exit(); // Stop script execution
}

require_once('confi.php');

$un = $_SESSION['un'];
$id = $_GET['id'];
$query = "SELECT * FROM hollydays WHERE packname='$id'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 50px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box label {
            font-weight: bold;
            font-size: 18px;
        }

        .input-box input,
        .input-box select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 16px;
            outline: none;
            margin-top: 5px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .person-details {
            background-color: #f0f0f0;
            border-left: 5px solid #007bff;
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .person-details h5 {
            font-weight: bold;
            color: #007bff;
        }

        .date-error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <form action="book.php" method="POST" enctype="multipart/form-data" id="bookingForm">
                <div class="row">
                    <div class="col-md-6">
                        <img src="package/<?php echo $row['timg']; ?>" class="img-fluid rounded" alt="Package Image">
                        <input type="hidden" name="bimg" value="<?php echo $row['timg']; ?>">
                    </div>
                    <div class="col-md-6">
                        <div class="input-box">
                            <label>Tour:</label>
                            <input type="hidden" name="tour" value="<?php echo $row['packname']; ?>">
                            <p class="font-weight-bold"><?php echo $row['packname']; ?></p>
                        </div>
                        <div class="input-box">
                            <label>Select Tour Date:</label>
                            <input type="date" id="tourDate" name="tourDate" required>
                            <div class="date-error" id="dateError">Please select a future date</div>
                        </div>
                        <div class="input-box">
                            <label>Price per person:</label>
                            <input type="hidden" name="pricePerPerson" value="<?php echo $row['price']; ?>">
                            <p class="font-weight-bold">₹<?php echo $row['price']; ?></p>
                        </div>
                        <div class="input-box">
                            <label>Duration:</label>
                            <input type="hidden" name="duration" value="<?php echo $row['tourduration']; ?>">
                            <p class="font-weight-bold"><?php echo $row['tourduration']; ?> Days</p>
                        </div>
                        <div class="input-box">
                            <label>Number of People:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                                </div>
                                <input type="text" id="noOfPeople" name="noOfPeople" class="form-control text-center" min="1" max="50" value="1" onchange="updateTotalPrice()">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="input-box">
                            <label>Total Price:</label>
                            <p class="font-weight-bold text-success" id="totalPrice">₹<?php echo $row['price']; ?></p>
                            <input type="hidden" name="totalPrice" id="hiddenTotalPrice" value="<?php echo $row['price']; ?>">
                        </div>

                        <!-- Dynamic Person Details Section -->
                        <div id="personDetails"></div>

                        <center>
                            <button type="submit" class="btn mt-3" id="submitBtn">CONFIRM BOOKING</button>
                        </center>
                    </div>
                </div>
            </form>
        <?php endwhile; ?>
    </div>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tourDate').setAttribute('min', today);

        function increment() {
            var input = document.getElementById('noOfPeople');
            if (parseInt(input.value) < 50) {
                input.value = parseInt(input.value) + 1;
                updateTotalPrice();
                updatePersonDetails();
            }
        }

        function decrement() {
            var input = document.getElementById('noOfPeople');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateTotalPrice();
                updatePersonDetails();
            }
        }

        function updateTotalPrice() {
            var pricePerPerson = parseFloat(document.querySelector('[name="pricePerPerson"]').value);
            var noOfPeople = parseInt(document.getElementById('noOfPeople').value);
            document.getElementById('totalPrice').innerText = '₹' + (pricePerPerson * noOfPeople).toFixed(2);
            document.getElementById('hiddenTotalPrice').value = (pricePerPerson * noOfPeople).toFixed(2);
            updatePersonDetails();
        }

        function updatePersonDetails() {
            let numPeople = document.getElementById("noOfPeople").value;
            let container = document.getElementById("personDetails");
            container.innerHTML = "";
            for (let i = 1; i <= numPeople; i++) {
                container.innerHTML += `
                    <div class="person-details">
                        <h5>Person ${i} Details</h5>
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="personName[]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Age:</label>
                            <input type="number" name="personAge[]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <select name="personGender[]" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>`;
            }
        }
    </script>

</body>
</html>
