<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<script>
function updateStateDropdown() {
    var countrySelect = document.getElementsByName("country")[0];
    var stateSelect = document.getElementsByName("state")[0];
    var selectedCountry = countrySelect.value;

    // Make AJAX request to get states based on selected country
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_states.php?country=" + encodeURIComponent(selectedCountry), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            stateSelect.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>

<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

.box{
        width: 1200px;
        height: 600px;
        overflow: auto;
        border:1px solid;
        margin-top: ;
        margin-left:300px;
    }

#regForm {
  background-color: #ffffff;
 // margin: 100px auto;
 margin-left:150px;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color:#356dde;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
  margin-top: 10px;
  
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
h2{
  font-size:25px;
  font-family:cursive;
}
label{
  font-size:20px;
  margin-top:10px;
  margin-bottom:10px;
  font-family:cursive;
  font-style:italic;
}
#sidebar {
    height: 100vh;
    width: 250px;
    position: fixed;
    background: linear-gradient(180deg, #1a237e 0%, #2c3e50 100%);
    padding: 25px 0;
    transition: 0.3s;
    box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
}

#sidebar h1 {
    color: white;
    font-size: 28px;
    margin-bottom: 35px;
    text-align: center;
    letter-spacing: 1.2px;
    padding: 0 20px;
}

#sidebar a {
    padding: 15px 25px;
    text-decoration: none;
    font-size: 17px;
    color: #ecf0f1;
    display: block;
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    margin-bottom: 5px;
}

#sidebar a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-left: 4px solid #3498db;
    transform: translateX(5px);
    color: white;
}

.dropdown-btn {
    padding: 15px 25px;
    font-size: 17px;
    color: #ecf0f1;
    display: block;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
    margin-bottom: 5px;
    background: linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
}

.dropdown-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-left: 4px solid #3498db;
    transform: translateX(5px);
}

.dropdown-container {
    display: none;
    background-color: rgba(46, 64, 83, 0.9);
    padding: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    margin-left: 5px;
}

.dropdown-container a {
    padding: 12px 40px;
    border-left: 4px solid transparent;
}

.dropdown-container a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-left: 4px solid #2ecc71;
    transform: translateX(3px);
}

/* For nested dropdowns */
.dropdown-container .dropdown-btn {
    padding: 12px 40px;
    background-color: rgba(46, 64, 83, 0.9);
    border-left: 4px solid #3498db;
}

.dropdown-container .dropdown-container {
    padding-left: 15px;
    background-color: rgba(41, 59, 77, 0.9);
}

/* Active state for open dropdowns */
.active {
    display: block;
}

/* Add some visual feedback for active sections */
.active a:first-child {
    border-left: 4px solid #e74c3c;
}

/* Add subtle arrow indicators for dropdowns */
.dropdown-btn::after {
    content: '▼';
    float: right;
    margin-right: 15px;
    transition: transform 0.3s ease;
}

/* Add some spacing between sections */
#sidebar .section-divider {
    height: 2px;
    background-color: rgba(255, 255, 255, 0.1);
    margin: 15px 0;
    width: 90%;
    margin-left: auto;
    margin-right: auto;
}

.logout-btn {
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 100%;
    text-align: center;
}

.logout-btn a {
    background-color: #f44336;
    color: white;
    padding: 10px 15px;
    border-radius: 4px;
    transition: 0.3s;
}

.logout-btn a:hover {
    background-color: #d32f2f;
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
           
        }
        select {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #fff;
        cursor: pointer;
    }

    select:focus {
        outline: none;
        border-color: #356dde;
    }

    option {
        background-color: #fff;
        color: #000;
    }

    option:hover {
        background-color: #356dde;
        color: #fff;
    }
</style>
<body>
<div id="sidebar">
<div id="sidebar">
    <?php include('header.php');?>
</div>
</div>
<center><a><img src="../img/logo.png" alt="" width="100px" height="80px" alt="" style="margin-bottom: 15px;"></a></center>
<div class="box">
<form id="regForm" action="addpack1.php" method="post" enctype="multipart/form-data">
  <h1>ADD TOUR:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h2><center>TOUR DETAILS:</center></h2>
  <div class="input-box">
                <label for="packname">Package Name:</label>
                <input type="text" name="packname" placeholder="Enter your package name" required>
            </div>

            <div class="input-box">
    <label for="country">Country:</label>
    <select name="country" required onchange="updateStateDropdown()">
        <option value="">Select Country</option>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "travel";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch countries from the database
        $sql = "SELECT name FROM global";
        $result = $conn->query($sql);

        // Output options for each country
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
            }
        }

        // Add INDIA option manually at the end
        echo "<option value='india'>INDIA</option>";

        // Close database connection
        $conn->close();
        ?>
    </select>
</div>




           

            <div class="input-box">
    <label for="">landscap:</label>
    <select name="landscap" required>
        <option value="">Select Tour Type</option>
        <option value="desert" >desert</option>
        <option value="beach" >beach</option>
        <option value="mountains" >mountains</option>
         
        <!-- Add more options as needed -->
    </select>
</div>

            <div class="input-box">
                <label for="transportation">transportation:</label>
                <input type="text" name="transportation" placeholder="Enter transportation" required>
            </div>

            <div class="input-box">
                <label for="meals">meals:</label>
                <input type="text" name="meals" placeholder="meals" required>
            </div>

            <div class="input-box">
                <label for="price">price:</label>
                <input type="number" name="price" placeholder="Enter price" required>
            </div>

            <div class="input-box">
                <label for="about tour">abouttour:</label>
                <input type="text" name="abouttour" placeholder="Enter abouttour" required>
            </div>

            <div class="input-box">
                <label for="tourduration">tourduration:</label>
                <input type="text" name="tourduration" placeholder="Enter tourtimeline" required>
            </div>

            <div class="input-box">
                <label for="date">from date:</label>
                <input type="date" name="fromdate" placeholder="Enter tourdate" required
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedDate = $_POST["selected_date"];

    // Validate if the selected date is not less than today's date
    $today = new DateTime();
    $selectedDateTime = new DateTime($selectedDate);

    if ($selectedDateTime < $today) {
        echo "Selected date must not be less than today's date.";
    } else {
        echo "Validation successful! The selected date is valid.";
        // Additional actions can be performed if the date is valid
    }
}
?>
                >
            </div>

            <div class="input-box">
                <label for="hotel">accommodation:</label>
                <input type="text" name="accommodation" placeholder="Enter accommodation" required>
            </div>

            <div class="input-box">
    <label for="state">State:</label>
    <select name="state" required>
       
       
    </select>
</div>

            <div class="input-box">
    <label for="tourtype">Tour Type:</label>
    <select name="tourtype" required>
        <option value="">Select Tour Type</option>
        <option value="domestic" name="tourtype">domestic</option>
        <option value="international" name="tourtype">international</option>
         
        <!-- Add more options as needed -->
    </select>
</div>
  </div>
  <div class="tab"><h2><center>ENTER DAYS ACTIVITY INFO:</center></h2>
  <div class="input-box">
                <label for="day1">DAY1:</label>
                <input type="text" name="day1" placeholder="day1" required>
            </div>

            <div class="input-box">
                <label for="day2">DAY2:</label>
                <input type="text" name="day2" placeholder="day2" required>
            </div>

            <div class="input-box">
                <label for="day3">DAY3:</label>
                <input type="text" name="day3" placeholder="day3" required>
            </div>

            <div class="input-box">
                <label for="day4">DAY4:</label>
                <input type="text" name="day4" placeholder="day4" required>
            </div>

            <div class="input-box">
                <label for="day5">DAY5:</label>
                <input type="text" name="day5" placeholder="day5" >
            </div>

            <div class="input-box">
                <label for="day6">DAY6:</label>
                <input type="text" name="day6" placeholder="day6" >
            </div>

            <div class="input-box">
                <label for="day7">DAY7:</label>
                <input type="text" name="day7" placeholder="day7" >
            </div>

            <div class="input-box">
                <label for="day8">DAY8:</label>
                <input type="text" name="day8" placeholder="day8" >
            </div>
  </div>
  <div class="tab"><h2><center>TOUR IMAGE:</center></h2>
  <div class="file-upload">
                <label for="timg">Upload Main Image:</label>
                <input type="file" name="timg" required>
            </div>

            <div class="file-upload">
                <label for="timg1">Upload Image 1:</label>
                <input type="file" name="timg1" required>
            </div>

            <div class="file-upload">
                <label for="timg2">Upload Image 2:</label>
                <input type="file" name="timg2" required>
            </div>
  </div>
  <div class="tab"><h2><center>UPLOAD DAYS ACTIVITY IMAGES:</center></h2>
  <div class="file-upload">
                <label for="d1img">DAY1IMG:</label>
                <input type="file" name="d1img" required>
            </div>

            <div class="file-upload">
                <label for="d2img">DAY2IMG:</label>
                <input type="file" name="d2img" required>
            </div>

            <div class="file-upload">
                <label for="d3img">DAY3IMG:</label>
                <input type="file" name="d3img" required>
            </div>

            <div class="file-upload">
                <label for="d4img">DAY4IMG:</label>
                <input type="file" name="d4img" required>
            </div>

            <div class="file-upload">
                <label for="d5img">DAY5IMG:</label>
                <input type="file" name="d5img" >
            </div>

            <div class="file-upload">
                <label for="d6img">DAY6IMG:</label>
                <input type="file" name="d6img" >
            </div>

            <div class="file-upload">
                <label for="d7img">DAY7IMG:</label>
                <input type="file" name="d7img" >
            </div>

            <div class="file-upload">
                <label for="d8img">DAY8IMG:</label>
                <input type="file" name="d8img" >
            </div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
  
</form>

<script>



var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // No need to check for empty fields, so just return true
  return true;
}


function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
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
</div>
</body>
</html>
