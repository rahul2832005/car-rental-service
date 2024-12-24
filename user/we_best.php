<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driving Service Features</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
        }

        .containers {
            margin: 40px auto;
            max-width: 1100px;
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

        .header #caption {
            font-size: 1.rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #000;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 70px;
            flex-wrap: wrap;
        }

        .cards {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 20px;
            width: 350px;
            text-align: left;
            transition: transform 0.3s;
        }

        .cards:hover {
            transform: translateY(-5px);
        }

        #i {
            border: 1px solid black;
            font-size: 55px;
            margin: 10px 10px;
            padding: 15px 15px;
            border-radius: 8px;
            color: #000;
        }

        .cards h3 {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #000;
        }

        .cards p {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.5;
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
    </style>
</head>

<body>
    <div class="containers">
        <div class="header">
            <span class="badge">WE ARE THE BEST</span>
            <h1 id="caption">Explore The World With Your Own Way Of Driving</h1>
        </div>
        <div class="features">
            <div class="cards">
                <div class="icon">
                    <i id="i" class="fa-solid fa-location-dot"></i>
                </div>
                <h3>Free Pick Up & Drop</h3>
                <p>Your convenience matter. Complimentary pick-up and drop-off service for any
                    your vehicle, a stress-free experience.</p>
            </div>
            <div class="cards">
                <div class="icon">
                    <i id="i" class="fa-solid fa-users"></i>
                </div>
                <h3>24/7 Road Assistant</h3>
                <p>No matter the time or place, and our 24/7 roadside assistance ensures you're
                    never stranded. Drive confidently with support.</p>
            </div>
        </div>
    </div>
</body>

</html>