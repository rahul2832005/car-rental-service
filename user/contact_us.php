<?php
session_start();
// error_reporting(0);
@include "include/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    

    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'carolarental3@gmail.com'; // Your email
        $mail->Password = 'bojiwwvipmyipdqc'; // Your email password or App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('carolarental3@gmail.com'); // Your receiving email

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission - Car Rental Website';
        $mail->Body    = "<h4>Name:</h4> $name <br><h4>Email:</h4> $email <br><h4>Message:</h4> <p>$message</p>";

        $mail->send();
        echo 'Message has been sent successfully!';
        echo "<Script>alert('sent')</Script>";
        $sql="insert into contactusquery (username,Email,messages)values('$name','$email','$message')";
        $exsql=mysqli_query($conn,$sql);
        header("Location: contact_us.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        #bg_img {
            width: 100%;
            margin-top: 5px;
        }

        .banner-text {
            position: absolute;
            top: 180px;
            color: #fff;
            padding: 10px;
            font-size: 45px;
            left: 32%;

        }

        .banner-card {
            margin-bottom: 100px;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .header h1 {
            font-size: 35px;
            color: black;
        }

        .contact-container {
            text-align: center;
            padding: 50px 20px;
        }

        .contact-heading {
            font-size: 14px;
            color: #f55d7a;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .main-heading {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .contact-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .contact-card {
            margin-top: 80px;
            border: 1px solid #ffdddd;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .icon {
            background-color: #ff4d4d;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            position: relative;
            bottom: 74px;
            margin-bottom: 0px;
        }

        .icon img {
            width: 100px;
            height: 100px;
        }

        .contact-card h2 {
            font-size: 25px;
            margin-bottom: 10px;
            color: #333;
            margin-top: -30px;
        }

        .contact-card p {
            font-size: 17px;
            color: #666;
            margin: 5px 0;
        }

        .badge {
            background-color: #ffdddd;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .location {
            margin-top: 30px;
            text-align: center;
            margin-bottom: 20px;
        }

        iframe {
            border-radius: 5px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            /* background-color: #ffffff; */
            background-color: rgb(241, 235, 235);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            margin-right: 10px;
            height: 553px;
        }

        .heading {
            font-size: 28px;
            color: #333333;
            margin-bottom: 10px;
        }

        .subtext {
            font-size: 16px;
            color: #666666;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #333333;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-group input[type="email"]{
                width: 435px;
        }

        .form-group textarea {
            resize: vertical;
            height: 80px;
        }

        .submit-btn {
            background-color: #1d4ed8;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #1e40af;
        }

        
    </style>
</head>

<body>
    <?php
    @include "navbar.php";
    ?>
    <div class="banner-card">
        <img id="bg_img" src="image/contact_bg.jpg" alt="" srcset="">
        <div class="banner-text">
            <h1>Contact</h1>
        </div>
    </div>
    <div class="header">
        <span class="badge">CONTACT US</span>
 <!-- <h1 id="caption">Explore C</h1> -->
    </div>
    <div class="contact-container">
        <div class="contact-grid">
            <div class="contact-card">
                <div class="icon">
                    <img src="image/location.svg" alt="Location Icon">
                </div>
                <h2>Our Location</h2>
                <p>Paliyad Road,Opposite of Lotus Hotel,Botad-364710</p>
            </div>
            <div class="contact-card">
                <div class="icon">
                    <img src="image/email.svg" alt="Email Icon">
                </div>
                <h2>Email Address</h2>
                <p>rahulbavaliya153@gmail.com</p>
                <p>bhupatvatukiya123@gmail.com</p>

            </div>
            <div class="contact-card">
                <div class="icon">
                    <img src="image/phone.svg" alt="Phone Icon">
                </div>
                <h2>Phone Number</h2>
                <p>Emergency Cases</p>
                <p>+91 9824930580</p>
                <p>+91 7359509387</p>
            </div>
        </div>
        <div class="container">
            <div class="form-container">
                <h1 class="heading">Get in Touch with Us</h1>
                <p class="subtext">Have questions or need assistance? We are here to help you with all your car rental needs!</p>

                <form action="#" method="POST" class="form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email_show" value="<?php echo $_SESSION['alogin']; ?>" disabled>
                        <input type="hidden" name="email" value="<?php echo $_SESSION['alogin']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>


            </div>
            <div class="location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14780.908402544715!2d71.75972828726873!3d22.155425800135852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958d00f6c0348dd%3A0x7bf2837a0dbd4a4d!2sSalangpur%2C%20Gujarat%20382450!5e0!3m2!1sen!2sin!4v1737308652019!5m2!1sen!2sin" width="550" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>


    <?php
    @include "footer.php";
    ?>
</body>

</html>