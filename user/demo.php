<?php
$index=0;
//@include "./connection.php";
$conn = mysqli_connect("localhost", "root", "", "car_rent");
    session_start();
    error_reporting(0);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Card</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            margin: 0;
        }

        .container{
            display: flex;
            flex-wrap: wrap;
        }
        .card {
            background-color: white;
            width: 263px;
            max-width: 1050px;
            border-radius: 10px;
            box-shadow: 0 4px 12px -5px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            padding: 20px;
            margin: 17px 16px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: -30px;
            margin-bottom: -25px;
        }

        .card-title {
            font-size: 25px;
            color: #333;
            font-weight: bold;
        }

        .icon {
            fill: #2563eb;
            cursor: pointer;
        }

        .card-image img {
            width: 290px;
            margin: 20px 0px;
            border-radius: 5px;
            margin-top: 0px;
            height: 280px;
            align-items: center;
            margin-left: -13px;
            margin-top: -12px;
        }

        .description {
            font-size: 0.875rem;
            color: #666;
            line-height: 1.5;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .price {
            font-size: 20px;
            color: #333;
            font-weight: bold;
        }

        .order-button {
            background-color: #2563eb;
            color: white;
            padding: 10px 15px;
            font-size: 0.875rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .order-button:hover {
            background-color: #1e40af;
        }
    </style>
</head>

<body>

    <div class="container">
    <?php

$select_car = mysqli_query($conn, "select * from car_list");
if (mysqli_num_rows($select_car) > 0) {
    while ($row = mysqli_fetch_array($select_car)) {
        $image=explode(",",$row['image']);
        //print_r($image); 
?>
    <div class="card">
        <div class="card-image">
            <img src="../admin/img/<?php echo $image[0] ?>">
        </div>

        <div class="card-header">
            <h3 class="card-title">Backlit Keyboard</h3>
        </div>

        <div class="card-body">
            <p class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor. Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Sed auctor.
            </p>

            <div class="card-footer">
                <h3 class="price">$12.90</h3> 
            </div>
            <button type="button" class="order-button">Order now</button>
        </div>
    </div>
    <?php
            };
        };
        ?>
    </div>
</body>

</html>