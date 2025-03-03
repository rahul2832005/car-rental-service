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
    <style>
          /* Dropdown Container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Button */
.dropbtn {
  text-decoration: none;
  color: black;
  font-size: 16px;
  cursor: pointer;
}

/* Dropdown Content */
.dropdown-content {
    /* /* margin-top: 13px;
    margin-left: -23px; */
    display: none;
    /* position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0 8px 16px #bb3a3a;
    z-index: 1; */
    background-color:rgb(106, 189, 245);
    color: #000;
    padding: 10px 15px;
    border-radius: 20px;
    font-size: 14px;
    cursor: pointer;
    
}

/* Dropdown Links */
.dropdown-content a {
  color: black;
  padding: 5px 2px;
  text-decoration: none;
  display: block;
  font-size: 15px;
  border-bottom: 1px solid #f0f0f0;
  background: white;
}

.dropdown-content a:hover {
  background-color:rgb(218, 206, 206);
}

/* Show Dropdown on Hover */
.dropdown:hover .dropdown-content {
  display: block;
}
/* Down Arrow */
#down {
  /* border: solid black;
  border-width: 0 4px 4px 4px; */
  display: inline-block;
  padding: 4px;
  margin-left:-2px;
  transform: rotate(0deg);
  transition: transform 0.4s ease;
}

/* Rotate Arrow on Hover */
.dropdown:hover #down {
  transform: rotate(-180deg);
}
    </style>
</head>

<body>
    <!-- Main Content -->
    <main class="main-content">
        <header class="header">
            <h1>Dashboard</h1>
            <div class="account">

                <div class="dropdown">
                <a href="#" class="dropbtn">Account <i id="down" class="fa-solid fa-angle-down"></i></a>
                <div class="dropdown-content">
                    <a href="change_password.php">Change Paaword</a>
                    <a href="logout.php">Logout</a>
                    
                </div>

            </div>
            
        </header>
        <section class="dashboard-cards">
            <?php
            $sql = "select * from reguser";
            $ex = mysqli_query($conn, $sql);

            $no1 = mysqli_num_rows($ex);
            ?>
            <div class="card" style="background-color: #3B82F6;">
                <h2><?php echo $no1; ?></h2>
                <p>Reg Users</p>
                <a href="reguser.php">Full Detail →</a>
            </div>
            <?php
            $sql1 = "select * from car_list";
            $ex1 = mysqli_query($conn, $sql1);

            $no2 = mysqli_num_rows($ex1);
            ?>
            <div class="card" style="background-color: #22C55E;">
                <h2><?php echo $no2; ?></h2>
                <p>Listed Vehicles</p>
                <a href="managecar.php">Full Detail →</a>
            </div>

            <?php
            $newsql = "select  * from booking where status=1";
            $exnew = mysqli_query($conn, $newsql);

            $no4 = mysqli_num_rows($exnew);
            ?>
            <div class="card" style="background-color: #60A5FA;">
                <h2><?php echo $no4; ?></h2>
                <p>Total Bookings</p>
                <a href="confirmed-booking.php">Full Detail →</a>
            </div>

            <?php
            $sbrand = "select * from brands";
            $exsbrand = mysqli_query($conn, $sbrand);

            $no5 = mysqli_num_rows($exsbrand);
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
            $contactquery = "select * from contactusquery";
            $excontactquery = mysqli_query($conn, $contactquery);

            $no6 = mysqli_num_rows($excontactquery);
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