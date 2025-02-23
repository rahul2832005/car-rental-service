<?php  
session_start();
    @include "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dashstyle.css">
</head>
<body>
      <!-- Main Content -->
      <main class="main-content">
            <header class="header">
                <h1>Dashboard</h1>
                <div class="account">
                    
                <span><a href="logout.php" style="text-decoration: none;"> Account</a></span>
                </div>
            </header>
            <section class="dashboard-cards">
                <?php  
                $sql="select * from reguser";
                $ex=mysqli_query($conn,$sql);

                $no1=mysqli_num_rows($ex);
                ?>
                <div class="card" style="background-color: #3B82F6;">
                    <h2><?php echo $no1; ?></h2>
                    <p>Reg Users</p>
                    <a href="reguser.php">Full Detail →</a>
                </div>
                <?php  
                $sql1="select * from car_list";
                $ex1=mysqli_query($conn,$sql1);

                $no2=mysqli_num_rows($ex1);
                ?>
                <div class="card" style="background-color: #22C55E;">
                    <h2><?php echo $no2; ?></h2>
                    <p>Listed Vehicles</p>
                    <a href="managecar.php">Full Detail →</a>
                </div>

                <?php  
                    $newsql="select  * from booking where status=1";
                    $exnew=mysqli_query($conn,$newsql);

                    $no4=mysqli_num_rows($exnew);
                ?>
                <div class="card" style="background-color: #60A5FA;">
                    <h2><?php echo $no4; ?></h2>
                    <p>Total Bookings</p>
                    <a href="confirmed-booking.php">Full Detail →</a>
                </div>

            <?php  
                $sbrand="select * from brands";
                $exsbrand=mysqli_query($conn,$sbrand);

                $no5=mysqli_num_rows($exsbrand);
            ?>
                <div class="card" style="background-color: #FB923C;">
                    <h2><?php echo $no5; ?></h2>
                    <p>Listed Brands</p>
                    <a href="managebrand.php">Full Detail →</a>
                </div>
                <div class="card" style="background-color: #3B82F6;">
                    <h2>2</h2>
                    <p>Subscribers</p>
                    <a href="#">Full Detail →</a>
                </div>

                <?php  
                $contactquery="select * from contactusquery";
                $excontactquery=mysqli_query($conn,$contactquery);

                $no6=mysqli_num_rows($excontactquery);
            ?>
                <div class="card" style="background-color: #22C55E;">
                    <h2><?php echo $no6; ?></h2>
                    <p>Queries</p>
                    <a href="manage_contactus_query.php">Full Detail →</a>
                </div>
                <!-- <div class="card" style="background-color: #60A5FA;">
                    <h2>1</h2>
                    <p>Testimonials</p>
                    <a href="#">Full Detail →</a>
                </div> -->
            </section>
        </main>

</body>
</html>