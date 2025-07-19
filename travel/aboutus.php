<?php
error_reporting(0);
require_once('confi.php');
session_start();
$un = $_SESSION['un'];
$id = $_GET['id'];
$query = "SELECT * FROM hollydays WHERE packname='$id' or country='$id'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Explorer</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-3Bs8yK8+KWnBUzYK0Stv3wZ2o3eRnkB5lh8At0kHbBfUG9IbA3lBVjA8JnC3Ayyj3ZlxS9ysaXkNjzvCsb6Jxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    /* Resetting default margin and padding */
    body, h1, h2, h3, h4, h5, h6, p, ul, li {
        margin: 0;
        padding: 0;
    }
    
    body {
    font-family: 'Montserrat', 'Poppins', sans-serif;
    background-image: url('img/MAINBG.jpg'); /* ✅ Corrected path */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
    color: #3d2b1f;
}

/* Dark overlay for contrast */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        135deg, 
        rgba(0, 0, 0, 0.9) 0%, 
        rgba(0, 0, 0, 0.85) 50%, 
        rgba(0, 0, 0, 0.8) 100%
    );
    z-index: -1;
    animation: subtleShift 20s ease infinite;
    pointer-events: none;
}

@keyframes subtleShift {
    0% { background-position: 0% 0%; }
    50% { background-position: 100% 100%; }
    100% { background-position: 0% 0%; }
}


    
    /* About Container Styles */
    .about-container {
        background: #f9f9f9;
        border-radius: 24px;
        padding: 45px 40px;
        width: 100%;
        max-width: 1200px;
        text-align: center;
        position: relative;
        margin-top: 120px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 0, 0, 0.2);
    }

    .about-container h1 {
        font-size: 32px;
        color: #3d2b1f;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 30px;
        letter-spacing: 2px;
        position: relative;
        display: inline-block;
        text-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .about-container p {
        font-size: 16px;
        color: #3d2b1f;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .icon-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin: 40px 0;
    }

    .icon {
        text-align: center;
    }

    .icon img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
        border: 2px solid #3d2b1f;
    }

    .service-item {
        margin: 20px 0;
    }

    .team-section {
        margin: 50px 0;
        padding: 30px;
        background: #f9f9f9;
        border-radius: 15px;
        text-align: center;
    }

    .team-cards {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 30px;
    }

    .team-card {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 0, 0, 0.2);
        max-width: 300px;
        text-align: center;
    }

    .team-card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .team-card h3 {
        color: #3d2b1f;
        font-size: 22px;
        margin-bottom: 10px;
    }

    .team-card p {
        font-size: 16px;
        color: #3d2b1f;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-links a {
        color: #3d2b1f;
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #000000;
    }

    .contact-section {
        margin: 50px 0;
        padding: 30px;
        background: #f9f9f9;
        border-radius: 15px;
    }

    .contact-section h2 {
        color: #3d2b1f;
        margin-bottom: 25px;
    }

    .contact-info {
        display: flex;
        justify-content: center;
        gap: 40px;
    }

    .contact-info div {
        text-align: center;
    }

    .contact-info i {
        font-size: 24px;
        color: #3d2b1f;
        margin-bottom: 10px;
    }

    .contact-info p {
        font-size: 16px;
        color: #3d2b1f;
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
    <div class="about-container">
    <div class="team-section">
            <h2>Our Team</h2>
            <div class="team-cards">
                <div class="team-card">
                    <img src="img\dhruv1.jpg" alt="Dhruv Sanghani">
                    <h3>DHRUV SANGHANI</h3>
                    <p>Project Head</p>
                    
                       
                </div>
                <div class="team-card">
                    <img src="img\manav.jpg" alt="Manav Shah">
                    <h3>MANAV SHAH</h3>
                    <p>Seminar Head</p>
                    
                    
                </div>
                <div class="team-card">
                    <img src="img\pratik.jpg" alt="Pratik Dhonde">
                    <h3>PRATIK DHONDE</h3>
                    <p>Operator</p>
                    
                    
                </div>
            </div>
        </div>
        <h1>About Us</h1>
        <p>
            At Explorer, we're dedicated to crafting transformative travel experiences that ignite the spirit of adventure. With personalized itineraries tailored to your preferences and led by experienced guides, we ensure each journey is authentic and unforgettable. Our commitment to excellence and passion for exploration sets us apart, guaranteeing every moment with Explorer is filled with discovery, connection, and wonder.
        </p>

        <h2>Why Choose Us?</h2>
        <div class="icon-container">
            <div class="icon">
                <img src="details/experience.png" alt="Better Travel Experience Icon">
                <p>Better Travel Experience</p>
            </div>
            <div class="icon">
                <img src="details/tours.png" alt="Better Tours Icon">
                <p>Better Tours</p>
            </div>
            <div class="icon">
                <img src="details/stay.png" alt="Best Hotel Stay Icon">
                <p>Best Hotel Stay</p>
            </div>
            <div class="icon">
                <img src="details/travel-itinerary.png" alt="Best Location Icon">
                <p>Best Location</p>
            </div>
        </div>

        <h2>Our Services</h2>
        <div class="service-item">
            <h3>Personalized Itineraries</h3>
            <p>We create custom travel plans tailored to your interests and preferences, ensuring a unique and memorable experience.</p>
        </div>
        <div class="service-item">
            <h3>Experienced Guides</h3>
            <p>Our knowledgeable and passionate guides lead you through every step of your journey, sharing insights and stories that bring each destination to life.</p>
        </div>
        <div class="service-item">
            <h3>Quality Accommodation</h3>
            <p>We partner with top-rated hotels and resorts to provide you with comfortable and luxurious stays.</p>
        </div>
        <div class="service-item">
            <h3>Adventure Activities</h3>
            <p>From hiking and snorkeling to cultural tours and culinary experiences, we offer a wide range of activities to suit every traveler.</p>
        </div>
        <div class="service-item">
            <h3>Customer Support</h3>
            <p>Our dedicated support team is available 24/7 to assist you with any inquiries or issues, ensuring a smooth and hassle-free trip.</p>
        </div>

        <div class="contact-section">
            <h2>Contact Us</h2>
            <div class="contact-info">
                
                <div>
                    <i class="fas fa-envelope"></i>
                    <p style="text-align: center; padding: 10px;">
  <a href="mailto:info@explorer.com" style="color: #1565c0; text-decoration: none; font-weight: bold;">
    info@explorer.com
  </a>
</p>

                </div>
                
            </div>
        </div>
    </div>

    <script>
        // Mobile Hamburger Menu
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        const dropdowns = document.querySelectorAll('.dropdown');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });

        // Dropdown functionality for mobile
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', () => {
                dropdown.classList.toggle('active');
            });
        });

        // Star background effect
        document.addEventListener('DOMContentLoaded', function() {
            const starsContainer = document.createElement('div');
            starsContainer.className = 'stars';
            document.body.appendChild(starsContainer);

            const starCount = 100;
            
            for (let i = 0; i < starCount; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                
                const left = Math.floor(Math.random() * 100);
                const top = Math.floor(Math.random() * 100);
                const duration = 3 + Math.random() * 7 + 's';
                const opacity = 0.1 + Math.random() * 0.7;
                
                star.style.left = left + '%';
                star.style.top = top + '%';
                star.style.setProperty('--duration', duration);
                star.style.setProperty('--opacity', opacity);
                
                starsContainer.appendChild(star);
            }
        });
    </script>
</body>
</html>