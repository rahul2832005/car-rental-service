<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Fleet</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular', sans-serif;
            background-color: #b1d7d6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search-container {
            text-align: center; /* Center the input within the container */
            margin: 20px auto; /* Center the container itself */
            width: 100%; /* Make sure the container takes full width */
            max-width: 600px; /* Limit the maximum width of the search box */
        }

        .search-container input {
            width: 100%; /* Input takes full width of its container */
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }


        .fleet {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: #b1d7d6;
        }

        .card {
            background-color: #fff;
            width: 309px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            transition: transform 0.3s;
            text-align: center;
            color: #333;
        }

        /* .card:hover {
            transform: scale(1.05);
        } */

        .card img {
            width: 296px;
            height: 285px;
            /* object-fit: cover; */
            border-radius: 10px;
            margin-top: -15px;
            margin-left: -13px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .description {
            font-size: 14px;
            color: #666;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }
       
        .order-button {
            background-color:#fff;
            color: #000;
            padding: 5px 15px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            width: 100%;
            text-decoration: none;
            font-size: 24px;
            transition: background 0.3s;
        }

        .order-button:hover {
            background-color: rgb(224, 45, 60);
            color: #fff;
        }

        #header {
            margin-top: 10px;
            /* background-color: #b1d7d6; */
            width: 100%;
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

        .badge {
            background-color: rgb(214, 191, 191);
            color: #ff4d4d;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 14px;
            padding-left: 20px;
            width: 127px;
        }

        @media (max-width: 768px) {
            .fleet {
                flex-direction: column;
                align-items: center;
            }
        }
       
    </style>
</head>

<?php
@include "navbar.php";
?>

<body style="background-color: #b1d7d6;">

<div class="search-container">
        <input type="text" id="search" placeholder="Search cars..." onkeyup="searchCars()">
    </div>
    <div class="fleet" id="fleet-container">
        
        <div class="header" id="header">
            <span class="badge">CAR FLEET</span>
            <h1>Car Fleet-1</h1>
        </div>
        <?php
        @include "include/config.php";
        $select_car = mysqli_query($conn, "SELECT * FROM car_list");
        if (mysqli_num_rows($select_car) > 0) {
            while ($row = mysqli_fetch_array($select_car)) {
                $image = explode(",", $row['image']);
        ?>
                <div class="card" data-name="<?php echo strtolower($row['cname']); ?>">
                    <img src="../admin/img/<?php echo $image[0] ?>" alt="Car Image">
                    <h2 class="card-title"> <?php echo $row['cname']; ?> </h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h3 class="price"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['price']; ?>/-</h3>
                    <h3 class="capacity"><i class="fa-solid fa-car"></i> Capacity: <?php echo $row['seat']; ?></h3>
                    <h3 class="fual"><i class="fa-solid fa-gas-pump"></i> Fuel: <?php echo $row['fual']; ?></h3>
                    <div>
                        <?php if ($_SESSION["alogin"]) { ?>
                            <a href="car_detail.php?vid=<?php echo $row['vid']; ?>" class="order-button">Rent Now</a>
                        <?php } else { ?>
                            <a href="login.php" class="order-button">Login For Book</a>
                        <?php } ?>
                    </div>
                </div>
        <?php
            }
        }
        ?>


    </div>

    <?php
    @include "footer.php";
    ?>

    <script>
        function searchCars() {
            let input = document.getElementById("search").value.toLowerCase();
            let cards = document.querySelectorAll(".card");

            cards.forEach(card => {
                let name = card.getAttribute("data-name");
                if (name.includes(input)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>