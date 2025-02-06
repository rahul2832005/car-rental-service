<?php
session_start();
require 'vendor/autoload.php'; // If using Composer
@include "include/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $no = mysqli_real_escape_string($conn, $_POST["no"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = $_POST["pass"]; // Securely hash the password
    $token = bin2hex(random_bytes(50)); // Generate a random token

    // Check if email already exists
    $stmt = "SELECT * FROM reguser WHERE email = '$email'";
    $exstmt = mysqli_query($conn, $stmt);
    
    if (mysqli_num_rows($exstmt) > 0) {
        echo "<script>alert('Email already exists!');window.location.href='register.php';</script>";
        exit;
    }

    // Insert user into database
    $stmt1 = "INSERT INTO reguser (name, mnumber, email, password, token) VALUES ('$fname', '$no', '$email', '$pass', '$token')";
    $exstmt1 = mysqli_query($conn, $stmt1);

    if ($exstmt1) {
        // Send Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'carolarental3@gmail.com';
            $mail->Password = 'slwrclbveudzqlag'; // Use an app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('carolarental3@gmail.com', 'CarOla');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verify Your Email';
            $mail->Body    = "
                Welcome to CarOla! <br>
                Click the link below to verify your account: <br>
                <a href='http://localhost/projects/rental/car-rental-service/user/verify_user.php?token=$token&email=$email'>Verify Email</a> 
                <br><br>
                If you did not request this, please ignore this email.
                <br><br>
                <h2>Thank You!</h2>
            ";

            $mail->send();
            echo "<script>alert('Verification Link Sent To Your Email!');window.location.href='login.php';</script>";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Registration failed!');window.location.href='register.php';</script>";
    }
}
?>
