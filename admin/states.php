<?php
require_once('../confi.php');
session_start();

// Check if the admin is not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to the login page
    header("Location: adminlog.php");
    exit;
}
$query="SELECT * FROM states " ;
$result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Management</title>
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

        .state-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 30px;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            color: #1a237e;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f5f7fa;
        }

        .btn {
            padding: 8px 15px;
            background-color: #854b4b;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            text-align: center;
        }

        .btn:hover {
            background-color: #6c3a3a;
        }

        #searchInput {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        #searchInput:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .center-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .center-logo img {
            width: 100px;
            height: 80px;
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
            <h1>State Management</h1>
            <div class="logout-corner">
                <a href="logout.php">Logout</a>
            </div>
        </div>

        

        <div class="state-container">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for state name...">
            <table id="tourTable">
                <tr>
                    <th>ID</th>
                    <th>STATE NAME</th>
                    <th>DELETE</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><a href="deletes.php?id=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this state?')">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tourTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Change index according to tour name column position
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

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