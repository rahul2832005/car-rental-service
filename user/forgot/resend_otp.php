<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    die("Database connection failed");
}

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $otp = rand(100000, 999999); // Generate new OTP

    $_SESSION["otp"] = $otp;
    $_SESSION["otp_expire"] = time() + 300; // Reset expiration (5 minutes)

    // PHPMailer Configuration
    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // SMTP server (Use your mail provider's SMTP)
        $mail->SMTPAuth   = true;
        $mail->Username   = 'carolarental3@gmail.com'; // Your email
        $mail->Password   = 'bojiwwvipmyipdqc'; // Your email app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Content
        $mail->setFrom('your-email@gmail.com', 'Carola Support'); // Sender
        $mail->addAddress($email); // Receiver
        $mail->Subject = "Resend OTP for Password Reset";
        $mail->Body    = "Your new OTP is: $otp. It will expire in 5 minutes.";

        $mail->send();
        echo "<script>alert('New OTP sent to your email.'); window.location='verify_otp.php';</script>";
        $sql="update reguser set reset_otp=$otp where  email='$email'";
        $exsql=mysqli_query($conn,$sql);
    } catch (Exception $e) {
        echo "<script>alert('Failed to send OTP: " . $mail->ErrorInfo . "'); window.location='verify_otp.php';</script>";
    }
} else {
    echo "<script>alert('Session expired! Please request a new OTP.'); window.location='send_otp.php';</script>";
}
?>
