<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


include "../confi.php";


$mail = new PHPMailer(true);
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']); // Prevent SQL injection

    // Update booking status
    $query = "UPDATE `book` SET `status`='confirm by admin' WHERE `id`='$id'";
    $data = mysqli_query($con, $query);

    if ($data) {
        // Fetch booking details for email
        $bookingQuery = "SELECT * FROM book WHERE id = '$id'";
        $bookingResult = mysqli_query($con, $bookingQuery);
        $booking = mysqli_fetch_assoc($bookingResult);

        // Email configuration
        $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'explorerxpro@gmail.com'; // Your Gmail address
    $mail->Password = 'jihz pijq uxav yfnb'; // Your Gmail password or App Password
    $mail->SMTPSecure = 'ssl'; // Use 'ssl' instead of 'tls'
    $mail->Port = 465; // Change port to 465 for 'ssl'

        // Recipient and content
        $mail->setFrom('noreply@example.com', 'Explorer');
        $mail->addAddress($booking['email'], $booking['user']);
        $mail->Subject = 'Booking Confirmed';
        $mail->Body = "
        <h3>Booking Confirmed!</h3>
        <p>Dear {$booking['user']},</p>
        <p>Your booking for '{$booking['tourname']}' has been confirmed by our admin.</p>
        <p>Booking ID: {$booking['id']}</p>
        <p>Date: {$booking['bookingdate']}</p>
        <p>Here are the details of your booking:</p>
        <ul>
            <li><strong>Tour Name:</strong> {$booking['tourname']}</li>
            <li><strong>Booking ID:</strong> {$booking['id']}</li>
            <li><strong>Tour Date:</strong> {$booking['tourdate']}</li>
            <li><strong>Tour Duration:</strong> {$booking['tourduration']}</li>
            <li><strong>Total Price:</strong> {$booking['totalPrice']}</li>
            <li><strong>Number of People:</strong> {$booking['noofpeople']}</li>
            <li><strong>Primary Contact Name:</strong> {$booking['person1']}</li>
            <li><strong>Email:</strong> {$booking['email']}</li>
            <li><strong>Phone:</strong> {$booking['phone']}</li>
          
        </ul>
        <p>We are excited to have you join us on this adventure! </p>
        <p>If you have any questions or need further assistance, feel free to contact our customer support at support@example.com or call us at +123-456-7890.</p>
        <p>Thank you for choosing us! We look forward to making your experience unforgettable.</p>
        <p>Best regards,</p>
        <p>The Explorer Team</p>
    ";
        $mail->isHTML(true);

        // Send email
        if ($mail->send()) {
            // Redirect to booking details page
            echo '<script>
                window.location = "bookingdetail.php";
            </script>';
        } else {
            // Show error message but still redirect
            echo '<script>
                alert("Failed to send confirmation email: ' . $mail->ErrorInfo . '");
                window.location = "bookingdetail.php";
            </script>';
        }
    } else {
        echo '<script>
            alert("Failed to confirm booking: ' . mysqli_error($con) . '");
            window.location = "bookingdetail.php";
        </script>';
    }
}
?>