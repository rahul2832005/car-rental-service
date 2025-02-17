<?php
@include "include/config.php";
error_reporting(0);
session_start();
$errors = [];
$image_path = "";
$profile = $licence_pdf = $adhar_pdf = ""; // Store PDF file paths
$dfname = $dlname = $fnumber = $hprice = $dprice = $type_licence = $add = $city = $state = $pin = "";

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

    // Basic validation
    if (empty($dfname)) $errors['fname'] = "First name is required.";
    if (empty($dlname)) $errors['lname'] = "Last name is required.";
    if (!preg_match('/^[0-9]{10}$/', $fnumber)) $errors['fnumber'] = "Valid 10-digit phone number is required.";
    if (!is_numeric($hprice) || $hprice <= 0) $errors['hprice'] = "Hourly price must be a positive number.";
    if (!is_numeric($dprice) || $dprice <= 0) $errors['dprice'] = "Daily price must be a positive number.";
    if ($type_licence == "type") $errors['licence'] = "Please select a valid license type.";
    if (empty($add)) $errors['address'] = "Address is required.";
    if (empty($city)) $errors['city'] = "City is required.";
    if (empty($state)) $errors['state'] = "State is required.";
    if (!preg_match('/^[0-9]{6}$/', $pin)) $errors['pin'] = "Valid 6-digit PIN code is required.";

    // PDF Upload Validation and Handling
    $uploadDir = "driver/";
    $pdfFields = ['licence_pdf', 'adhar_pdf'];
    foreach ($pdfFields as $field) {
        if (!empty($_FILES[$field]['name'])) {
            $fileName = basename($_FILES[$field]['name']);
            $filePath = $uploadDir . $fileName;
            $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

            if ($fileType != 'pdf') {
                $errors[$field] = "Only PDF files are allowed.";
            } else {
                if (move_uploaded_file($_FILES[$field]['tmp_name'], $filePath)) {
                    $$field = $fileName; // Assign to the corresponding variable dynamically
                } else {
                    $errors[$field] = "Failed to upload $field.";
                }
            }
        } else {
            $errors[$field] = "Please upload a PDF for $field.";
        }
    }
    /* for images */ 
    if (!empty($_FILES['image']['name'])) {
        $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileType, $allowedTypes)) {
            $errors['image'] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } else {
            $image_path = $uploadDir .  $_FILES['image']['name'];
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                $errors['image'] = "Failed to upload image.";
            }
        }
    } else {
        $errors['image'] = "Image is required.";
    }

    if (empty($errors)) {
        // Insert into database
        $insert = "INSERT INTO driver (dfname, dlname, fnumber, hprice, dprice, type_licence, profile,  address, city, state, pin,licence_pdf, adhar_pdf)
                   VALUES ('$dfname', '$dlname', '$fnumber', '$hprice', '$dprice', '$type_licence', '$image_path',  '$add', '$city', '$state', '$pin','$licence_pdf', '$adhar_pdf')";

        $run = mysqli_query($conn, $insert);
        if ($run) {
            echo "<script>alert('Driver Added Successfully');</script>";
            echo "<script>window.open('add_driver.php', '_self');</script>";
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
    <script>
        function previewImages(input, id) {
            const fileList = input.files;
            const previewContainer = document.getElementById(id);
            previewContainer.innerHTML = ""; // Clear previous previews

            if (fileList) {
                for (let i = 0; i < fileList.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.maxWidth = "100px";
                        img.style.margin = "10px";
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(fileList[i]);
                }
            }
        }
    </script>
</head>

<body>

    <div class="container">


        <form action="" method="post" enctype="multipart/form-data">
            <div class="title">Add Driver</div>
            <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Fulll Name</span>
                    <input type="text" name="fname" id="" placeholder="Enter Full Name" value="<?php echo $dfname; ?>">
                    <span class="er"><?php echo $errors['fname']; ?></span><br>

                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" id="" placeholder="Enter Last Name" value="<?php echo $dlname; ?>">
                    <span class="er"><?php echo $errors['lname']; ?></span><br>

                </div>


                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" name="fnumber" id="" placeholder="Enter Phone number" value="<?php echo $fnumber; ?>">
                    <span class="er"><?php echo $errors['fnumber']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Hour Price</span>
                    <input type="number" name="hprice" id="" placeholder="per  Hour Price" value="<?php echo $hprice; ?>">
                    <span class="er"><?php echo $errors['hprice']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Day Price</span>
                    <input type="text" name="dprice" id="" placeholder="per Day Price" value="<?php echo $dprice; ?>">
                    <span class="er"><?php echo $errors['dprice']; ?></span><br>

                </div>





                <div class="fual-type">
                    <span class="details">Select Fual </span>
                    <select name="licence" id="fual">
                        <option value="type">Select Licence Type</option>
                        <option value="passenger" <?php echo ($type_llicence == 'passenger') ? 'selected' : ''; ?>>Passenger</option>
                        <option value="all_india_permit" <?php echo ($type_llicence == 'all_india_permit') ? 'selected' : ''; ?>>All India Permit</option>
                        <option value="four_wheeler" <?php echo ($type_llicence == 'four_wheeler') ? 'selected' : ''; ?>>4 Wheeler</option>
                    </select>
                    <span class="er"> <?php echo $errors['licence']; ?></span><br>


                </div>




                <div class="up-img">
                    Upload Profile (Image)<span style="color: red;">*</span>
                    <input type="file" name="image" accept="image/*">
                    <span class="er"><?php echo $errors['profile_pdf'] ?? ''; ?></span>
                </div>

                <div class="up-img">
                    Upload Licence (PDF)<span style="color: red;">*</span>
                    <input type="file" name="licence_pdf" accept=".pdf">
                    <span class="er"><?php echo $errors['licence_pdf'] ?? ''; ?></span>
                </div>

                <div class="up-img">
                    Upload Adhar (PDF)<span style="color: red;">*</span>
                    <input type="file" name="adhar_pdf" accept=".pdf">
                    <span class="er"><?php echo $errors['adhar_pdf'] ?? ''; ?></span>
                </div>


            </div>
            <div class="bi-txt"><u><b>Address Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="" name="address" id="" placeholder="Enter Address" value="<?php echo $add; ?>">
                    <span class="er"><?php echo $errors['address']; ?></span><br>

                </div>

                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name="city" id="" placeholder="Enter city" value="<?php echo $city; ?>">
                    <span class="er"><?php echo $errors['city']; ?></span><br>

                </div>
                <div class="input-box">
                    <span class="details">State</span>
                    <input type="text" name="state" id="" placeholder="Enter State" value="<?php echo $state; ?>">
                    <span class="er"><?php echo $errors['state']; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">PinCode</span>
                    <input type="number" name="pin" id="" placeholder="Enter pincode" value="<?php echo $pin; ?>">
                    <span class="er"><?php echo $errors['pin']; ?></span><br>
                </div>
            </div>



            <div class="button">
                <button type="submit" name="submit" class="btn">Add Driver</button>
                <!--<input type="button" value="Add Car" name="submit">-->
            </div>
        </form>
    </div>

</body>

</html>