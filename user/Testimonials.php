<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Testimonials</title>
    <style>
        /* styles.css */
        body {
            font-family:sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .testimonials {
            text-align: center;
            padding: 50px 20px;
        }

        .section-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #222;
        }

        .testimonial-card {
            background: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            text-align: left;
        }

        .testimonial-header {
            display: flex;
            /* align-items: center; */
            margin-bottom: 15px;
        }

        .avatar {
            width: 70px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .name-and-stars {
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .name {
            color: black;
            margin: 0;
            font-size: 23px;
            font-weight: bold;
        }

        .role {
            margin: 0;
            color: #777;
            font-size: 18px;
            line-height: 29px;
        }

        .testimonial-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .stars {
            color: #f5c518;
            font-size: 27px;
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
            left: 23%;

        }

        .badge {
            background-color: #ffdddd;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 25px;
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
            <h1>Testimonials</h1>
        </div>

        <section class="testimonials">
            <span class="badge">TESTIMONIALS</span>
            <h2 class="section-title">Love From Clients</h2>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="image/member1.png" alt="Atalia Helena" class="avatar">
                    <div>
                        <div class="name-and-stars">
                            <h3 class="name">Atalia Helena</h3>
                            <span class="stars">★★★★★</span>
                        </div>
                        <p class="role">UI Designer</p>
                    </div>
                </div>
                <p class="testimonial-text">“Smooth and Painless! Carola made my car rental experience hassle-free. The vehicle was clean, the paperwork was minimal, and the return process was quick.”</p>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="image/member2.png" alt="William Brandon" class="avatar">
                    <div>
                        <div class="name-and-stars">
                            <h3 class="name">William Brandon</h3>
                            <span class="stars">★★★★★</span>
                        </div>
                        <p class="role">App Developer</p>
                    </div>
                </div>
                <p class="testimonial-text">“Great Value for Money! I rented a car from Carola, and I was pleasantly surprised by the value for money. The rates were competitive, and the quality.”</p>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="image/member6.png" alt="Atalia Helena" class="avatar">
                    <div>
                        <div class="name-and-stars">
                            <h3 class="name">wade Warren</h3>
                            <span class="stars">★★★★★</span>
                        </div>
                        <p class="role">Medical Assistant</p>
                    </div>
                </div>
                <p class="testimonial-text">“Seamless Booking and Pickup! I rented a car from Carola,and the process was incredibly smooth.The online
                    booking systen is user-friendly.”</p>
            </div>

           
        </section>
</body>
<?php
@include "footer.php";
?>

</html>