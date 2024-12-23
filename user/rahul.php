<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanguard CX2 Convertible</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .car-card {
            display: flex;
            flex-direction: row;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            overflow: hidden;
        }

        .car-image img {
            width: 97%;
            height: 421px;
            margin-top: 14px;
            margin-left: 10px;
        }

        .car-details {
            padding: 20px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
        }

        .price span {
            color: #e63946;
        }

        .description {
            font-size: 14px;
            margin: 15px 0;
            line-height: 1.5;
        }

        .booking {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .decrease,
        .increase {
            background-color: #e0e0e0;
        }

        .book-now {
            background-color: #e63946;
            color: #fff;
        }

        .specifications {
            margin-top: 20px;
        }

        .specifications ul {
            list-style: none;
            padding: 0;
            font-size: 14px;
        }

        .colors {
            margin-top: 20px;
        }

        .color-options {
            display: flex;
            gap: 10px;
        }

        .color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #ccc;
        }

        .color.red {
            background-color: red;
        }

        .color.white {
            background-color: white;
            border: 1px solid #000;
        }

        .color.black {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="car-card">
        <div class="car-image">
            <img src="image/wp10875074.jpg" alt="Vanguard CX2 Convertible">
        </div>


        <div class="car-details">
            <h1>Vanguard CX2 Convertible</h1>
            <p class="price">Starting at <span>$59/day</span></p>
            <p class="description">
                Elevate your journey with the Ford Mustang Convertible, the epitome of American
                muscle and open-air excitement.
                Feel the wind in your hair as you experience the power, style, and iconic allure of this
                classic masterpiece.
                Cruise with confidence, top down.
            </p>
            <div class="booking">
                <button class="decrease">-</button>
                <span class="quantity">1</span>
                <button class="increase">+</button>
                <button class="book-now">Book Now</button>
            </div>
            <div class="specifications">
                <h2>Specifications</h2>
                <ul>
                    <li>Convertible</li>
                    <li>Automatic</li>
                    <li>5.0-liter V8</li>
                    <li>450 HP</li>
                    <li>4 passengers</li>
                </ul>
            </div>

            <div class="colors">
                <h2>In Color</h2>
                <div class="color-options">
                    <span class="color red"></span>
                    <span class="color white"></span>
                    <span class="color black"></span>
                </div>
            </div>
        </div>

    </div>
</body>

</html>