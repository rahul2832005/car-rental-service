<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 60px;
        }

        .card {
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

        .card img {
            width: 100%;
            height: auto;
            cursor: pointer;
        }

        .card h3 {
            margin-top: 10px;
            font-size: 16px;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .header h1 {
            font-size: 26px;
            color: black;
        }

        .header button {
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
        #tata{
            margin-top: 40px;
        }
    </style>
</head>

<body>  

    <div class="header">
        <button>CAR TYPE</button>
        <h1>Explore Premium Car Brands</h1>

    </div>
    <div class="container">

        <div class="card">
            <img src="image/IMG_20241217_090325.jpg" alt="" srcset="">
            <h3>Mahindra</h3>
        </div>

        <div class="card">
            <img src="image/IMG_20241215_113115.jpg" alt="" srcset="">
            <h3>Audi</h3>
        </div>

        <div class="card">
            <img src="image/bmw-logo-1997.jpg" alt="" srcset="">
            <h3>BMW</h3>
        </div>

        <div class="card">
            <img src="image/IMG_20241215_103254.jpg" alt="" srcset="">
            <h3>Tesla Motors</h3>
        </div>

        <div class="card">
            <img src="image/0d8db9612e8fd50d09a152935ba34ec6.jpg" alt="" srcset="">
            <h3>Valkswagon</h3>
        </div>

        <div class="card">
            <img src="image/IMG_20241217_090341.jpg" alt="" srcset="">
            <h3 id="tata">TATA</h3>
        </div>

    </div>
</body>

</html>