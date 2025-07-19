<?php
session_start();
if (!isset($_SESSION['un'])) {
  header("Location: login.php"); // Redirect to your login page
  exit(); // Stop script execution
}

require_once('confi.php');
error_reporting(0);
session_start();
$un = $_SESSION['un'];
$query="SELECT * FROM book where user='$un' " ;
$result = mysqli_query($con,$query);

?>
<html>
    <head>
<style>
    .container{
        width: 1200px;
        height: 500px;
        overflow: auto;
        border:1px solid;
        margin-top: 5%;
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
   
/* Main styles */
body {
  margin: 0;
  font-family: Arial, sans-serif;
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




.button {
    display: inline-block;
    padding: 8px 12px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.disabled {
    background-color: #cccccc;
    color: #666666;
    cursor: not-allowed;
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
        <center>
        <div class="container">
            <table>
                <tr >
                <th> BOOK ID</th>
                <th>PLACE</th>
                <th>TOUR DATE</th>
                <th>USER</th>
                <th>PRICE</th>
                <th>BOOKING DATE</th>
                <th>DURATION</th>
                <th>BOOKING CONTACT NO.</th>
                <th>STATUS</th>
                <th>VIEW DETAIL</th>
            </tr>
            
                <tr>
                    <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        ?> 
                        <th ><?php echo $row['id']; ?></th>
                        <th ><?php echo $row['tourname']; ?></th>
                        <th ><?php echo $row['tourdate']; ?></th>
                        <th ><?php echo $row['user']; ?></th>
                        <th ><?php echo $row['totalPrice']; ?></th>
                        <th ><?php echo $row['bookingdate']; ?></th>
                        <th ><?php echo $row['tourduration']; ?></th>
                        <th ><?php echo $row['phone']; ?></th>
                        <th ><?php echo $row['status']; ?></th>
                        <th>
                        
    <?php
    if ($row['status'] == 'confirm by admin') {
        echo '<a href="view.php?id=' . $row['id'] . '" class="button">View</a>';
    } else {
        echo '<button class="disabled" disabled>N/A</button>'; 
    }
    ?>
</th>


                    </tr>
                        <?php    
                    }
                    ?>
                </tr>
            </table>
        </div>
    </center>
    </body>
</html>