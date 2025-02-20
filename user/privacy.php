<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            background-color: white;
            color: black;
            margin: 0;
            padding: 0;

        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
            color: black;
        }

        .topic {
            font-size: 24px;
            margin-bottom: 15px;
            color: black;
        }

        .p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
            color:#2a2424;
        }

        .section {
            margin-bottom: 30px;
        }

        #bg_img {
            width: 100%;
            margin-top: 5px;
        }

        .banner-text {
            position: absolute;
            top: 170px;
            color: #fff;
            padding: 10px;
            font-size: 45px;
            left: 29%;

        }
    </style>
</head>

<body>
<?php
@include "navbar.php";
?>
    <div class="banner-card">
        <img id="bg_img" src="image/our_team_bg1.png" alt="" srcset="">
        <div class="banner-text">
            <h1>About Us</h1>
        </div>
    </div>
    <div class="container">
        <h1 class="h1">PRIVACY POLICY</h1>
        <div class="section">
            <h2 class="topic">Personal Statement</h2>
            <p class="p">
                We are committed to creating a secure and user-friendly experience for every customer.
                To achieve this, we aim to be as clear as possible about all our policies, as is evident
                by our transparent Terms and Conditions.
            </p>
            <p class="p">
                When you visit our site, skillstwins.com, some of your personal information supplied during
                your order or by means of our cookies policy may be gathered.
            </p>
        </div>
        <div class="section">
            <h2 class="topic">What are ‘cookies’?</h2>
            <p class="p">
                Cookies are little text files that are stored within your browser’s cache. First and third-party
                cookies are used on this site for functionality, statistics, and advertising.
            </p>
        </div>
        <div class="section">
            <h2 class="topic">Why do we use cookies?</h2>
            <p class="p">
                There are specific cookies necessary for a website to function properly. Cookies is what keeps
                track of settings, thus allowing your shopping experience to be tailored to you
                (remembering your preferences or settings).
            </p>
            <p class="p">
                Cookies also gather data, for example, like the time of a session, viewed pages, or just general
                demographic information like age and gender. The information that is gathered can then be used
                for analytical purposes, allowing us to generate customized shopping experiences for our users.
                We do not use cookies that will track or identify you.
            </p>
        </div>
        <div class="section">
            <h2 class="topic">What information do we gather specifically?</h2>
            <p class="p">
                The information we gather is what you supply us with when signing up for a newsletter or
                making a purchase. This is usually demographic information like name, address, or general
                contact information. Cookies will also gather session information like the pages viewed,
                the amount of time spent in the session, transactions, and any other general demographic
                information (origin, gender, age).
            </p>
        </div>
        <div class="section">
            <h2 class="topic">What third-parties do we share your information with?</h2>
            <p class="p">
                Any information we gather is only shared with our affiliate partners for analytical reasons.
                We will not share your personal information past our brand and trusted brand partners.
            </p>
        </div>
        <div class="section">
            <h2 class="topic">Website Media</h2>
            <p class="p">
                We (skillstwins.com) own all media that is on this website, unless stated otherwise. All
                photography work is done by Dina Deykun (dinadeykun.com).
            </p>
        </div>
        <div class="section">
            <h2 class="topic">Disclosure of Your Information</h2>
            <p class="p">
                You have the right to request your data. If something is incorrect, you can have it altered or removed.
            </p>
            <p class="p">
                You can also disable cookies on your device by changing your browser’s settings. You have the option
                to use opt-out programs like “NAI’s Consumer opt-out” or “Google Analytics opt-out browser add-on.”
                These prevent cookies from being used in your browser. Know that if you do this, our site may not
                function properly.
            </p>
        </div>
        <div class="section">
            <h2 class="topic">Updates</h2>
            <p class="p">
                Our privacy policies are subject to change. All updates will appear on this page.
            </p>
        </div>
    </div>
</body>
<?php
@include "footer.php";
?>

</html>