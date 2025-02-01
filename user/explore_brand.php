<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>explore brand</title>
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        @font-face {
            font-family: 'pop-bold';
            src: url('../font/Poppins-Bold.ttf');
        }

        @font-face {
            font-family: 'pop-light';
            src: url('../font/Poppins-Light.ttf');
        }


        body {
            font-family:'pop-regular';
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .b-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 60px;
        }

        .b-card {
            width: 250px;
            height: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .b-card img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        .b-card h3 {
            margin-top: 10px;
            font-size: 16px;
        }

        .b-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            margin-left: 360px;
        }

        .b-header h1 {
            font-size: 30px;
            color: black;
        }

        .b-header button {
            background-color: #e0e0e0;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            margin-top: 10px;
            cursor: pointer;
            color: red;
        }

        /* .header button:hover {
            background-color: #e0e0e0;
        }*/

        #sedan_img {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        #suv_img {
            margin-bottom: 20px;
        }

        #tata {
            margin-top: 40px;
        }

        h3 {
            color: black;
        }

        .b-badge {
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

    <div class="b-header">
        <span class="b-badge">CAR BRANDS</span>
        <h1 id="b-caption">Explore Car Brands</h1>
    </div>
    <div class="b-container">

        <div class="b-card">
            <img src="image/mahindra_logo.jpg" alt="" srcset="">
            <h3>Mahindra</h3>
        </div>

        <div class="b-card">
            <img src="image/audi_logo.jpg" alt="" srcset="">
            <h3>Audi</h3>
        </div>

        <div class="b-card">
            <img src="image/bmw-logo.jpg" alt="" srcset="">
            <h3>BMW</h3>
        </div>

        <div class="b-card">
            <img src="image/tesla_logo.jpg" alt="" srcset="">
            <h3>Tesla Motors</h3>
        </div>

        <div class="b-card">
            <img src="image/volkswagon_logo.jpg" alt="" srcset="">
            <h3>Valkswagon</h3>
        </div>

        <div class="b-card">
            <img src="image/tata_logo.jpg" alt="" srcset="">
            <h3 id="tata">TATA</h3>
        </div>

    </div>
</body>

</html>