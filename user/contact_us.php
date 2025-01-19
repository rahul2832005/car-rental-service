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
            width: 1119px;
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
                <p>Bhambhan Road,Ramdevnagar,Botad-364710</p>
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
    </div>

    <?php
    @include "footer.php";
    ?>
</body>

</html>