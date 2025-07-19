<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Login</title>
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
    justify-content: center;
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
}

@keyframes subtleShift {
    0% { background-position: 0% 0%; }
    50% { background-position: 100% 100%; }
    100% { background-position: 0% 0%; }
}

.login-form {
    background: #ffffff;
    border-radius: 24px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    padding: 45px 40px;
    width: 100%;
    max-width: 450px;
    text-align: center;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(0, 0, 0, 0.2);
    animation: formAppear 1s cubic-bezier(0.26, 0.53, 0.74, 1.48);
    overflow: hidden;
    z-index: 1;
}

/* Glowing border effect */
.login-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 8px;
    background: linear-gradient(90deg, #3d2b1f, #f9f9f9, #ffffff, #3d2b1f);
    background-size: 300% 300%;
    animation: gradientBorder 6s ease infinite;
    z-index: 2;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
}

@keyframes gradientBorder {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Decorative corner accents */
.corner-accent {
    position: absolute;
    width: 120px;
    height: 120px;
    z-index: -1;
}

.corner-accent.top-left {
    top: -60px;
    left: -60px;
    background: radial-gradient(circle, rgba(0, 0, 0, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
}

.corner-accent.bottom-right {
    bottom: -60px;
    right: -60px;
    background: radial-gradient(circle, rgba(0, 0, 0, 0.15) 0%, rgba(0, 0, 0, 0) 70%);
}

@keyframes formAppear {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
}

.login-form h1 {
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

.login-form h1::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 4px;
    background: #3d2b1f;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.form-icon {
    margin-bottom: 25px;
    font-size: 60px;
    color: #3d2b1f;
    animation: iconFloat 3s ease-in-out infinite;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.input-group {
    margin-bottom: 25px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    text-align: left;
}

.input-group label {
    font-size: 14px;
    color: #3d2b1f;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: color 0.3s;
    display: flex;
    align-items: center;
}

.input-group label::before {
    content: '';
    display: inline-block;
    width: 8px;
    height: 8px;
    background: #3d2b1f;
    margin-right: 8px;
    border-radius: 50%;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

.input-wrapper {
    position: relative;
    width: 85%;
}

.input-wrapper input {
    width: 100%;
    padding: 16px 20px 16px 50px;
    border: 2px solid #3d2b1f;
    border-radius: 12px;
    font-size: 16px;
    font-family: 'Montserrat', sans-serif;
    outline: none;
    background: #f9f9f9;
    transition: all 0.3s ease;
    color: #3d2b1f;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.input-wrapper i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #3d2b1f;
    font-size: 20px;
    transition: all 0.3s ease;
}

.input-wrapper input:focus {
    border-color: #3d2b1f;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    background: #ffffff;
    transform: translateY(-2px);
}

.input-wrapper input:focus + i {
    color: #3d2b1f;
    transform: translateY(-50%) scale(1.1);
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
}

.input-wrapper input::placeholder {
    color: #8888a0;
    font-size: 14px;
    opacity: 0.7;
}

/* Glow effect on input focus */
.input-wrapper::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: #3d2b1f;
    transition: width 0.4s ease;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.input-wrapper:focus-within::after {
    width: 100%;
}

.submit-button {
    background: #3d2b1f;
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 18px;
    width: 100%;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    text-transform: uppercase;
    margin-top: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    letter-spacing: 1.5px;
    position: relative;
    overflow: hidden;
    z-index: 1;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.submit-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2), 0 0 15px rgba(0, 0, 0, 0.1);
    letter-spacing: 2px;
}

.submit-button i {
    margin-left: 10px;
    font-size: 16px;
    animation: arrowPulse 1.5s infinite;
    vertical-align: middle;
}

@keyframes arrowPulse {
    0% { transform: translateX(0); }
    50% { transform: translateX(5px); }
    100% { transform: translateX(0); }
}

.bottom-links {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 0 5px;
}

.bottom-links a {
    color: #3d2b1f;
    text-decoration: none;
    font-size: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    padding: 5px 0;
}

.bottom-links a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 0;
    background: #3d2b1f;
    transition: width 0.3s ease;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

.bottom-links a:hover {
    color:#3d2b1f;
    transform: translateY(-2px);
    text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
}

.bottom-links a:hover::after {
    width: 100%;
}

/* Floating travel elements with glow effect */

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(5deg); }
}

@keyframes twinkle {
    0% { opacity: var(--opacity); }
    50% { opacity: 0.2; }
    100% { opacity: var(--opacity); }
}

/* Responsive adjustments */
@media (max-width: 480px) {
    .login-form {
        padding: 35px 25px;
        max-width: 85%;
    }
    .login-form h1 {
        font-size: 26px;
    }
    .form-icon {
        font-size: 50px;
    }
}
</style>
</head>
<body>
    <!-- Starry background effect -->
    
    <form class="login-form" action="login1.php" method="POST">
        <!-- Decorative corner accents -->
        <div class="corner-accent top-left"></div>
        <div class="corner-accent bottom-right"></div>

        <!-- Animated travel icon -->
        <div class="form-icon">
            <i class="fas fa-globe-americas"></i>
        </div>

        <h1>Travel Login</h1>
        
        <div class="input-group">
            <label for="username">Username</label>
            <div class="input-wrapper">
                <input id="username" type="text" name="un" placeholder="Enter your username" required>
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <input id="password" type="password" name="pass" placeholder="Enter your password" required>
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <button type="submit" class="submit-button" name="login">Login <i class="fa fa-arrow-right"></i></button>
        <div class="bottom-links">
            <a href="register.php">Sign Up</a>
            <a href="send_otp.php">Forgot Password?</a>
        </div>
    </form>

    
</body>
</html>