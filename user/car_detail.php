<?php
//@include "./connection.php";
$conn = mysqli_connect("localhost", "root", "", "car_rent");
session_start();
error_reporting(0);
$sdate=date('Y-m-d');
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
    
        $avlquery = "select * from booking where '$fdate' between date(FromDate) AND date(ToDate) AND vid=$vid";
        $exavlquery = mysqli_query($conn, $avlquery);
       
        $row = mysqli_num_rows($exavlquery);
        if ($row == 0) {
            $sql="insert into booking (bookingno,userEmail,vid,FromDate,ToDate,message,status) values($bookingno,'$useremail',$vid,'$fdate','$tdate','$message',$status);";
            $ex=mysqli_query($conn,$sql);
            if($ex)
            {
                echo "<script>alert('Booking Done');</script>";
                
                
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

    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/car_details.css">
    
    
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
    <div class="image-showcase">
        <div class="main-image">
        <img src="../admin/img/<?php echo $image[0]; ?>" alt="Not ">
        </div>
        <div class="side-images">
        <img src="/project/car-rental-service/admin/img/<?php echo $image[1]; ?>" alt="Car Interior Front">
        <img src="../admin/img/<?php echo $image[2]; ?>" alt="Car Interior Back">
        </div>
    </div>
    <div class="car-details">
       
       <h1 class="car-title"><?php echo $row['name']; ?></h1>
       <div class="car-info">
           <div class="car-info-item">
               <img src="../admin/img/capacity.png" alt="Seat Capacity Icon">
               
               <span><?php echo $row['seat'] ?>   People</span>
           </div>
           <div class="car-info-item">
               <img src="../admin/img/capacity.png" alt="Doors Icon">
               <span><?php echo $row['door'] ?> Doors</span>
           </div>
           <div class="car-info-item">
               <img src="/admin/img/capacity.png" alt="Fuel Tank Icon">
               <span><?php echo $row['fual_capacity'] ?> Liters</span>
           </div>
           <div class="car-info-item">
               <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/capacity.png" alt="Fuel Type Icon">
               <span><?php echo $row['fual'] ?></span>
           </div>
           <div class="car-info-item">
               <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/capacity.png" alt="Mileage Icon">
               <span><?php echo $row['mileage'] ?> Kmpl</span>
           </div>
           <div class="car-info-item">
               <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/capacity.png" alt="Engine Type Icon">
               <span><?php echo $row['en_type'] ?></span>
           </div>
           <div class="car-info-item">
               <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/capacity.png" alt="Brake Type Icon">
               <span><?php echo $row['break_type'] ?></span>
           </div>
           <div class="car-info-item">
               <img src="/projects/git_test/7-1/car-rental-service-main/admin/img/capacity.png" alt="Engine Power Icon">
               <span><?php echo $row['en_power'] ?></span>
           </div>
       </div>
       <button type="submit" id="button">Rent Now</button>
   </div>
   </div>
    <?php  
    }
    ?>

    <div class="pop-up">
        <div class="book-container">
            <img src="image/c.png" alt="not-found" class="close">
            <h2>Book Now</h2>
            <form method="post">
                From Date :<br>
                <input type="date" id="from-date" placeholder="dd-mm-yyyy" name="fdate" value="<?php echo $fdate; ?>" min="<?php  echo $sdate; ?>"; required>
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