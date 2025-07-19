<?php

error_reporting(0);

require_once('confi.php');
session_start();
$un = $_SESSION['un'];
$query="SELECT * FROM global ";
$result = mysqli_query($con,$query);

?>
<html>
    <head>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="bootstrap.min.css">
      
</head>
    <style>
       
            
            
      .x img{
            height: 300px;
            width: 400px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: transform 0.2s ease-in-out;
            }
        .y{
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: 50px;
            margin-left: 50px;
            border-style:inset;
            height: 200px;
            width: 400px;
            position:;
            
            border-width: 0.5px;
            position: relative;
              overflow: hidden;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .content{
              color:black;
              background:white ;
              position: absolute;
              top: 0px;;
              left:-100%;
              height: 100%;
                width: 100%;
               
                padding: 20px;
                box-sizing: border-box;
                transition: all 0.5s;
                opacity: 0.5;
        }
        .y:hover .content{
              left:0;
              margin-left: 0px;
              margin-bottom: 25px;
              
                height: 350px;
            width: 450px;
              
            }
            img:hover{
              transform: scale(1.2);
            }
     .x{
margin-right:100px;
margin-left:100px;
     }
     h3{
        color:black;
        font-style: italic;
        font-family: cursive;
        font-weight: bold;
     }
        h1{
            color: darkolivegreen;
            font-style: initial;
            font-family: monospace;
            font-weight: bolder;
            font-display: swap;
            font-stretch:wider;
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

        <center><h1>INTERNATIONAL TOURS</h1></center>
        <div class="x">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-sm-4 animate-on-scroll" data-aos="zoom-in">
                <div class="y animate__animated animate__bounce">
                    <a href="hollyday.php?id=<?php echo $row['name'];?>">
                        <img style="height: 100%;" src="global/<?php echo $row['img'];?>" class="img-responsive" alt="">
                        <center><h4><?php echo $row['name'];?></h4></center>
                        <div class="content">
                            <center><h3 style="margin-top: 70px;"><?php echo $row['name'];?></h3></center>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
            
    <script>
    // Function to check if an element is in the viewport with an offset
    function isInViewport(element, offset) {
        var rect = element.getBoundingClientRect();
        var windowHeight = window.innerHeight || document.documentElement.clientHeight;
        return (
            rect.top >= -offset &&
            rect.left >= -offset &&
            rect.bottom <= (windowHeight + offset) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) + offset
        );
    }

    // Function to handle scroll animation
    function handleScrollAnimation() {
        var animatedElements = document.querySelectorAll('.animate-on-scroll');
        var offset = 100; // Adjust this value to set the desired offset
        animatedElements.forEach(function(element) {
            if (isInViewport(element, offset) && !element.classList.contains('animated')) {
                element.classList.add('animate__animated', 'animate__bounce', 'animated');
                element.style.visibility = 'visible';
            }
        });
    }

    // Attach scroll event listener
    window.addEventListener('scroll', function() {
        handleScrollAnimation();
    });

    // Initial check for elements in viewport on page load
    handleScrollAnimation();
</script>


    </body>
</html>