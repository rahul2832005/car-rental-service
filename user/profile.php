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
    <title>Profile</title>
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
                <h1><?php echo $_SESSION["alogin"]; ?></h1>
            </div>
        </div>
    </div>
    <div class="services-section">
        <a href="info.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="image/pinfo.png"></div>
                <h3>INFORMATION</h3>
            </div>
        </a>
        <a href="p2.php" target="main"> 
            <div class="service-card">
                <div class="icon"><img src="image/myboook.png"></div>
                <h3>MY BOOKING</h3>
            </div>
        </a>
        <a href="profile.php"> 
            <div class="service-card">
                <div class="icon"><img src="image/picon.png"></div>
                <h3>PAYMENTS</h3>
            </div>
        </a>
        <a href="profile.php">
            <div class="service-card">
                <div class="icon"><img src="image/feed.png"></div>
                <h3>MY FEEDBACKS</h3>
            </div>
        </a>
        <a href="info.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="image/pinfo.png"></div>
                <h3>FAVORITE CARS</h3>
            </div>
        </a>
    </div>
    <iframe src="info.php" name="main" id="main"></iframe>
    <?php include('footer.php'); ?>
</body>
</html>
