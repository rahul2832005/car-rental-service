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
    </style>
</head>

<body>
    <div class="header">
        <button>CAR TYPE</button>
        <h1>Explore Car</h1>

    </div>
    <div class="container">

        <div class="card">
            <img src="image/323-3232940_stock-j-a-used-hd-png-download.png" alt="" srcset="">
            <h3>Truck</h3>
        </div>

        <div class="card">
            <img id='sedan_img' src="image/sedan.jpg" alt="" srcset="">
            <h3 id='sedan'>Sedan</h3>
        </div>

        <div class="card">
            <img src="image/CAR-1-1024x622.png" alt="" srcset="">
            <h3>Luxury Sedan</h3>
        </div>

        <div class="card">
            <img src="image/2024_chrysler_pacifica_limited_0.jpg" alt="" srcset="">
            <h3>Hatchback</h3>
        </div>

        <div class="card">
            <img src="image/360_F_316843223_qMHZM53H0mknBgSEkMBejP4EtFV6zpeg.jpg" alt="" srcset="">
            <h3>Sport Car</h3>
        </div>

        <div class="card">
            <img id='suv_img' src="image/suv-santa-fe.jpg" alt="" srcset="">
            <h3>SUV</h3>
        </div>

    </div>
</body>

</html>