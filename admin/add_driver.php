<?php
@include "include/config.php";
error_reporting(0);
session_start();
$errors = [];
$allimages = [];
$dfname = $dlname = $fnumber = $hprice = $dprice = $type_llicence = $add = $city = $state = $pin = "";

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
    if (empty($dfname)) {
        $errors['fname'] = "First name is required.";
    }
    if (empty($dlname)) {
        $errors['lname'] = "Last name is required.";
    }
    if (!preg_match('/^[0-9]{10}$/', $fnumber)) {
        $errors['fnumber'] = "Valid 10-digit phone number is required.";
    }
    if (!is_numeric($hprice) || $hprice <= 0) {
        $errors['hprice'] = "Hourly price must be a positive number.";
    }
    if (!is_numeric($dprice) || $dprice <= 0) {
        $errors['dprice'] = "Daily price must be a positive number.";
    }
    if ($type_licence == "type") {
        $errors['licence'] = "Please select a valid license type.";
    }
    if (empty($add)) {
        $errors['address'] = "Address is required.";
    }
    if (empty($city)) {
        $errors['city'] = "City is required.";
    }
    if (empty($state)) {
        $errors['state'] = "State is required.";
    }
    if (!preg_match('/^[0-9]{6}$/', $pin)) {
        $errors['pin'] = "Valid 6-digit PIN code is required.";
    }

    
    // Image validation
    $imageFields = ['image1', 'image2', 'image3'];
    foreach ($imageFields as $field) {
        if (empty($_FILES[$field]['name'][0])) {
            $errors[$field] = "Please upload required images.";
        } else {
            foreach ($_FILES[$field]['name'] as $key => $name) {
                $fileType = pathinfo($name, PATHINFO_EXTENSION);
                if (!in_array(strtolower($fileType), ['jpg', 'jpeg', 'png'])) {
                    $errors[$field] = "Only JPG, JPEG, and PNG files are allowed.";
                }
            }
        }
    }

    if (empty($errors)) {
        // Loop through each input field (image1[], image2[], image3[]) and process files
    foreach ($_FILES as $inputName => $file) {
        // Check if files are uploaded for this field
        if (isset($file['name']) && is_array($file['name'])) {
            $fileNames = $file['name'];
            $location = "driver/";

            // Loop through each file uploaded for this input
            foreach ($fileNames as $key => $val) {
                $target = $location . $val;
                // Move the file to the target directory
                if (move_uploaded_file($file['tmp_name'][$key], $target)) {
                    // Add the file path to the allimages array
                    $allimages[] = $target;
                } else {
                    echo "<script>alert('Error uploading file: $val');</script>";
                }
            }
        }
    }

    
    // $insert = "INSERT INTO car_img (img) VALUES ('$imagePathsWithoutPrefix  ')";
    // $run = mysqli_query($conn, $insert);

      // Insert image paths into the database
      if (count($allimages) > 0) {
        // Join the image paths into a comma-separated string
        $imagePaths = implode(",", $allimages);
        $imagePathsWithoutimg = str_replace("driver/", "", $imagePaths);
        
        $insert = "insert into driver (dfname,dlname,fnumber,hprice,dprice,type_licence,proff,address,city,state,pin)
    values ('$dfname','$dlname',$fnumber,$hprice,$dprice,'$type_licence','$imagePathsWithoutimg','$add','$city','$state',$pin)";
        $run = mysqli_query($conn, $insert);

        if ($run) {
            echo "<script>alert('Driver Added Successfully');</script>";
      
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
        echo "<script>window.open('add_car.php', 'second');</script>";
    } 
   
    
    
        // Proceed with database insertion or further processing
        echo "<script>alert('Form submitted successfully!');</script>";
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
        .er{
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
      
        
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="title">Add Driver</div>
        <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
        <div class="car_details">
                <div class="input-box">
                    <span class="details">Fulll Name</span>
                    <input type="text" name="fname" id="" placeholder="Enter Full Name" value="<?php echo $dfname; ?>">
                    <span class="er"><?php echo $errors['fname'];?></span><br>

                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lname" id="" placeholder="Enter Last Name" value="<?php echo $dlname; ?>">
                    <span  class="er"><?php echo $errors['lname']; ?></span><br>

                </div>

                
                <div class="input-box">
                    <span class="details">Phone  Number</span>
                    <input type="number" name="fnumber" id="" placeholder="Enter Phone number" value="<?php echo $fnumber; ?>">
                    <span  class="er"><?php echo $errors['fnumber'] ; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Hour Price</span>
                    <input type="number" name="hprice" id="" placeholder="per  Hour Price" value="<?php echo $hprice; ?>">
                    <span  class="er"><?php echo $errors['hprice'] ; ?></span><br>
                </div>
                <div class="input-box">
                    <span class="details">Per/Day Price</span>
                    <input type="text" name="dprice" id="" placeholder="per Day Price" value="<?php echo $dprice ;?>">
                    <span  class="er"><?php echo $errors['dprice'] ; ?></span><br>

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

                        
                
                
            <!-- Input for multiple images for the first input -->
            <div class="up-img">
                    Upload profile<span style="color: red;">*</span>
                    <input type="file" name="image1[]" multiple onchange="previewImages(this, 'imagePreview1')"><br>
                    <div id="imagePreview1"></div> <!-- Preview container for image1 -->
                    <span class="er"> <?php echo $errors[$field]; ?></span><br>

                </div>
    
                <!-- Input for multiple images for the second input -->
                <div class="up-img">
                    Upload Licence<span style="color: red;">*</span>
                    <input type="file" name="image2[]" multiple onchange="previewImages(this, 'imagePreview2')"><br>
                    <div id="imagePreview2"></div> <!-- Preview container for image1 -->
                    <span class="er"> <?php echo $errors[$field]; ?></span><br>
                </div>

                <!-- Input for multiple images for the third input -->
                <div class="up-img">
                    Upload Adhar<span style="color: red;">*</span>
                    <input type="file" name="image3[]" multiple onchange="previewImages(this, 'imagePreview3')"><br>
                    <div id="imagePreview3"></div> <!-- Preview container for image1 -->
                    <span class="er"> <?php echo $errors[$field]; ?></span><br>
                </div>
           
          
            </div>
            <div class="bi-txt"><u><b>Address Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" id="" placeholder="Enter Address" value="<?php echo $add; ?>">
                    <span  class="er"><?php echo $errors['address']; ?></span><br>

                </div>
                <div class="input-box">
                    <span class="details">Street Address</span>
                    <input type="text" name="address" id="" placeholder="Enter Street Address" >
                </div>  
                <div class="input-box">
                    <span class="details">Street Address Line  2</span>
                    <input type="text" name="address" id="" placeholder="Enter Street Address" >
                </div>  
                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name="city" id="" placeholder="Enter city" value="<?php echo $city; ?>">
                    <span  class="er"><?php echo $errors['city']; ?></span><br>

                </div> 
                <div class="input-box">
                    <span class="details">State</span>
                    <input type="text" name="state" id="" placeholder="Enter State" value="<?php echo $state; ?>">
                    <span  class="er"><?php echo $errors['state']; ?></span><br>
                    </div> 
                <div class="input-box">
                    <span class="details">PinCode</span>
                    <input type="number" name="pin" id="" placeholder="Enter pincode" value="<?php echo $pin; ?>">
                    <span  class="er"><?php echo $errors['pin']; ?></span><br>
                </div> 
    </div>
           
               
                
            <div class="button">
            <button type="submit" name="submit" class="button">Add Driver</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>
        </form>
    </div>
    
</body>

</html>