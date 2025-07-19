<?php
session_start(); // Start or resume the session

// Verify OTP
if (isset($_POST['verify_otp'])) {
    // Get the entered OTP from the form
    $enteredOTP = isset($_POST['otp']) ? $_POST['otp'] : '';

    // Get the stored OTP from the session
    $storedOTP = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    // Get the email from the form or URL parameter
    $email = isset($_POST['email']) ? $_POST['email'] : (isset($_GET['email']) ? $_GET['email'] : '');
    
    // Verify the entered OTP
    if ($enteredOTP == $storedOTP) {
        // OTP verification successful
        // Redirect to updatepass.php with email id
        if (!empty($email)) {
            header("Location: updatepass.php?email=" . urlencode($email));
            exit(); // Make sure to stop execution after redirection
        }
    } else {
        // OTP verification failed
        $verificationResult = 'OTP verification failed. Please try again.';
    }

    // Clear the OTP from the session after verification
    unset($_SESSION['otp']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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

    body::before {
        content: '';
        position: fixed;
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

    .container {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        padding: 45px 40px;
        width: 100%;
        max-width: 700px;
        text-align: center;
        position: relative;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 0, 0, 0.2);
        animation: formAppear 1s cubic-bezier(0.26, 0.53, 0.74, 1.48);
        overflow: hidden;
        z-index: 1;
    }

    @keyframes formAppear {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .container h1 {
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

    .container h1::after {
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

    .input-group {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        gap: 8px;
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
        width: 100%;
    }

    .input-wrapper input {
        width: 100%;
        padding: 16px 20px;
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

    p {
        margin-top: 20px;
        font-size: 16px;
        color: #3d2b1f;
    }
</style>
</head>
<body>

<div class="container">
    <?php
    // Display the OTP verification result
    if (isset($verificationResult)) {
        echo '<p>' . $verificationResult . '</p>';
    } else {
        // Display the OTP input form
        $email = isset($_GET['email']) ? $_GET['email'] : '';
        ?>
        <form method="post" action="verify_otp.php">
            <div class="input-group">
                <label for="otp">Enter OTP:</label>
                <div class="input-wrapper">
                    <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"> <!-- Add hidden field to pass email -->
            <button type="submit" name="verify_otp" class="submit-button">Verify OTP <i class="fa fa-check"></i></button>
        </form>
        <?php
    }
    ?>
</div>

</body>
</html>
