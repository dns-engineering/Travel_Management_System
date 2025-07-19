<?php
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f7fa;
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
                transition: 0.3s;
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

            .header {
                padding: 20px;
                background-color: white;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                position: relative;
            }

            .header h1 {
                margin: 0;
                color: #1a237e;
                font-size: 24px;
            }

            .header .logo-container {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
            }

            .header .logo {
                width: 100px;
                height: 80px;
            }

            .header .logout-corner {
                position: absolute;
                top: 15px;
                right: 20px;
            }

            .header .logout-corner a {
                background-color: #f44336;
                color: white;
                padding: 8px 15px;
                border-radius: 4px;
                text-decoration: none;
                transition: 0.3s;
            }

            .header .logout-corner a:hover {
                background-color: #d32f2f;
            }

            .dashboard-cards {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 20px;
            }

            .dash-card {
                flex: 1;
                min-width: 250px;
                background-color: white;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .dash-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }

            .dash-card .card-value {
                font-size: 28px;
                font-weight: bold;
                color: #1a237e;
                margin-bottom: 10px;
            }

            .dash-card .card-label {
                font-size: 14px;
                color: #666;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .dash-card:nth-child(1) {
                background-color: #e3f2fd;
            }

            .dash-card:nth-child(2) {
                background-color: #e8f5e9;
            }

            .dash-card:nth-child(3) {
                background-color: #fff3e0;
            }

            .dash-card:nth-child(4) {
                background-color: #f3e5f5;
            }

            .dash-card:nth-child(5) {
                background-color: #fff8e1;
            }

            .dash-card:nth-child(6) {
                background-color: #e0f7fa;
            }

            .dash-card h2 {
                font-size: 16px;
                color: #1a237e;
                margin-top: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="sidebar">
            <?php include('header.php');?>
        </div>
        
        <div id="content">
            <div class="header">
                <div class="logo-container">
                    <a href="dashbord.php"><img src="../img/logo.png" alt="Logo" class="logo"></a>
                </div>
                <h1>Admin Dashboard</h1>
                <div class="logout-corner">
                    <a href="logout.php">Logout</a>
                </div>
            </div>

            <div class="dashboard-cards">
                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "user";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="userdetails.php">' . $row['total_records'] . '</a></div>';
                        echo '<div class="card-label">Total Users</div>';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>

                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "hollydays";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table WHERE tourtype='domestic'";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="states.php">' . $row['total_records'] . '</a></div>';
                        echo '<div class="card-label">Domestic Tours</div>';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>

                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "hollydays";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table WHERE tourtype='international'";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="country.php">' . $row['total_records'] . '</a></div>';
echo '<div class="card-label">International Tours</div>';
                    } else {
                        echo "Error: " . $conn->connect_error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>

                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "book";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="bookingdetail.php">' . $row['total_records'] . '</a></div>';
echo '<div class="card-label">Total Bookings</div>';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>

                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "book";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // Calculate the timestamp for 24 hours ago
                    $twentyFourHoursAgo = date("Y-m-d H:i:s", strtotime('-24 hours'));
                    
                    // SQL query to count records in the last 24 hours
                    $sql = "SELECT COUNT(*) AS total_records FROM $table WHERE bookingdate >= '$twentyFourHoursAgo'";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="newbook.php">' . $row['total_records'] . '</a></div>';
echo '<div class="card-label">New Bookings (24h)</div>';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>

                <div class="dash-card">
                    <?php
                    // Database connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "travel";
                    $table = "review";
                    
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // SQL query to count records in the table
                    $sql = "SELECT COUNT(*) AS total_records FROM $table";
                    
                    // Execute query
                    $result = $conn->query($sql);
                    
                    // Check if query executed successfully
                    if ($result) {
                        // Fetch the result
                        $row = $result->fetch_assoc();
                        // Output the total number of records
                        echo '<div class="card-value"><a href="review.php">' . $row['total_records'] . '</a></div>';
echo '<div class="card-label">Reviews</div>';
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    
                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>

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