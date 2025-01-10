<?php 
session_start();
if (!$_SESSION["alogin"])
{
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisor Profile</title>
    <link rel="stylesheet" href="profile.css">
 
</head>
<body>
    <div>
        <?php include('navbar.php'); ?>
    </div>
    <div class="profile-header">
        <img src="image/profile.jpg" alt="Background" class="background-image">
        <div class="profile-details">
            <img src="image/p2.jpg" alt="Profile Picture" class="profile-picture">
            <div class="profile-info">
                <h1 > Kevin Smith</h1>
                 <!-- Services Section -->
       <div class="services-section">
           <a href="profile.php">
             <div class="service-card">
                <div class="icon"><img src="image/pinfo.png" height="50px"></div>
                <h3>INFORMATION</h3>
                <!-- <a href="#" class="more-link">MORE</a> -->
            </div>
            </a>
            <a href="profile.php"> 
            <div class="service-card">
                <div class="icon"><img src="image/myboook.png" height="50px"></div>
                <h3>MY BOOKING</h3>
                <!-- <a href="#" class="more-link">MORE</a> -->
            </div>
            </a>
            <a href="profile.php"> 
            <div class="service-card">
                <div class="icon"><a><img src="image/picon.png" height="50px"></a></div>
                <h3>PAYMENTS</h3>
                <!-- <a href="#" class="more-link">MORE</a> -->
            </div>
            </a>
            <a href="profile.php"><div class="service-card">
                <div class="icon"><img src="image/feed.png" height="50px"></div>
                <h3>MY FEEDBACKS</h3>
              
                <!-- <a href="#" class="more-link">MORE</a> -->
            </div></a>
        </div>
       
            </div>
        </div>
    </div>

    <div class="main-content">
      
    </div>
    <?php  include('footer.php'); ?>
</body>
</html>