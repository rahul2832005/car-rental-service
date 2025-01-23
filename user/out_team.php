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
            width: 125px;
            height: 150px;
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
            <h1 class="team-title">The Amazing Team Behind Our Company</h1>
            <div class="team-grid">
                <div class="team-member">
                    <img src="image/member1.png" alt="Alex Leeman">
                    <h3 class="name">Alex Leeman</h3>
                    <p>Director</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="red">

                    </div>
                </div>
                <div class="team-member">
                    <img src="image/member2.png" alt="Diago Johnson">
                    <h3 class="name">Diago Johnson</h3>
                    <p>Sales Manager</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <img src="image/member3.png" alt="Alex Leeman">
                    <h3 class="name">Alex Leeman</h3>
                    <p>Director</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="image/member4.png" alt="Diago Johnson">
                    <h3 class="name">Diago Johnson</h3>
                    <p>Sales Manager</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="team-member">
                    <img src="image/member5.png" alt="Alex Leeman">
                    <h3 class="name">Alex Leeman</h3>
                    <p>Director</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="team-member">
                    <img src="image/member6.png" alt="Diago Johnson">
                    <h3 class="name">Diago Johnson</h3>
                    <p>Sales Manager</p>
                    <div class="social-icons">
                        <a id="icon" href="#"><i class="fab fa-facebook"></i></a>
                        <a id="icon" href="#"><i class="fab fa-linkedin"></i></a>
                        <a id="icon" href="#"><i class="fab fa-twitter"></i></a>
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