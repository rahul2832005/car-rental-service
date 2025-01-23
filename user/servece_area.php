<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<title>Service Area</title>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: rgb(240, 219, 219);*/
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
            left: 25%;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px;
            margin-bottom: 50px;
            background-color: rgb(240, 219, 219);

        }

        .card {
            width: 325px;
            margin: 60px 25px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            height: 210px;
            border-radius: 8px;
            margin-bottom: 80px;
            /*overflow: hidden;*/
        }

        .card-header {
            margin-left: 10px;
            margin-top: 10px;
            padding: 8px 15px;
            /*background-color: #f0f0f0;*/
            /*text-align: center;*/
            font-weight: bold;
            color: #333;
            font-size: 20px;
        }

        .card-image {
            height: 210px;
            left: 24px;
            width: 225px;
            right: 19px;
            position: relative;
            top: 25px;
            height: 200px;
            /*overflow: hidden;*/
        }

        .card-image img {
            border-radius: 8px;
            width: 107%;
            height: 110%;
            /*object-fit: cover;*/
        }

        .service-area {
            display: flex;
            justify-content: center;
            padding: 10px;
            /* background-color: #f0f0f0;*/
            margin-bottom: 20px;
        }

        .service-area span {
            padding: 5px 10px;
            /*background-color:rgb(241, 220, 220);*/
            border-radius: 5px;
            font-weight: bold;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            background-color: rgb(240, 219, 219);
        }

        .header h1 {
            font-size: 26px;
            color: black;
        }

        .badge {
            background-color: white;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
            text-align: center;
            margin-top: 20px;
        }

        #map {
            align-items: center;
            width: 80%;
            height: 850px;
            margin-left: 150px;
        }

        .map {
            background-color: #fff;
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
            <h1>Service Area</h1>
        </div>
    </div>
    <div class="map">
        <h1 style="text-align:center;font-size:35px;color:black;margin-top:30px;">32 Location In the Country</h1>
        <img id="map" src="image/MapChart_Map.png" alt="" srcset="">
    </div>
    <div class="header">
        <span class="badge">SERVICE AREA</span>
        <h1 style="text-align:center;font-size:35px;">Top Places We Serve</h1>
    </div>
    <div class="container">

        <div class="card">
            <div class="card-header">Ahemdabad, Gujarat</div>
            <div class="card-image">
                <img src="image/ahemdabad.jpg" alt="New York">
            </div>
        </div>
        <div class="card">
            <div class="card-header">Udaipur, Rajasthan</div>
            <div class="card-image">
                <img src="image/udaiput.jpg" alt="Tokyo">
            </div>
        </div>

        <div class="card">
            <div class="card-header">Simla, Uttrakhand</div>
            <div class="card-image">
                <img src="image/simla.jpg" alt="Paris">
            </div>
        </div>

        <div class="card">
            <div class="card-header">Kochi, Kerla</div>
            <div class="card-image">
                <img src="image/kochi.jpg" alt="Tokyo">
            </div>
        </div>

        <div class="card">
            <div class="card-header">Mumbai, Maharashtra</div>
            <div class="card-image">
                <img src="image/mumbai.jpg" alt="Sydney">
            </div>
        </div>



        <div class="card">
            <div class="card-header">Agra, UttarPradesh</div>
            <div class="card-image">
                <img src="image/taj_mahal.jpg" alt="Tokyo">
            </div>
        </div>

        <div class="card">
            <div class="card-header">Kolkata, West Bengal</div>
            <div class="card-image">
                <img src="image/kolkata2.jpg" alt="Sydney">
            </div>
        </div>

        <div class="card">
            <div class="card-header">Guwahati, Aasam</div>
            <div class="card-image">
                <img src="image/guwahati.jpg" alt="Sydney">
            </div>
        </div>

    </div>

    <?php
    @include "footer.php";
    ?>
</body>

</html>