<?php  
    session_start();
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
        .location{
            margin-top: 30px;
            text-align: center;
            margin-bottom: 20px;
        }
        iframe{
            border-radius: 5px;
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
        <span class="badge">CAR TYPES</span>
        <h1 id="caption">Explore Car Types</h1>
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
        <div class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14780.908402544715!2d71.75972828726873!3d22.155425800135852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3958d00f6c0348dd%3A0x7bf2837a0dbd4a4d!2sSalangpur%2C%20Gujarat%20382450!5e0!3m2!1sen!2sin!4v1737308652019!5m2!1sen!2sin" width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
    

    <?php
    @include "footer.php";
    ?>
</body>

</html>