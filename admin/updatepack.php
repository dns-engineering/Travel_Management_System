<?php
require_once('../confi.php');
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
$id = isset($_GET["id"]) ? $_GET["id"] : null;
$query="SELECT * FROM hollydays WHERE id='$id'  ";
$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
        }

        

        #regForm {
            background-color: #ffffff;
            font-family: 'Raleway', sans-serif;
            padding: 40px;
            width: 70%;
            min-width: 300px;
            margin: 50px auto 0 auto; /* Adjusted margin */
            margin-left:350px;
            margin-top:0px;
        }
img{
  margin-left:130px;
}
        h1 {
            text-align: center;
            font-size: 30px;
            
            padding: 10px; /* Added padding */
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: 'Raleway', sans-serif;
            border: 1px solid #aaaaaa;
            margin-bottom: 10px; /* Added margin-bottom */
        }

        /* Mark input boxes that get an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #356dde;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: 'Raleway', sans-serif;
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

        h2 {
            font-size: 25px;
            font-family: cursive;
            margin-top: 10px; /* Added margin-top */
            margin-bottom: 10px;
        }

        label {
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            font-family: cursive;
            font-style: italic;
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


        #content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
<body>
<div id="sidebar">
<div id="sidebar">
    <?php include('header.php');?>
</div>
</div>
<center><a><img src="../img/logo.png" alt="" width="100px" height="80px" alt="" style="margin-bottom: 15px;"></a></center>
<?php
                while($row = mysqli_fetch_assoc($result))
                {
                    ?> 
<form id="regForm" action="updatepack1.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
<div id="box">
  <h1>UPDATE TOUR:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h2><center>TOUR DETAILS:</center></h2>
  <div class="input-box">
                <label for="packname">Package Name:</label>
                <input type="text" name="packname" placeholder="<?php echo $row['packname'];?>" values="<?php echo $row['packname'];?>" required >
            </div>

            <div class="input-box">
                <label for="state">State:</label>
                <input type="text" name="state" placeholder="<?php echo $row['state'];?>" values="<?php echo $row['state'];?>" required>
            </div>

            <div class="input-box">
                <label for="landscape">landscape:</label>
                <input type="text" name="landscap" placeholder="<?php echo $row['landscap'];?>" values="<?php echo $row['landscap'];?>" required>
            </div>

            <div class="input-box">
                <label for="transportation">transportation:</label>
                <input type="text" name="transportation" placeholder="<?php echo $row['transportation'];?>" values="<?php echo $row['transportation'];?>" required>
            </div>

            <div class="input-box">
                <label for="meals">meals:</label>
                <input type="text" name="meals" placeholder="<?php echo $row['meals'];?>" values="<?php echo $row['meals'];?>" required>
            </div>

            <div class="input-box">
                <label for="price">price:</label>
                <input type="number" name="price" placeholder="<?php echo $row['price'];?>" values="<?php echo $row['price'];?>" required>
              </div>

            <div class="input-box">
                <label for="about tour">abouttour:</label>
                <input type="text" name="abouttour" placeholder="<?php echo $row['abouttour'];?>" values="<?php echo $row['abouttour'];?>" required>
            </div>

            <div class="input-box">
                <label for="tourduration">tourduration:</label>
                <input type="text" name="tourduration" placeholder="<?php echo $row['tourduration'];?>" values="<?php echo $row['tourduration'];?>" required>
            </div>

            <div class="input-box">
                <label for="date">from date:</label>
                <input type="date" name="fromdate" placeholder="<?php echo $row['fromdate'];?>" values="<?php echo $row['fromdate'];?>" required>
            </div>

            <div class="input-box">
                <label for="hotel">accommodation:</label>
                <input type="text" name="accommodation" placeholder="<?php echo $row['accommodation'];?>" values="<?php echo $row['accommodation'];?>" required>
            </div>

            <div class="input-box">
                <label for="country">country:</label>
                <input type="text" name="country" placeholder="<?php echo $row['country'];?>" values="<?php echo $row['country'];?>" required>
            </div>

            <div class="input-box">
                <label for="tourtype">tourtype:</label>
                <input type="text" name="tourtype" placeholder="<?php echo $row['tourtype'];?>" values="<?php echo $row['tourtype'];?>" required>
            </div>
  </div>
  <div class="tab"><h2><center>ENTER DAYS ACTIVITY INFO:</center></h2>
  <div class="input-box">
                <label for="day1">DAY1:</label>
                <input type="text" name="day1" placeholder="<?php echo $row['day1'];?>" values="<?php echo $row['day1'];?>" required>
            </div>

            <div class="input-box">
                <label for="day2">DAY2:</label>
                <input type="text" name="day2" placeholder="<?php echo $row['day2'];?>" values="<?php echo $row['day2'];?>" required>
            </div>

            <div class="input-box">
                <label for="day3">DAY3:</label>
                <input type="text" name="day3" placeholder="<?php echo $row['day3'];?>" values="<?php echo $row['day3'];?>" required>
            </div>

            <div class="input-box">
                <label for="day4">DAY4:</label>
                <input type="text" name="day4" placeholder="<?php echo $row['day4'];?>" values="<?php echo $row['day4'];?>" required>
            </div>

            <div class="input-box">
                <label for="day5">DAY5:</label>
                <input type="text" name="day5" placeholder="<?php echo $row['day5'];?>" values="<?php echo $row['day5'];?>" required>
            </div>

            <div class="input-box">
                <label for="day6">DAY6:</label>
                <input type="text" name="day6" placeholder="<?php echo $row['day6'];?>" values="<?php echo $row['day6'];?>" required>
            </div>

            <div class="input-box">
                <label for="day7">DAY7:</label>
                <input type="text" name="day7" placeholder="<?php echo $row['day7'];?>" values="<?php echo $row['day7'];?>" required>
            </div>

            <div class="input-box">
                <label for="day8">DAY8:</label>
                <input type="text" name="day8" placeholder="<?php echo $row['day8'];?>" values="<?php echo $row['day8'];?>" required>
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
<?php    
                }
                ?>
                </div>
<script>
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
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // Skip marking the field as invalid
      continue;
    }
    // If the field is not empty, and the current valid status is true,
    // mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
  }
  return true; // Return true to allow moving to the next tab even if fields are empty
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
</script>

</body>
</html>
