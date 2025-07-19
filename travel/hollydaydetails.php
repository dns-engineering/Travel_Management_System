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
$id=$_GET['id'];
$query="SELECT * FROM hollydays WHERE packname='$id' or country='$id' ";
$result = mysqli_query($con,$query);

?>
<html>
    <head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOUR DETAILS</title>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <style>
        

body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
h1{
    font-family:  cursive;
    background-color:rgb(203, 224, 242);
}
        .container {
            width: 300px; /* Set container width to 300px */
            margin: 20px auto;
        }

        /* Card style */
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-content {
            padding: 20px;
            border-bottom: 1px solid #eee; /* Line between sections */
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: rgb(3, 1, 25);
            font-family: monospace;
        }

        .card-price {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            background-color: #f5f5f5; /* Light color for price section */
            padding: 10px; /* Add padding to make it distinct */
            border-radius: 5px; /* Optional: Add border radius for better appearance */
        }

        .card-date {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        

        .card-button:hover {
            background-color: #0056b3;
        }

/* Header Styles */
header {
    background-color: #f8f8f8;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

header p {
    margin-top: 5px;
}

/* CSS for carousel effect */
.main-images {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.main-images .carousel {
    display: flex;
    transform: translateX(-100%);
    animation: carouselAnimation 15s infinite;
}

@keyframes carouselAnimation {
    0%, 100% {
        transform: translateX(0%);
    }
    16.67% {
        transform: translateX(0%);
    }
    33.33% {
        transform: translateX(-100%);
    }
    50% {
        transform: translateX(-100%);
    }
    66.67% {
        transform: translateX(-200%);
    }
    83.33% {
        transform: translateX(-200%);
    }

    from {
        transform: translateX(-100%) scale(0.5);
    }
    to {
        transform: translateX(0) scale(1);
    }
}





.item h3{
    font-family:cursive;
    color:azure;
    
}

.carousel img {
    flex: 1;
    height: 400px;
    min-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow effect */
}






/* Tour Details Section Styles */
.tour-details {
    background-color: #f8f8f8;
    padding: 20px;
}

.tour-details h2 {
    text-align: center;
}

.details {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    transform: translateY(-100%) scale(0.5);
    animation: slideAndZoomFromTop 1s forwards;
}

@keyframes slideAndZoomFromTop {
    from {
        transform: translateY(-100%) scale(0.5);
    }
    to {
        transform: translateY(0) scale(1);
    }
}

.tour {
    width: 100%;
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    img{
        height: 60px;
        width: 90px;
    }
    h4{
        text-align: center;
        font-family: cursive;
    }
}

.tour h3 {
    margin-top: 0;
}

.tour p {
    margin: 5px 0;
}

.tour ul {
    padding: 0;
    margin: 5px 0;
}

.tour ul li {
    list-style-type: none;
}

/* Adjust the existing carousel CSS */





/* Footer Styles */
footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}
#about{
   
   text-align: center;
   
    h3{
        text-align: center;
        font-family: cursive;
        font-size: 35px;
    }
    h4{
        text-align: justify;
        color: rgb(0, 2, 27);
        font-family: monospace;
    }
    margin-right: 10px;
}
.row{
    background-color:#eee;
    margin-right: 10px;
    transform: translateY(-100%);
    animation: slideFromTop 1s forwards;
    color: black;
}

@keyframes slideFromTop {
    from {
        transform: translateY(-100%);
    }
    to {
        transform: translateY(0);
    }
}

.item img{
    height: 200px;
    width: 250px;
    margin: 10px auto;
    
}

.item{
    border:solid 1px;
    background-color: alice blue;
    color: azure;
    transform: translateY(-100%) scale(0.5);
    animation: slideAndZoomFromTop 1s forwards;
    h3{
        color:black;
    }
}





#about {
    opacity: 0; /* Initially hide the element */
    transform: translateX(100%) scale(0.5); /* Move the element outside the viewport to the right and scale it down */
    animation: slideAndZoom 4s forwards; /* Apply the animation */
}

@keyframes slideAndZoom {
    from {
        opacity: 0; /* Start with opacity 0 */
        transform: translateX(100%) scale(0.5); /* Start position: completely outside the viewport on the right and scaled down */
    }
    to {
        opacity: 1; /* End with opacity 1 */
        transform: translateX(0) scale(1); /* End position: move to original position and scale up */
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

/* Main styles */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}



           
#price{
    background-color:rgb(148, 199, 243);
}
#date{
    background-color: rgb(243, 246, 202);
}
#gallery{
    height: 200px;
    width:500px;
    transform: translateX(100%) scale(0.5); /* Move the element outside the viewport to the right and scale it down */
    animation: slideAndZoom 4s forwards; /* Apply the animation */
}
    </style>
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

<?php
while($row = mysqli_fetch_assoc($result))
{
    ?> 

<body>
    <header>
        <nav>
            <!-- Your navigation links here -->
        </nav>
        <h1><?php echo $row['packname'];?></h1>
        
    </header>
<div class="row">
    <div class="col-md-12">
    <div class="col-md-8">
    <section class="main-images">
      <div class="carousel">
      <img src="package/<?php echo $row['timg'];?>" alt="" >
      <img src="package/<?php echo $row['timg1'];?>" alt="" >
      <img src="package/<?php echo $row['timg2'];?>" alt="" >  
      </div>
  </section>
  </div>
  <div class="col-md-3" >
    <img src="package/<?php echo $row['d1img'];?>" alt="" id="gallery" > 
    <br>
    <img src="package/<?php echo $row['d2img'];?>" alt="" id="gallery" > 
  </div>
</div>
  <div class="col-md-12" >
    <div class="col-md-8" id="about">
    <h3>About tour</h3>
    <h4><?php echo $row['abouttour'];?>
    </h4>
</div>
    <div class="col-md-3">
    <div class="container">
    <div class="card">
        <div class="card-content" id="price">
            <div class="card-title">Price Information</div>
            <div class="card-price"><?php echo $row['price'];?> per person*</div>
        </div>
        <div class="card-content" id="date">
        <div class="card-title">date information</div>
            <div class="card-date"><?php echo $row['fromdate'];?></div>
        </div>
        <div class="card-content">
            
            <a href="booking.php ?id=<?php echo $row['packname'];?>" class="card-button">
                book now
            </a>
        </div>
    </div>
</div>
    </div>
</div>
  </div>

</div>
</div>
    <section class="tour-details">
      <a href="hoteldet.php ?id=<?php echo $row['packname'];?>">  
        <div class="details">
            <div class="tour">
                <div class="col-md-12" id="details">
                    <div class="col-md-2">
                     <h4 ><img src="details/location.png" style="size: 25px;"><br><h4><?php echo $row['state'];?></h4></h4>
                    </div>
                    <div class="col-md-2">
                        <h4 ><img src="details/duration.png"  style="size: 25px;"><br><h4><?php echo $row['tourduration'];?></h4></h4>
                       </div>
                     
                       <div class="col-md-2">
                        <h4 ><img src="details/hotel.png"  style="size: 25px;"><br><h4><?php echo $row['accommodation'];?></h4></h4>
                       </div>
                       <div class="col-md-2">
                        <h4 ><img src="details/date.png"  style="size: 25px;"><br><h4><?php echo $row['fromdate'];?></h4></h4>
                       </div>
                       <div class="col-md-2">
                        <h4 ><img src="details/transportation.png"  style="size: 25px;"><br><h4><?php echo $row['transportation'];?></h4></h4>
                       </div>
                       <div class="col-md-2">
                        <h4 ><img src="details/meals.png"  style="size: 25px;"><br><h4><?php echo $row['meals'];?></h4></h4>
                       </div>    
                     
            </div>
            </div>
            
            <!-- Add more tours if needed -->
        </div>
      </a>
    </section>

   <center><h1>details of activitys</h1></center>
    <div class="owl-carousel owl-theme">
    <?php if (!empty($row['d1img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d1img']; ?>"><h3><?php echo $row['day1']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d2img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d2img']; ?>"><h3><?php echo $row['day2']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d3img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d3img']; ?>"><h3><?php echo $row['day3']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d4img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d4img']; ?>"><h3><?php echo $row['day4']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d5img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d5img']; ?>"><h3><?php echo $row['day5']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d6img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d6img']; ?>"><h3><?php echo $row['day6']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d7img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d7img']; ?>"><h3><?php echo $row['day7']; ?></h3></div>
<?php endif; ?>

<?php if (!empty($row['d8img'])): ?>
    <div class="item"><img src="package/<?php echo $row['d8img']; ?>"><h3><?php echo $row['day8']; ?></h3></div>
<?php endif; ?>

    </div>



   

    <footer>
    
  <h2>Explorer</h2>
  <p style="text-align: center;">&copy; 2025 Explorer Tours and Travels. All rights reserved.</p>

       
    </footer>

    <?php    
}
?>
    
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
    <script type="text/javascript">




        $(document).ready(function(){
            var owl = $('.owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});

$('.item').on('mouseenter', function() {
    owl.trigger('stop.owl.autoplay');
});

$('.item').on('mouseover', function() {
    owl.trigger('play.owl.autoplay');
});



        });
    </script>
                
    </body>
</html>