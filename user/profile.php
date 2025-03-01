<?php
session_start();
@include "include/config.php";

if (!isset($_SESSION["alogin"])) {
    header("location:login.php");
    exit;
}

$userEmail = $_SESSION["alogin"];
$uname = $_SESSION["uname"];
$userId = $_SESSION["userid"];


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
    <!-- Include Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">

    <style>
      

        .profile-picture-wrapper {
            position: relative;
            top: -60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 20px;
            cursor: pointer;
        }

        .profile-picture {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .camera-icon-container {
            position: absolute;
            bottom: 20px;
            right: 440px;
            background-color: white;
            border-radius: 50%;
            width: 30px;
            height: 30px;
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

        <div><!-- Profile Picture Form -->
            <form id="profile-upload-form" enctype="multipart/form-data">
                <div class="profile-picture-wrapper" onclick="document.getElementById('profile_picture').click()">
                    <img id="profile-preview" src="<?php echo $profilePicture; ?>" alt="Profile Picture" class="profile-picture">
                    <div class="camera-icon-container">
                        <i class="fas fa-camera"></i>
                    </div>
                </div>
                <input type="file" name="profile_picture" id="profile_picture" accept=".jpeg,.jpg,.png" style="display:none;">
            </form>

            <!-- Modal for Image Cropping -->
            <div id="crop-modal" style="display:none; position: fixed; top: 20%; left: 50%; transform: translate(-50%, -20%); background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.5);">
                <div>
                    <img id="crop-image" style="max-width:50%;">
                </div>
                <button id="crop-button">Crop & Upload</button>
            </div>


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
        <a href="my_doc.php" target="main">
            <div class="service-card">
                <div class="icon"><img src="image/documentation.png"></div>
                <h3>MY DOCUMENTS</h3>
            </div>
        </a>
        <a href="my_feedback.php" target="main">
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
    <!-- Include Cropper.js JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let cropper;
            let cropImage = document.getElementById("crop-image");

            document.getElementById("profile_picture").addEventListener("change", function(event) {
                let file = event.target.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        cropImage.src = e.target.result;
                        document.getElementById("crop-modal").style.display = "block";

                        if (cropper) {
                            cropper.destroy(); // Destroy existing cropper instance
                        }

                        cropper = new Cropper(cropImage, {
                            aspectRatio: 1, // Maintain 1:1 aspect ratio
                            viewMode: 1,
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            document.getElementById("crop-button").addEventListener("click", function() {
                if (cropper) {
                    let canvas = cropper.getCroppedCanvas({
                        width: 150,
                        height: 150,
                    });

                    canvas.toBlob(function(blob) {
                        let formData = new FormData();
                        formData.append("cropped_image", blob, "profile.jpg");

                        fetch("upload_profile.php", {
                                method: "POST",
                                body: formData,
                            })
                            .then(response => response.text())
                            .then(data => {
                                console.log(data);
                                location.reload(); // Reload profile page to reflect changes
                            })
                            .catch(error => console.error("Error uploading file:", error));
                    }, "image/jpeg");
                }
            });
        });
    </script>
</body>

</html>