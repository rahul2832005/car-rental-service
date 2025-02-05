<?php
session_start();
require 'vendor/autoload.php'; // If using Composer

@include "/wamp64/www/projects/rental/car-rental-service/user/include/config.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // Generate a secure token

    // Check if email exists using prepared statement
    $stmt = $conn->prepare("SELECT uid FROM reguser WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Store token securely in database

        $stmt = $conn->prepare("UPDATE reguser SET reset_token = ?, reset_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        // Send Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change to your SMTP provider
            $mail->SMTPAuth = true;
            $mail->Username = 'carolarental3@gmail.com';
            $mail->Password = 'slwrclbveudzqlag';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('carolarental3@gmail.com', 'CarOla');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "
            Welcome To Carola. <br>
            This is is Link For Forgot Password Of your Account Of Carola.com. 
            <br>
            <br>
            If You Forgot PassWord Then Click 
             <a href='http://localhost/projects/rental/car-rental-service/user/forgot/reset_password.php?token=$token'>ResetPassword</a>  to reset your password.<br>
            <br>
            If you Cannot Send Request  Then Report To Carola.com. 
            <br>
            <br>
            <h2>Thank You</h2>
            ";

            $mail->send();
            echo "<script>alert('Password reset email sent!');window.location.href='../login.php';</script>";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('No user found with this email!');window.open('forgot_password.php','_self');</script>";
    }
}
