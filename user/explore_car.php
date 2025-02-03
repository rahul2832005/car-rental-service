<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>explore car</title>
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

        .c-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .c-card {
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

        .c-card img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        .c-card h3 {
            margin-top: 10px;
            font-size: 16px;
        }

        .c-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            /* margin-left: 384px; */
        }

        .c-header h1 {
            font-size: 26px;
            color: black;
        }

        .c-header button {
            background-color: #e0e0e0;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            margin-top: 10px;
            cursor: pointer;
            color: red;
        }

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
        h3{
            color: black;
        }
        .c-badge {
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
<div class="c-header">
            <span class="c-badge">CAR TYPES</span>
            <h1 id="c-caption">Explore Car Types</h1>
        </div>
    <div class="c-container">

        <div class="c-card">
            <img src="image/truck.png" alt="" srcset="">
            <h3>Truck</h3>
        </div>

        <div class="c-card">
            <img id='sedan_img' src="image/sedan.jpg" alt="" srcset="">
            <h3 id='sedan'>Sedan</h3>
        </div>

        <div class="c-card">
            <img src="image/luxury_sedan.png" alt="" srcset="">
            <h3>Luxury Sedan</h3>
        </div>

        <div class="c-card">
            <img src="image/hatchback.jpg" alt="" srcset="">
            <h3>Hatchback</h3>
        </div>

        <div class="c-card">
            <img src="image/sport_car.jpg" alt="" srcset="">
            <h3>Sport Car</h3>
        </div>

        <div class="c-card">
            <img id='suv_img' src="image/suv.jpg" alt="" srcset="">
            <h3>SUV</h3>
        </div>

    </div>
</body>

</html>