<?php
//@include "./connection.php";
$conn = mysqli_connect("localhost", "root", "", "car_rent");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car List</title>
    <link rel="stylesheet" href="dis_car_style.css" class="rel">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>

    <?php
    @include "explore_car.php"
    ?>
    <div class="header" id="header">
        <button>POPULAR CARS</button>
        <h1>Most Popular Car</h1>

    </div>

    <main>
        <?php

        $select_car = mysqli_query($conn, "select * from car_list");
        if (mysqli_num_rows($select_car) > 0) {
            while ($row = mysqli_fetch_array($select_car)) {
        ?>

                <div class="card">
                    <div class="image">
                        <img src="image/<?php echo $row['image']; ?>">
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
                    <button class="add">Rent Now</button>
                </div>
        <?php
            };
        };
        ?>
    </main>

    <?php
    @include "explore_brand.php";
    ?>

<?php
    @include "we_best.php";
    ?>

<?php
    @include "slider.php";
    ?>


<?php
@include "footer.php";
?>

</body>

</html>