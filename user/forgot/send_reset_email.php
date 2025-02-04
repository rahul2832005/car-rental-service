<?php
session_start();
require 'vendor/autoload.php'; // If using Composer

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // Generate a secure token

    // Check if email exists
    $stmt = $conn->prepare("SELECT uid FROM reguser WHERE email = '$email'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Store token in database securely
        $stmt = $conn->prepare("UPDATE reguser SET reset_token='$token', reset_expiry=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email='$result'");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change to your SMTP provider
            $mail->SMTPAuth = true;
            $mail->Username = 'bhupatvatukiya1@gmail.com'; 
            $mail->Password = 'mmpgclswujzrheps'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('bhupatvatukiya1@gmail.com', 'Car Rental Service'); 
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click <a href='http://localhost/projects/rental/car-rental-service/user/forgot/reset_password.php?token=$token'>here</a> to reset your password.";

            $mail->send();
            echo "Password reset email sent!";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No user found with this email!";
    }
}
?>
