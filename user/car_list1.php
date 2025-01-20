<?php
$index = 0;
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
    <title>Car List</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        * {
            padding: 0%;
            margin: 0%;
            box-sizing: border-box;

        }

        body {
            /*background-color: #48d1cc;*/
            font-family: Arial, sans-serif;
            font-size: 62.5%;
            width: 100%;
        }

        main {
            background-color: #b1d7d6;
            max-width: 1500px;
            width: 100%;
            margin: 30% auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;
        }

        main .card {
            max-width: 295px;
            flex: 1 1 210px;
            text-align: center;
            height: 640px;
            /*border: 1.5px solid black;*/
            margin: 20px;
            border-radius: 10px;
            background-color: white;
        }

        main .card .image {
            height: 50%;
            width: 300px;
            margin-bottom: 20px;
        }

        main .card .image img {
            width: 93%;
            height: 100%;
            object-fit: fill;
            border-radius: 10px;
            margin: 7px 2px;
            transition: transform 0.8s;
            margin-left: -4px;
        }

        img:hover {
            transform: scale();
        }

        main .card .caption {
            padding-left: 1em;
            text-align: left;
            line-height: 2em;
            height: 25%;
            font-weight: bold;
            color: black;

        }

        .badge {
            background-color: #ddbebe;
            color: #ff4d4d;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 14px;
        }

        /*.card:hover{
    background-color: #f63a40;
    transition: 0.6s all;
}*/


        #rate {
            color: gold;
            margin-right: 3px;
            font-size: 20px;
            margin-bottom: 20px;
        }

        #car_name {
            font-size: 30px;
            margin-bottom: 20px;
            margin-top: 10px;
            font-family: Lucida Sans Unicode;
        }

        .content {
            font-size: 15px;
            color: #1c1d1d;
        }

        .rate {
            font-size: 20px;
        }

        .hr {
            margin-right: 5px;
        }

        .seat {
            font-size: 17px;
            margin-bottom: 13px;
            margin-top: 13px;
            color: #1c1d1d;
        }

        .price {
            font-size: 20px;
            margin-bottom: 10px;
            margin-top: 13px;
            color: #1c1d1d;
        }

        .fual {
            font-size: 17px;
            margin-bottom: 10px;
            color: #1c1d1d;
        }


        main .card a {
            font-size: 23px;
            color: black;
            width: 50%;
        }


        main .card button {
            border: 1px solid black;
            font-size: 23px;
            width: 95%;
            cursor: pointer;
            margin-top: 95px;
            /* font-weight: bold; */
            position: relative;
            margin-left: 1px;
            /* background-color:rgb(199, 46, 46); */
            border-radius: 4px;
            font-family: Lucida Sans Unicode;
            margin-bottom: 10px;
            color: rgb(22, 20, 21);

        }

        .add {
            background-color: #fff;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;


        }

        .header h1 {
            font-size: 35px;
            margin-bottom: 15px;
            color: black;
        }

        .header button {
            background-color: #e0e0e0;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            margin-top: 10px;
            cursor: pointer;
            color: red;
            font-size: 17px;
            font-family: sans-serif;
            margin-bottom: 15px;
        }

        /*.header button:hover {
    background-color: #e0e0e0;
}*/
        #header {
            margin-top: 10px;
            background-color: #b1d7d6;
            width: 100%;
        }
    </style>
</head>
<?php
@include "navbar.php";
?>

<body>

    <div class="header" id="header">
        <span class="badge">CAR LIST</span>
        <h1>Car Fleet-1</h1>

    </div>
    <main>
        <?php

        $select_car = mysqli_query($conn, "select * from car_list");
        if (mysqli_num_rows($select_car) > 0) {
            while ($row = mysqli_fetch_array($select_car)) {
                $image = explode(",", $row['image']);
                //print_r($image); 
        ?>
                <div class="card">
                    <div class="image">

                        <a href="car_detail.php?id=<?php echo $row['id']; ?>"><img src="/car%20rental%20service/admin/img/<?php echo $image[0]; ?>"></a>
                        <!-- <img src="/car%20rental%20service/admin/img/"> -->
                    </div>
                    <div class="caption">
                        <p class="rate">
                            <i id="rate" class="fa-solid fa-star"></i>
                            <i id="rate" class="fa-solid fa-star"></i>
                            <i id="rate" class="fa-solid fa-star"></i>
                            <i id="rate" class="fa-solid fa-star"></i>
                            <i id="rate" class="fa-solid fa-star"></i>
                        </p>
                        <p id="car_name"><?php echo $row['name']; ?></p>
                        <p class="content">Lorem ipsum dolor sit amet dfds sdf sdf consectetur adipisicing el</p>
                        <p class="price"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['price']; ?>/-</p>
                        <hr class="hr">
                        <p class="seat"><i class="fa-solid fa-car"></i> Capacity:<?php echo $row['seat']; ?> People</p>
                        <p class="fual"><i class="fa-solid fa-gas-pump"></i> Fual:<?php echo $row['fual']; ?></p>


                    </div>
                    <?php if ($_SESSION["alogin"]) { ?>
                        <button class="add" type="submit" name="rent-now"><a href="car_detail.php?id=<?php echo $row['id']; ?>" class="button">Rent Now</a></button>
                    <?php } else { ?>

                        <button class="add"><a href="login.php" class="button">Login For Book</a></button>
                    <?php } ?>
                </div>


        <?php
            };
        };
        ?>
    </main>

    <?php
    @include "footer.php";
    ?>

</body>

</html>