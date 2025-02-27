<?php
session_start();
@include "include/config.php";

if (!isset($_SESSION["alogin"])) {
    header("location:login.php");
    exit;
}

$userEmail = $_SESSION["alogin"];
$uname=$_SESSION["uname"];
$userId = $_SESSION["userid"];

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $uploadDir = 'upload/';
    $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['profile_picture']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
    } elseif ($_FILES['profile_picture']['size'] > 2000000) {
        echo "Sorry, your file is too large.";
    } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
    } else {
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
            $profilePicPath = $uploadFile;
            $updateQuery = "UPDATE reguser SET profile_picture='$profilePicPath' WHERE uid='$userId'";
            mysqli_query($conn, $updateQuery);
        } else {
            echo "Error uploading file.";
        }
    }
}

$query = "SELECT profile_picture FROM reguser WHERE uid='$userId'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

$profilePicture = !empty($userData['profile_picture']) ? $userData['profile_picture'] : 'image/p2.jpg';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <style>
        .profile-picture-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .profile-picture {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .camera-icon-container {
            position: absolute;
            bottom: 5px;
            right: 10px;
            background-color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .camera-icon-container i {
            color: black;
            font-size: 16px;
        }
    </style>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
</head>

<body>
    <div>
        <?php include('navbar.php'); ?>
    </div>
    <div class="profile-header">
        <img src="<?php echo $profilePicture; ?>" alt="Background" class="background-image">

        <div class="profile-details">
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile-picture-wrapper" onclick="document.getElementById('profile_picture').click()">
                    <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-picture">
                    <div class="camera-icon-container">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <input type="file" name="profile_picture" id="profile_picture" accept=".jpeg,.jpg,.png" style="display:none;" onchange="this.form.submit()">
            </form>

            <div class="profile-info">
                <h1><?php echo $uname; ?></h1>
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
        <a href="my_booking" target="main">
            <div class="service-card">
                <div class="icon"><img src="image/myboook.png"></div>
                <h3>MY BOOKING</h3>
            </div>
        </a>
        <a href="my_doc.php"  target="main">
            <div class="service-card">
                <div class="icon"><img src="image/documentation.png"></div>
                <h3>MY DOCUMENTS</h3>
            </div>
        </a>
        <a href="#">
            <div class="service-card">
                <div class="icon"><img src="image/feed.png"></div>
                <h3>MY FEEDBACKS</h3>
            </div>
        </a>
        <a href="#">
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