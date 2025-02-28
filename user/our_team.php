<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ot team</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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
            left: 28%;

        }

        .team-section {
            text-align: center;
            padding: 50px 20px;
        }

        .team-title {
            font-size: 2rem;
            margin-bottom: 40px;
            color: black;
        }

        .team-grid {
            display: flex;
           flex-wrap: wrap;
           justify-content: center;
            gap: 30px;
            padding: 0 10%;
        }

        .team-member {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            padding: 40px;
            text-align: center;
            margin-bottom: 25px;
        }

        .team-member img {
            border-radius: 50%;
            width: 145px;
            height: 175px;
            margin-bottom: 15px;
        }

        .name {
            font-size: 1.2rem;
            margin: 10px 0;
            color: black;
        }

        .team-member p {
            color: #777;
            margin-bottom: 15px;
        }

        .social-icons #icon {
            color: #555;
            margin: 0 5px;
            text-decoration: none;
            font-size: 24px;
            color: black;
            border-radius: 50%;

        }

        .social-icons a:hover {
            color: red;
            transition: all 0.5s;
        }
        .red{
            background-color: red;
            position: relative;
        }
    </style>
</head>
<?php
@include "navbar.php";
?>

<body>
    <div class="banner-card">
        <img id="bg_img" src="image/our_team_bg1.png" alt="" srcset="">
        <div class="banner-text">
            <h1>Our Team</h1>
        </div>
        <section class="team-section">
            <h1 class="team-title">The Amazing Team Behind Our Development</h1>
            <div class="team-grid">
                <div class="team-member">
                    <img src="image/rahul2.jpg" alt="Rahul Bavaliya">
                    <h3 class="name">Rahul Bavaliya</h3>
                    <p>UI/UX Designer</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/1Bm1XPsV1s/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/rahul-bavaliya-aa8624346?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/rahulbavaliya153?igsh=MTRpc3lsc2J6cHA2cg=="><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="red">

                    </div>
                </div>
                <div class="team-member">
                    <img src="image/bm1.jpg" alt="Bhupat Vatukiya">
                    <h3 class="name">Bhupat Vatukiya</h3>
                    <p>Project Manager</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/1DZhVVJhkB/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/bhupat-vatukiya-806979266?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/bhupatvatukiya?igsh=YjF1cmdmMHl1anp0"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <img src="image/hardik.jpg" alt="Hardik Vatukiya">
                    <h3 class="name">Hardik Vatukiya</h3>
                    <p>Senior Developer</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/1FT3rsm65L/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/hardik-vatukiya-30b53423a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/hardik_vatukiya_07?igsh=NngwaG44Z3NsNnFu"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="image/harsh.png" alt="Harsh Kavaiya">
                    <h3 class="name">Harsh Kavaiya</h3>
                    <p>Senior Designer</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/1ZMntQAc4a/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/harsh-kavaiya?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/harsh_kavaiya_8989?igsh=ODM5dWl6czc0eXh3"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <img src="image/mohit1.jpg" alt="Mohit Chavda">
                    <h3 class="name">Mohit Chavda</h3>
                    <p>QA Tester</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/15ZPsTyzWc/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/mohit-chavda-6b56b72b9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/mohit_chavda902?igsh=MWhsNTA2bmFsNWluMw=="><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="image/hiren.png" alt="Hiren Lakum">
                    <h3 class="name">Hiren Lakum</h3>
                    <p>Security Specialist</p>
                    <div class="social-icons">
                        <a id="icon" href="https://www.facebook.com/share/1BuaJexczb/"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="https://www.linkedin.com/in/hiren-lakum-607a4830b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="https://www.instagram.com/hiren_lakum9?igsh=N2RqZGxmczkxeDBs"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </section>
        <?php
        @include "footer.php";
        ?>
</body>


</html>