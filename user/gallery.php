<?php

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    echo "not";
}

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
            height: auto;
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
            <span class="badge">DETAILS</span>
            <h1 class="head">Planning A Trip Should Be</h1>
        </header>
        <form action="" method="post">
            <nav class="categories">
                <button name="all">All</button>
                <button name="truck">Truck</button>
                <button name="luxury">Luxury Sedan</button>
                <button name="sedan">Sedan</button>
                <button name="sport">Sports Car</button>
                <button name="hatchback">Hatchback</button>
            </nav>
        </form>

        <section class="gallery">
            
                        <div class='card'>
                        <img src='/car%20rental%20service/admin/gallery/gallery_1.jpg'/>
                        </div>

                        <div class='card'>
                        <img src='/car%20rental%20service/admin/gallery/gallery_1.jpg'/>
                        </div>

                        <div class='card'>
                        <img src='/car%20rental%20service/admin/gallery/gallery_1.jpg'/>
                        </div>

                        <div class='card'>
                        <img src='/car%20rental%20service/admin/gallery/gallery_1.jpg'/>
                        </div>

                        <div class='card'>
                        <img src='/car%20rental%20service/admin/gallery/gallery_1.jpg'/>
                        </div>
                    
              
        </section>

    </div>

    <?php
    @include "footer.php";
    ?>
</body>

</html>