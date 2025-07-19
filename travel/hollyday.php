<?php
error_reporting(0);

require_once('confi.php');
session_start();
$un = $_SESSION['un'];
$id = $_GET['id'];
$query = "SELECT * FROM hollydays where state='$id' ";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holidays</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <style>
        body {
            background-color: beige;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

       

        .holiday-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .holiday-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            max-width: 300px;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: calc(33.33% - 40px);
        }

        .holiday-card:hover {
            transform: translateY(-5px);
        }

        .holiday-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .holiday-details {
            padding: 20px;
        }

        .holiday-details h2 {
            margin-top: 0;
            font-family: 'cursive';
            font-size: 24px;
        }

        .holiday-details h4 {
            margin: 5px 0;
            font-family: 'Georgia';
        }

        .holiday-details i {
            margin-right: 5px;
        }

        .price {
            margin: 10px 0;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .details-btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .details-btn:hover {
            background-color: #555;
        }

        @media screen and (max-width: 768px) {
            .holiday-card {
                width: calc(50% - 40px);
            }
        }

        @media screen and (max-width: 480px) {
            .holiday-card {
                width: calc(100% - 40px);
            }

            .col {
                flex: 100%;
            }
        }
         /* Navbar styles */
.navbar {
    background: #3d2b1f;
    width: 100%;
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
}

/* Align logo and name at start */
.navbar .logo-container {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-grow: 1; /* Allows it to take available space and push the nav-links */
}

.navbar .logo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 2px solid #f9f9f9;
}

.navbar .website-name {
    color: #f9f9f9;
    font-size: 28px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

/* Align navigation links to the right */
.navbar .nav-links {
    list-style-type: none;
    display: flex;
    gap: 20px;
    font-size: 15px;
    margin-left: auto; /* Pushes nav-links to the right */
}

.navbar .nav-links li a {
    color: #f9f9f9;
    font-weight: 600;
    text-transform: uppercase;
    transition: color 0.3s ease;
    position: relative;
    padding: 5px 15px;
}

.navbar .nav-links li a:hover {
    color: #4a6cfa;
}

.navbar .nav-links li a::after {
    content: '';
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #4a6cfa, #b537d2);
    transition: width 0.3s ease;
}

.navbar .nav-links li a:hover::after {
    width: 100%;
}

/* Dropdown Styles */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #3d2b1f;
    padding: 10px 0;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    min-width: 220px;
    backdrop-filter: blur(10px);
    z-index: 1000;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    padding: 12px 20px;
    display: block;
    color: #f9f9f9;
    text-align: left;
}

.dropdown-content a:hover {
    color: #4a6cfa;
    background: rgba(74, 108, 250, 0.2);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .navbar {
        padding: 15px 30px;
    }

    .navbar .nav-links {
        gap: 15px;
    }
}

@media (max-width: 480px) {
    .navbar .nav-links {
        display: none;
        flex-direction: column;
        gap: 10px;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #3d2b1f;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .navbar .nav-links.active {
        display: flex;
    }
} 

    </style>
</head>
<body>
<?php if($_SESSION['un'])
  {?>
     <nav class="navbar">
  <div class="logo-container">
    <img src="img/logo.png" alt="Logo" width="50" height="50">
    <a href="index.php" class="website-name">Explorer</a>
  </div>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li class="dropdown">
      <a href="#">Tours</a>
      <div class="dropdown-content">
        <a href="states.php">Domestic Tour</a>
        <a href="international.php">International Tour</a>
      </div>
    </li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="tourhistory.php">Tour History</a></li>
    <?php if($_SESSION['un']) { ?>
      <li><a href="profile.php">Welcome, <?php echo $un;?></a></li>
    <?php } else { ?>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    <?php } ?>
  </ul>
</nav>

    <?php
  } else
  { ?>

<nav class="navbar">
  <div class="logo-container">
    <img src="img/logo.png" alt="Logo" width="50" height="50">
    <a href="index.php" class="website-name">Explorer</a>
  </div>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li class="dropdown">
      <a href="#">Tours</a>
      <div class="dropdown-content">
        <a href="states.php">Domestic Tour</a>
        <a href="international.php">International Tour</a>
      </div>
    </li>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="tourhistory.php">Tour History</a></li>
    <?php if($_SESSION['un']) { ?>
      <li><a href="profile.php">Welcome, <?php echo $un;?></a></li>
    <?php } else { ?>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
    <?php } ?>
  </ul>
</nav>
<?php
}?>
</div>

<div class="holiday-container">
    <?php
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="holiday-card">
            <img src="package/<?php echo $row['timg']; ?>" alt="">
            <div class="holiday-details">
                <h2><?php echo $row['packname']; ?></h2>
                <div class="row">
                    <div class="col">
                        <h4><i class="material-icons">location_on</i><?php echo $row['state']; ?></h4>
                        <h4><i class='material-icons'>schedule</i><?php echo $row['tourduration']; ?></h4>
                        
                    </div>
                    <div class="col">
                        <h4><i class="material-icons">date_range</i><?php echo $row['fromdate']; ?></h4>
                        <h4><i class="material-icons">directions_car</i><?php echo $row['transportation']; ?></h4>
                    </div>
                </div>
                <div class="price">&#8377;<?php echo $row['price']; ?>/-</div>
                <a href="hollydaydetails.php?id=<?php echo $row['packname']; ?>" class="details-btn">Details</a>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>
