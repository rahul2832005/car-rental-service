<?php
@include "include/config.php";
$res = $sql1 = $row1 = $re = "";


$brand=$_POST['brand'];
$fual=$_POST['fual'];

$sql="select * from car_list  where  fual='$fual' && brand='$brand'";
$ex=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .card-content p {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }

        .card-content .price {
            font-size: 20px;
            color: #000;
            font-weight: bold;
        }

        .card-content .details {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card-content .details:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .card {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <?php 
    while($row=mysqli_fetch_assoc($ex))
    {
        $image=explode(",",$row['image']);
    ?>

<div class="card">
        <img src="../admin/img/<?php echo $image[0] ?>" alt="Car Image">
        <div class="card-content">
            <h2>Maruti Suzuki Wagon R</h2>
            <p class="price">$500 Per Day</p>
            <p>5 seats</p>
            <p>2019 model</p>
            <p>Petrol</p>
            <a href="#" class="details">View Details</a>
        </div>
    </div>
<?php } ?>
</body>
</html>