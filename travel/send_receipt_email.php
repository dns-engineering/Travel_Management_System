<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';







header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

try {
    $mail = new PHPMailer(true);
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@gmail.com'; // Replace with your email
    $mail->Password = 'your-app-password'; // Replace with your app-specific password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('your-email@gmail.com', 'Tour Booking');
    $mail->addAddress($data['email'], $data['customerName']);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Tour Booking Receipt - Confirmation';
    $mail->Body = "
        <h2>Tour Booking Confirmation</h2>
        <p>Dear {$data['customerName']},</p>
        <p>Thank you for your booking! Your payment has been successfully processed.</p>
        <h3>Booking Details:</h3>
        <p><strong>Booking ID:</strong> {$data['bookingId']}</p>
        <p><strong>Tour Name:</strong> {$data['tourName']}</p>
        <p><strong>Total Amount:</strong> Rs. {$data['totalPrice']}</p>
        <p><strong>Payment Method:</strong> " . ucfirst($data['paymentMethod']) . "</p>
        <p>Date: " . date('Y-m-d H:i:s') . "</p>
        <p>For any inquiries, please contact us at explorerxpro@gmail.com</p>
        <p>Best regards,<br>Tour Booking Team</p>
    ";

    $mail->send();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}