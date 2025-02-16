<?php
@include "include/config.php";
session_start();
error_reporting(0);

$errors = [];
$image_path = "";
$profile = $licence_pdf = $adhar_pdf = "";
$dfname = $dlname = $fnumber = $hprice = $dprice = $type_licence = $add = $city = $state = $pin = "";

$did = $_GET['did'];
$sql = "SELECT * FROM driver WHERE did=$did";
$exsql = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($exsql);

$old_image_path = $result['profile'];
$old_licence_pdf = $result['licence_pdf'];
$old_adhar_pdf = $result['adhar_pdf'];

if (isset($_POST['submit'])) {
    $dfname = trim($_POST['fname']);
    $dlname = trim($_POST['lname']);
    $fnumber = trim($_POST['fnumber']);
    $hprice = trim($_POST['hprice']);
    $dprice = trim($_POST['dprice']);
    $type_licence = trim($_POST['licence']);
    $add = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $pin = trim($_POST['pin']);

    // Retain old paths unless new files are uploaded
    $image_path = $old_image_path;
    $licence_pdf = $old_licence_pdf;
    $adhar_pdf = $old_adhar_pdf;

    $uploadDir = "driver/";

    // Image upload
    if (!empty($_FILES['image']['name'])) {
        $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            $image_path = $uploadDir . $_FILES['image']['name'];
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                $errors['image'] = "Failed to upload image.";
            }
        } else {
            $errors['image'] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    // PDF Uploads
    $pdfFields = ['licence_pdf', 'adhar_pdf'];
    foreach ($pdfFields as $field) {
        if (!empty($_FILES[$field]['name'])) {
            $fileName = basename($_FILES[$field]['name']);
            $filePath = $uploadDir . $fileName;
            $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            if ($fileType == 'pdf') {
                if (move_uploaded_file($_FILES[$field]['tmp_name'], $filePath)) {
                    if ($field == 'licence_pdf') {
                        $licence_pdf = $filePath;
                    } elseif ($field == 'adhar_pdf') {
                        $adhar_pdf = $filePath;
                    }
                } else {
                    $errors[$field] = "Failed to upload $field.";
                }
            } else {
                $errors[$field] = "Only PDF files are allowed.";
            }
        }
    }

    if (empty($errors)) {
        $update = "UPDATE driver SET dfname='$dfname', dlname='$dlname', fnumber='$fnumber', hprice='$hprice',
            dprice='$dprice', type_licence='$type_licence', profile='$image_path', address='$add', city='$city',
            state='$state', pin='$pin', licence_pdf='$licence_pdf', adhar_pdf='$adhar_pdf' WHERE did=$did";

        $run = mysqli_query($conn, $update);
        if ($run) {
            echo "<script>alert('Driver Updated Successfully');</script>";
            echo "<script>window.open('managedriver.php', '_self');</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_car_style.css">
    <title>add car</title>
    <style>
        .er {
            color: red;
        }
    </style>

</head>

<body>

    <div class="container">


        <form action="" method="post" enctype="multipart/form-data">
            <div class="title">Add Driver</div>
            <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Fulll Name</span>
                    <input type="text" name="fname" id="" placeholder="Enter Full Name" value="<?php echo $result['dfname']; ?>">
                    <span class="er"><?php echo $errors['fname']; ?></span><br>

                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" id="" placeholder="Enter Last Name" value="<?php echo $result['dlname']; ?>">
                    <span class="er"><?php echo $errors['lname']; ?></span><br>

                </div>


                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" name="fnumber" id="" placeholder="Enter Phone number" value="<?php echo $result['fnumber']; ?>">
                    <span class="er"><?php echo $errors['fnumber']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Hour Price</span>
                    <input type="number" name="hprice" id="" placeholder="per  Hour Price" value="<?php echo $result['hprice']; ?>">
                    <span class="er"><?php echo $errors['hprice']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Day Price</span>
                    <input type="text" name="dprice" id="" placeholder="per Day Price" value="<?php echo $result['dprice']; ?>">
                    <span class="er"><?php echo $errors['dprice']; ?></span><br>

                </div>





                <div class="fual-type">
                    <span class="details">Select Fual </span>
                    <select name="licence" id="fual">
                        <option value="type">Select Licence Type</option>
                        <option value="passenger" <?php echo ($result['type_licence'] == 'passenger') ? 'selected' : ''; ?>>Passenger</option>
                        <option value="all_india_permit" <?php echo ($result['type_licence'] == 'all_india_permit') ? 'selected' : ''; ?>>All India Permit</option>
                        <option value="four_wheeler" <?php echo ($result['type_licence'] == 'four_wheeler') ? 'selected' : ''; ?>>4 Wheeler</option>
                    </select>
                    <span class="er"> <?php echo $errors['licence']; ?></span><br>


                </div>




                <div class="up-img">
                    Upload Profile (Image)<span style="color: red;">*</span>
                    <input type="file" name="image" accept="image/*">
                    <span class="er"><?php echo $errors['image'] ?? ''; ?></span>
                    <?php if (!empty($old_image_path)): ?>
                        <div>Current Image: <img src="<?php echo $old_image_path; ?>" alt="Driver Profile" width="100"></div>
                    <?php endif; ?>
                </div>

                <div class="up-img">
                    Upload Licence (PDF)<span style="color: red;">*</span>
                    <input type="file" name="licence_pdf" accept=".pdf">
                    <span class="er"><?php echo $errors['licence_pdf'] ?? ''; ?></span>
                    <?php if (!empty($old_licence_pdf)): ?>
                        <div>Current Licence: <a href="<?php echo $old_licence_pdf; ?>" target="_blank">View Licence PDF</a></div>
                    <?php endif; ?>
                </div>

                <div class="up-img">
                    Upload Adhar (PDF)<span style="color: red;">*</span>
                    <input type="file" name="adhar_pdf" accept=".pdf">
                    <span class="er"><?php echo $errors['adhar_pdf'] ?? ''; ?></span>
                    <?php if (!empty($old_adhar_pdf)): ?>
                        <div>Current Adhar: <a href="<?php echo $old_adhar_pdf; ?>" target="_blank">View Adhar PDF</a></div>
                    <?php endif; ?>
                </div>



            </div>
            <div class="bi-txt"><u><b>Address Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="" name="address" id="" placeholder="Enter Address" value="<?php echo $result['address']; ?>">
                    <span class="er"><?php echo $errors['address']; ?></span><br>

                </div>

                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name="city" id="" placeholder="Enter city" value="<?php echo $result['city']; ?>">
                    <span class="er"><?php echo $errors['city']; ?></span><br>

                </div>
                <div class="input-box">
                    <span class="details">State</span>
                    <input type="text" name="state" id="" placeholder="Enter State" value="<?php echo $result['state']; ?>">
                    <span class="er"><?php echo $errors['state']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">PinCode</span>
                    <input type="number" name="pin" id="" placeholder="Enter pincode" value="<?php echo $result['pin']; ?>">
                    <span class="er"><?php echo $errors['pin']; ?></span><br>
                </div>
            </div>



            <div class="button">
                <button type="submit" name="submit" class="btn">Update Driver</button>
                <!--<input type="button" value="Add Car" name="submit">-->
            </div>
        </form>
    </div>
</body>

</html>