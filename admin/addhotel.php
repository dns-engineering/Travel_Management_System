<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Itinerary Form</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

form {
    width: 80%;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
select,
textarea {
    width: calc(100% - 24px); /* Adjusted for padding and border */
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

.custom-file-input {
    display: none;
}

.custom-file-label {
    background-color: rgb(66, 75, 188);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    display: inline-block;
    width: calc(100% - 24px); /* Adjusted for padding and border */
    box-sizing: border-box;
}

.custom-file-label:hover {
    background-color: rgb(66, 75, 188);
}

.slider-container {
    width: 100%;
    overflow-x: auto;
    white-space: nowrap;
    margin-bottom: 20px;
}

.slider {
    display: inline-block;
    width: 100px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    background-color: rgb(66, 75, 188);
    color: white;
    border-radius: 4px;
    margin-right: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.slider:hover {
    background-color: rgb(66, 75, 188);
}

button[type="submit"] {
    background-color: rgb(66, 75, 188);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color:rgb(66, 75, 188);
}

hr {
    border: 0;
    border-top: 1px solid #ccc;
    margin-top: 20px;
    margin-bottom: 20px;
}

h3 {
    margin-top: 0;
}


a {
            display: inline-block;
            text-decoration: none;
            color: black;
        }

        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: rgb(66, 75, 188);
            padding-top: 20px;

        }

        #sidebar a, .dropdown-btn {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover, .dropdown-btn:hover {
            background-color: #000000;
        }

        .dropdown-container {
            padding-left: 20px;
            display: none;
        }

        .active {
            display: block;
        }
        .container{
            overflow:auto;
            height:700px;
        }

        .container{
        width: auto;
        height: 500px;
        overflow: auto;
        border:1px solid;
        margin-left:300px;
    }
    table{
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: auto;
    }
    td, th{
border: 1px solid;
text-align: left;
padding: 8px;
    }
   tr:nth-child(even) {
    background-color: #dddddd;
   }
   .btn{
    height:30px;
    width:80px;
    background-color: rgb(23, 113, 38);
   }
   .btn:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn1{
    height:30px;
    width:80px;
    background-color: rgb(201, 0, 0);
   }
   .btn1:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }
   .btn2{
    height:30px;
    width:80px;
    background-color: rgb(0, 98, 255);
   }
   .btn2:hover{
    height:35px;
    width:85px;
    opacity: 0.7;
   }

            a{
    display:inline-block;
    text-decoration:none;
    color:black;
   }
   
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: rgb(66, 75, 188);
            padding-top: 20px;
           
        }

        #sidebar a, .dropdown-btn {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        #sidebar a:hover, .dropdown-btn:hover {
            background-color: #000000;
        }

        .dropdown-container {
            padding-left: 20px;
            display: none;
        }

        .active {
            display: block;
        }

        #content {
            margin-left: 250px;
            padding: 20px;
        }
        
        h1{
            color: white;
           font-family: monospace;
           font-size: 30px;
           color: #000000;
           background-color: azure;
        }
        #searchInput {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

#searchInput:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

    </style>
</head>
<body>

<div id="sidebar">
<div id="sidebar">
    <?php include('header.php');?>
</div>
</div>
<center>
    <a><img src="../img/logo.png" alt="" width="100px" height="80px" alt=""
            style="margin-bottom: 15px;"></a>
            <div class="container">
    <h2>Tour Itinerary Form</h2>
    <form action="addhotel1.php" method="POST" enctype="multipart/form-data">
            <label for="tourname">Tour Name:</label>
            <select id="tourname" name="tourname" required>
                <?php
                $conn = new mysqli("localhost", "root", "", "travel");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT packname FROM hollydays";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["packname"] . "'>" . $row["packname"] . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>
            <hr>
            <?php for ($day = 1; $day <= 8; $day++) : ?>
                <div>
                    <h3>Day <?php echo $day; ?></h3>
                    <label for="hotel_name<?php echo $day; ?>">Hotel Name:</label>
                    <input type="text" id="hotel_name<?php echo $day; ?>" name="h<?php echo $day; ?>" required>
                    <label for="image_upload<?php echo $day; ?>" class="custom-file-label">Upload Image</label>
                    <input type="file" id="image_upload<?php echo $day; ?>" class="custom-file-input" accept="image/*" name="h<?php echo $day; ?>img" required><br>
                    <label for="description<?php echo $day; ?>">Description:</label><br>
                    <textarea id="description<?php echo $day; ?>" name="h<?php echo $day; ?>des" rows="4" cols="50" required></textarea>
                    <hr>
                </div>
            <?php endfor; ?>
            <button type="submit">Submit</button>
        </form>
    <!-- JavaScript for slider functionality -->
        </div>
    <script>
        const sliders = document.querySelectorAll('.slider');
        const days = document.querySelectorAll('.day-content');

        sliders.forEach((slider, index) => {
            slider.addEventListener('click', () => {
                // Hide all day contents
                days.forEach(day => {
                    day.style.display = 'none';
                });
                // Show the corresponding day content
                days[index].style.display = 'block';
            });
        });
    </script>


<script>
    // Add JavaScript to toggle the dropdown menu
    document.addEventListener("DOMContentLoaded", function () {
        var dropdownBtns = document.querySelectorAll('.dropdown-btn');

        dropdownBtns.forEach(function (dropdownBtn) {
            dropdownBtn.addEventListener('click', function () {
                var dropdownContainer = dropdownBtn.nextElementSibling;
                dropdownContainer.classList.toggle('active');
            });

            var dropdownLinks = dropdownBtn.nextElementSibling.querySelectorAll('a');
            dropdownLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    var dropdownContainer = link.closest('.dropdown-container');
                    dropdownContainer.classList.remove('active');
                });
            });
        });
    });
</script>
</body>
</html>
