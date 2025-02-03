<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            color: black;
            display: flex;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .car-image {
            flex: 1;
            text-align: center;
        }

        .car-image img {
            width: 100%;
            border-radius: 10px;
            height: 363px;
        }

        .thumbnail-gallery {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .thumbnail-gallery img {
            width: 140px;
            height: 120px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .car-info {
            flex: 1;
            padding-left: 20px;
        }

        h1 {
            margin-top: 0px;
            font-size: 29px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .price span {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
        }

        .description {
            font-size: 15px;
            margin-bottom: 20px;
        }

        /* ul {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        } */


        .specifications h3,
        .color-options h3 {
            margin-top: 30px;
            font-size: 22px;
            margin-bottom: 10px;
        }

        /* .specifications ul {
            list-style: none;
            padding: 0;
        } */

        /* .specifications li {
            font-size: 18px;
            margin-bottom: 5px;
        } */

        #button {
            margin-top: 40px;
            color: black;
            background: white;
            border: 2px solid black;
            font-size: 28px;
            height: 47px;
            width: 390px;
            border-radius: 6px;
            position: sticky;
        }

        tbody {
            display: grid;
            gap: 20px;
        }
        #col2{
            padding-left: 45px;
        }
    </style>
</head>
<?php
@include "navbar.php";
?>

<body>

    <div class="container">
        <div class="car-image">
            <img src="image/rahul.jpg" alt="Vanguard CX2 Convertible" id="mainImg">
            <div class="thumbnail-gallery">
                <img src="image/rahul.jpg" alt="Car Thumbnail" id="thumb1">
                <img src="image/ahemdabad.jpg" alt="Car Thumbnail" id="thumb2">
                <img src="image/guwahati.jpg" alt="Car Thumbnail" id="thumb3">
            </div>
        </div>

        <div class="car-info">
            <h1>Vanguard CX2 Convertible</h1>
            <p class="price">Starting at <span>$59/day</span></p>
            <p class="description">
                Elevate your journey with the Ford Mustang Convertible, the epitome of American
                muscle and open-air excitement.
            </p>

            <div class="specifications">
                <h3>Specifications</h3>
                <table>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>

                </table>
                <!-- <ul style="display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            list-style: none;
            padding: 0;">
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> Convertible</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> Automatic</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 5.0-liter V8</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 4 Passengers</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 4 Passengers</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                </ul> -->
            </div>
            <button type="submit" id="button">Rent Now</button>
        </div>
    </div>
    <?php
    @include "footer.php";
    ?>
    <script>
        mainImg = document.getElementById('mainImg');

        thumb1 = document.getElementById('thumb1');
        thumb1src = document.getElementById('thumb1').src;
        thumb2 = document.getElementById('thumb2');
        thumb2src = document.getElementById('thumb2').src;
        thumb3 = document.getElementById('thumb3');
        thumb3src = document.getElementById('thumb3').src;

        thumb1.addEventListener("click", function() {
            mainImg.src = thumb1src;
        })

        thumb2.addEventListener("click", function() {
            mainImg.src = thumb2src;
        })

        thumb3.addEventListener("click", function() {
            mainImg.src = thumb3src;
        })
    </script>
</body>

</html>