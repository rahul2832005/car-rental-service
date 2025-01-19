<?php
//@include "./connection.php";
$conn = mysqli_connect("localhost", "root", "", "car_rent");
session_start();
error_reporting(0);
$fdate = $tdate = $message = $er = $ms = $td = $fd = "";
$vid = $_GET['id'];

if (isset($_POST['Book'])) {
    $count = 0;
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    $message = $_POST['message'];
    $useremail = $_SESSION['alogin'];
    
    $status = 0;
    $bookingno = mt_rand(1000000, 999999999);
    if ($fdate == "") {
        $fd = "Select From Date";
        $count++;
    }
    if ($tdate == "") {
        $td = "Select To Date";
        $count++;
    }
    if ($message == "") {
        $ms = "Write Message";
        $count++;
    }
    
        $avlquery = "select * from booking where '$fdate' between date(FromDate) AND date(ToDate)
        OR '$tdate' BETWEEN date(FromDate) AND date(ToDate) and vid=$vid";
        $exavlquery = mysqli_query($conn, $avlquery);

        $row = mysqli_num_rows($exavlquery);
        if ($row == 0) {
            $sql="insert into booking (bookingno,userEmail,vid,FromDate,ToDate,message,status) values($bookingno,'$useremail',$vid,'$fdate','$tdate','$message',$status);";
            $ex=mysqli_query($conn,$sql);
            if($ex)
            {
                echo "<script>alert('Booking Done');</script>";
                echo "<script type='text/javascript'> document.location = 'car_details.php'; </script>";
            }
            else
            {
                echo "<script>alert('Something Wrong');</script>";
            }
        }
         else
          {
            echo "<script>alert('Car  Already Booked');</script>";
            echo "<script type='text/javascript'> document.location = 'dis_car.php'; </script>";
          }
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanguard CX2 Convertible</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/car_details_container2.css">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/car_details_container1.css">
    <style>

    </style>
</head>
<script>
    if(window.history.replaceState)
{
    window.history.replaceState(null,null,window.location.href);
}
</script>
<body>

    <div>
        <?php include('navbar.php'); ?>
    </div>
    <?php
    $query = "select * from car_list where id=$vid";
    $exquery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($exquery)) {
        $image = explode(",", $row['image']);

    ?>
        <div class="container">
            <div class="product-images">
                <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/<?php echo $image[0]; ?>" alt="Vanguard CX2 Convertible" class="main-image">
                <div class="thumbnail-container">
                    <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/<?php echo $image[1]; ?>" alt="Side view" class="thumbnail">
                    <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/<?php echo $image[2]; ?>" alt="Front view" class="thumbnail">
                    <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/<?php echo $image[3]; ?>" alt="Rear view" class="thumbnail">
                </div>
            </div>

            <div class="product-infor">
                <h1 class="product-title"><?php echo $row['name']; ?></h1>
                <div class="price">
                    <span>STARTING AT</span><br>
                    <?php echo $row['price']; ?>
                </div>

                <p class="description">Elevate your journey with the Ford Mustang Convertible, the epitome of American muscle and open-air excitement.',
                    'specs</p>

                <div class="specifications">
                    <h1>SPECIFICATIONS</h1>
                    <div class="specs-grid">

                        <div class="spec-item">
                            <i class="fa-solid fa-car" id="icon"></i>
                            <span><?php echo $row['seat']; ?> people</span>

                        </div>

                        <div class="spec-item">
                            <i class="fa-solid fa-car" id="icon"></i>
                            <span>4 people</span>

                        </div>

                        <div class="spec-item">
                            <i class="fa-solid fa-car" id="icon"></i>
                            <span>4 people</span>

                        </div>

                        <div class="spec-item">
                            <i class="fa-solid fa-car" id="icon"></i>
                            <span>4 people</span>

                        </div>

                        <div class="spec-item">
                            <i class="fa-solid fa-car" id="icon"></i>
                            <span>4 people</span>

                        </div>

                    </div>
                </div>
                <button type="submit" id="button">Rent Now</button>
            </div>

        </div>


    <?php
    };

    ?>
    <div class="container2">
        <div class="product-info">

            <table>
                <tr>
                    <th style="background-color: gray;" colspan="2">Accessories</th>
                </tr>
                <tr>
                    <th>Air Conditioner</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>AntiLock Braking System</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Power Steering</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Central Locking</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Power Door Locks</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Driver Airbag</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Passenger Airbag</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>Crash Sensor</th>
                    <td>✔</td>
                </tr>
                <tr>
                    <th>CD Player</th>
                    <td>✔</td>
                </tr>
            </table>
        </div>
        <div class="review-section">
            <div class="review-header">Reviews (10)</div>
            <div class="rating-summary">
                <div class="rating-row">
                    <span class="rating-label">5.0</span>
                    <div class="progress-bar">
                        <span style="width: 66%;"></span>
                    </div>
                    <span class="rating-percentage">66%</span>
                </div>
                <div class="rating-row">
                    <span class="rating-label">4.0</span>
                    <div class="progress-bar">
                        <span style="width: 33%;"></span>
                    </div>
                    <span class="rating-percentage">33%</span>
                </div>
                <div class="rating-row">
                    <span class="rating-label">3.0</span>
                    <div class="progress-bar">
                        <span style="width: 16%;"></span>
                    </div>
                    <span class="rating-percentage">16%</span>
                </div>
                <div class="rating-row">
                    <span class="rating-label">2.0</span>
                    <div class="progress-bar">
                        <span style="width: 8%;"></span>
                    </div>
                    <span class="rating-percentage">8%</span>
                </div>
                <div class="rating-row">
                    <span class="rating-label">1.0</span>
                    <div class="progress-bar">
                        <span style="width: 6%;"></span>
                    </div>
                    <span class="rating-percentage">6%</span>
                </div>
            </div>
            <div class="review-item">
                <img src="image/member1.png" alt="User" class="review-avatar">
                <div class="review-content">
                    <div>
                        <span class="name">John Doe</span>
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                        <span class="time">2 mins ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <a href="#" class="read-more">Read all reviews</a>
        </div>
    </div>


    <div class="pop-up">
        <div class="book-container">
            <img src="image/c.png" alt="not-found" class="close">
            <h2>Book Now</h2>
            <form method="post">
                From Date :<br>
                <input type="date" id="from-date" placeholder="dd-mm-yyyy" name="fdate" value="<?php echo $fdate; ?>" required>
                <p style="color: red;"><?php echo $fd; ?></p>
                To Date:<br>
                <input type="date" id="to-date" placeholder="dd-mm-yyyy" name="tdate" value="<?php echo $tdate; ?>" required>
                <p style="color: red;"><?php echo $td; ?></p>
                Message :<br>
                <textarea id="message" name="message" value="<?php echo $message; ?>" required></textarea>
                <p style="color: red;"><?php echo $ms; ?></p>
                <button type="submit" name="Book">Book</button>
            </form>
        </div>
    </div>

    <div>

        <?php include('footer.php'); ?>

    </div>

    <script>
        document.getElementById("button").addEventListener('click', function() {
            document.querySelector(".pop-up").style.display = "flex";
        })

        document.querySelector(".close").addEventListener('click', function() {
            document.querySelector(".pop-up").style.display = "none";
        })
    </script>


</body>

</html>