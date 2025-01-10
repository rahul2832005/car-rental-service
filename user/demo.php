<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;

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

        .badge {
            background-color: #ffdddd;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .work {
            margin-top: -40px;
            display: flex;
            justify-content: center;
        }

        .one {
            padding: 10px 50px;
            text-align: center;
        }

        i {
            background-color: blue;
            padding: 28px 25px;
            border-radius: 17px;
            font-size: 30px;
        }

        .number {
            background-color: blue;
            left: -31px;
            margin: 19px;
            font-size: 25px;
            border-radius: 50%;
            padding: 3px 3px;
            border: 3px solid white;
            position: relative;
            top: 47px
        }
    </style>
</head>

<body>
    <div class="header">
        <span class="badge">CAR TYPES</span>
        <h1 id="caption">Explore Car Types</h1>
    </div>
    <div class="work">
        <div class="one">
            <p class="number">1</p>
            <i class="fa-solid fa-user"></i>

        </div>
        <!-- <p>sign up account </p> -->

        <div class="one">
            <p class="number">2</p>
            <i class="fa-solid fa-user"></i>

        </div>
        <!-- <p> search your vehicle</p> -->

        <div class="one">
            <p class="number">3</p>
            <i class="fa-solid fa-user"></i>

        </div>
        <!-- <p>pay the car rent</p> -->

        <div class="one">
            <p class="number">4</p>
            <i class="fa-solid fa-user"></i>

        </div>
        <!-- <p>take car to road</p> -->
    </div>
</body>

</html>