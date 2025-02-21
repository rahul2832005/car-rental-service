<?php
session_start();
@include "include/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Container */
        .container {
            max-width: 1200px;
            width: 90%;
            text-align: center;
            margin-left: 55px;
            margin-bottom: 50px;
        }

        /* Header */
        header {
            margin-top: 25px;
            margin-bottom: 20px;
        }

        .details {
            font-size: 18px;
            font-weight: bold;

            color: #ff4d4d;
            text-transform: uppercase;
            padding: 10px 10px;


        }

        .head {
            font-size: 32px;
            margin-top: 10px;
            color: #333;
        }

        /* Categories */
        .categories {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }

        .categories button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
            cursor: pointer;
            font-size: 16px;
        }

        /* .categories button.active, */
        .categories button:hover {
            background-color: #f54256;
            color: white;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            background-color: #fff;
        }

        .card {
            overflow: hidden;
            border-radius: 10px;

        }

        .card img {
            width: 100%;
            height: 350;
            display: block;


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
            left: 33%;
        }

        .badge {
            background-color: #e0e0e0;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    @include "navbar.php";
    ?>



    <div class="banner-card">
        <img id="bg_img" src="image/service_area_bg.png" alt="" srcset="">
        <div class="banner-text">
            <h1>Gallery</h1>
        </div>
    </div>
    <div class="container">
        <header>
            <span class="badge">GALLERY</span>
            <h1 class="head">Planning A Trip Should Be</h1>
        </header>
 
            <nav class="categories">
                <a href="all.php" target="gallery"><button name="all">All</button></a>
                <a href="truck.php" target="gallery"><button name="truck">Truck</button></a>
                <a href="luxury.php" target="gallery"><button name="luxury">Luxury Sedan</button></a>
                <a href="sedan.php" target="gallery"><button name="sedan">Sedan</button></a>
                <a href="sport.php" target="gallery"><button name="sport">Sports Car</button></a>
                <a href="hatchback.php" target="gallery"><button name="hatchback">Hatchback</button></a>
            </nav>
        

        <iframe src="all.php" frameborder="0" width="100%" height="800px" name="gallery"></iframe>

    </div>

    <?php
    @include "footer.php";
    ?>
</body>

</html>