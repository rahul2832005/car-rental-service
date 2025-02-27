<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    die("Database connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    
    // Check if the email exists in the database
    $result = mysqli_query($conn, "SELECT * FROM reguser WHERE email='$email'");
    if (mysqli_num_rows($result) > 0) {
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $_SESSION["otp"] = $otp;
        $_SESSION["email"] = $email;
        $_SESSION["otp_expire"] = time() + 300; // OTP expires in 5 minutes

        $sql="update reguser set reset_otp=$otp where  email='$email'";
        $exsql=mysqli_query($conn,$sql);

        // Send OTP using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // SMTP Server Configuration
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server (use your provider's)
            $mail->SMTPAuth   = true;
            $mail->Username   = 'carolarental3@gmail.com'; // Your email
            $mail->Password   = 'bojiwwvipmyipdqc'; // Your email password or app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Email Content
            $mail->setFrom('no-reply@Carola.com', 'Carola Support');
            $mail->addAddress($email);
            $mail->Subject = "Password Reset OTP";
            $mail->Body    = "Your OTP for password reset is: $otp\n\nThis OTP will expire in 5 minutes.";

            $mail->send();
            echo  "<script>alert('OTP sent To Your Email.');</script>";
            header("location:verify_otp.php");
            
        } catch (Exception $e) {
            echo "Error sending OTP: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('No user found with this email!');window.open('forgot_password.php','_self');</script>";
    }
}
?>
