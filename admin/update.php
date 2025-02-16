<?php
// error_reporting(0);
@include "include/config.php";
$allimages = [];
$count = 0;
$imageError1 = $imageError2 = $imageError3 = "";
$cn = $mod = $rp = $np = $cname = $se = $fu = $ire = $mile = $dr = $et = $pr = $br = $mile = $ft = $ml = $crp="";
$car_name = $modal = $rent_price = $no_plate = $company_name = $seat = $fual = $power = $engine = $f_tank = $break = $door = $chprice="";

$vid = $_GET['vid'];
$sql = "select * from car_list where vid=$vid";
$exsql = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($exsql);
$storedImages = explode(",", $result['image']); // Split the stored image paths
$oldAccessories = explode(', ', $result['accessories']); // Split string into array


if (isset($_POST['submit'])) {
    $car_name = $_POST['car_name'];
    $modal = $_POST['modal'];
    $chprice=$_POST['chprice'];
    $rent_price = $_POST['rent_price'];
    $no_plate = $_POST['num_plate'];
    $brand = $_POST['brand'];
    $seat = $_POST['capacity'];
    $fual = $_POST['fual'];
    $door = $_POST['door'];
    $power = $_POST['engine-power'];
    $engine = $_POST['engine'];
    $break = $_POST['break'];
    $f_tank = $_POST['fual-tank'];
    $mile = $_POST['mile'];

      // Process selected accessories
      $selectedAccessories = isset($_POST['accessories']) ? $_POST['accessories'] : [];
      $selectedAccessoriesString = implode(", ", $selectedAccessories);



    if ($car_name == "") {
        $cn = "Enter Car Name";
        $count++;
    }
    if ($modal == "") {
        $mod = "Enter Car Model";
        $count++;
    } elseif (!is_numeric($modal)) {
        $mod = "Enter Only Digit";
        $count++;
    }

    if($chprice==""){
        $crp="Enter Car Rent Price Per/Hour";
        $count++;
    }
    elseif(!is_numeric($chprice)){
        $crp ="Enter Only Digit";
        $count++;
    }
    if ($rent_price == "") {
        $rp = "Enter Car Rent Price";
        $count++;
    } elseif (!is_numeric($modal)) {
        $rp = "Enter Only Digit";
        $count++;
    }

    if ($no_plate == "") {
        $np = "Enter Car Number";
        $count++;
    }

    if ($brand == "") {
        $cname = "Enter Car Company Name";
        $count++;
    }

    if ($seat == "") {
        $se = "Enter Capacity";
        $count++;
    } elseif (!is_numeric($seat)) {
        $se = "Enter Only Digit";
        $count++;
    }

    if ($fual == "type") {
        $fu = "Select Fual Type";
        $count++;
    }
    if ($door == "") {
        $dr = "Please Select Door";
        $count++;
    }
    if ($power == "") {
        $pr = "Please Select  Engine Power";
        $count++;
    }
    if ($engine == "") {
        $et = "Please Select  Engine Type";
        $count++;
    }
    if ($f_tank == "") {
        $ft = "Please Select FuaL capacity";
        $count++;
    }
    if ($break == "") {
        $br = "Please Select Break type";
        $count++;
    }
    if ($mile == "") {
        $ml = "Please Enter Milage";
        $count++;
    }


    if ($count == 0) {
        // Fetch existing images
        $existingImages = explode(",", $result['image']);

        // Loop through uploaded files and replace only the changed ones
        foreach ($_FILES as $inputName => $file) {
            if (isset($file['name']) && is_array($file['name'])) {
                foreach ($file['name'] as $key => $val) {
                    if ($val != "") {  // Only replace if a new file is uploaded
                        $target = "img/" . $val;
                        if (move_uploaded_file($file['tmp_name'][$key], $target)) {
                            $existingImages[$key] = $val;  // Replace old image with new one
                        }
                    }
                }
            }
        }

        // Convert array back to string for database update
        $updatedImages = implode(",", $existingImages);

        // Update query
        $update = "UPDATE car_list SET 
            cname='$car_name', modal=$modal, chprice=$chprice ,price=$rent_price, no_plate='$no_plate', 
            brand='$brand', image='$updatedImages', seat=$seat, fual='$fual', 
            door=$door, en_power='$power', en_type='$engine', break_type='$break', 
            fual_capacity='$f_tank', mileage=$mile,accessories='$selectedAccessoriesString' WHERE vid=$vid";

        $run = mysqli_query($conn, $update);

        if ($run) {
            echo "<script>alert('Car Updated Successfully');</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
        echo "<script>window.open('managecar.php', 'second');</script>";
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
            <div class="title">Add Car</div>
            <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">
                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="" placeholder="Enter Car Name" value="<?php echo $result['cname']; ?>">
                    <p style="color: red;"><?php echo $cn; ?></p>
                </div>

                <div class="select-box">
                    <p style="color: red;"><?php echo $cname; ?></p>
                    <span class="details">Select Car Brand :</span>
                    <select name="brand" id="brand">
                        <option value="">Select Brand</option>
                        <?php
                        $selectbrand = "SELECT * FROM brands";
                        $exselect = mysqli_query($conn, $selectbrand);

                        while ($row = mysqli_fetch_assoc($exselect)) { ?>
                            <option value="<?php echo $row['bname']; ?>"
                                <?php if ($result['brand'] == $row['bname']) echo "selected"; ?>>
                                <?php echo $row['bname']; ?>
                            </option>
                        <?php } ?>
                    </select>

                </div>
                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="" placeholder="Enter Car Modal" value="<?php echo $result['modal']; ?>">
                    <p style="color: red;"><?php echo $mod; ?></p>
                </div>

                <div class="input-box">
                    <span class="details">Rent Price Per/Hour</span>
                    <input type="number" name="chprice" id="" placeholder="Enter Car-Rent Price" value="<?php echo $result['chprice']; ?>">
                    <p style="color: red;"><?php echo $crp; ?></p>
                </div>

                <div class="input-box">
                    <span class="details">Rent Price Per/Day</span>
                    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price" value="<?php echo $result['price']; ?>">
                    <p style="color: red;"><?php echo $rp; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate" value="<?php echo $result['no_plate']; ?>">
                    <p style="color: red;"><?php echo $np; ?></p>
                </div>


                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity" value="<?php echo $result['seat']; ?>">
                    <p style="color: red;"><?php echo $se; ?></p>
                </div>


                <div class="fual-type">
                    <p style="color: red;"><?php echo $fu; ?></p>
                    <span class="details">Select Fual </span>
                    <select name="fual" id="fual">
                        <option value="type">Fual Type</option>
                        <option value="Petrol" <?php if ($result['fual'] == 'Petrol') {
                                                    echo "selected";
                                                } ?>>Petrol</option>
                        <option value="Diesel" <?php if ($result['fual'] == 'Diesel') {
                                                    echo "selected";
                                                } ?>>Diesel</option>

                        <option value="CNG" <?php if ($result['fual'] == 'CNG') {
                                                echo "selected";
                                            } ?>>CNG</option>
                    </select>

                </div>


                <!-- Input for multiple images for the first input -->
                <div class="up-img">
                    Upload Image1<span style="color: red;">*</span>
                    <input type="file" name="image1[]" multiple onchange="previewImages(this, 'imagePreview1')"><br>
                    <div id="imagePreview1">
                        <?php if (!empty($storedImages[0])) { ?>
                            <img src="img/<?php echo $storedImages[0]; ?>" style="max-width:100px; margin:10px;">
                        <?php } ?>
                    </div>
                </div>

                <!-- Input for multiple images for the second input -->
                <div class="up-img">
                    Upload Image2<span style="color: red;">*</span>
                    <input type="file" name="image2[]" multiple onchange="previewImages(this, 'imagePreview2')"><br>
                    <div id="imagePreview2">
                        <?php if (!empty($storedImages[1])) { ?>
                            <img src="img/<?php echo $storedImages[1]; ?>" style="max-width:100px; margin:10px;">
                        <?php } ?>
                    </div>
                </div>

                <!-- Input for multiple images for the third input -->
                <div class="up-img">
                    Upload Image3<span style="color: red;">*</span>
                    <input type="file" name="image3[]" multiple onchange="previewImages(this, 'imagePreview3')"><br>
                    <div id="imagePreview3">
                        <?php if (!empty($storedImages[2])) { ?>
                            <img src="img/<?php echo $storedImages[2]; ?>" style="max-width:100px; margin:10px;">
                        <?php } ?>
                    </div>
                </div>



            </div>

            <div class="bi-txt"><u><b>Accessories.<span style="color: red;">*</span> </b></u></div>
            <div class="accessories">
                <div class="select-box">
                    <p style="color: red;"><?php echo $dr; ?></p>
                    <span class="details">Select Doors :</span><br>
                    <select name="door" id="door">
                        <option value="">Doors</option>
                        <option value="2" <?php if ($result['door'] == '2') {
                                                echo "selected";
                                            } ?>>2 Door</option>
                        <option value="4" <?php if ($result['door'] == '4') {
                                                echo "selected";
                                            } ?>>4 Door</option>
                        <option value="5" <?php if ($result['door'] == '5') {
                                                echo "selected";
                                            } ?>>5 Door</option>
                    </select>

                </div>
                <div class="select-box">
                    <p style="color: red;"><?php echo $ft; ?></p>
                    <span class="details">Select Fual Capacity :</span>
                    <select name="fual-tank" id="fual-tank">
                        <option value="">Fual Capacity</option>
                        <option value="20" <?php if ($result['fual_capacity'] == '20') {
                                                echo "selected";
                                            } ?>>20 Ltr</option>
                        <option value="40" <?php if ($result['fual_capacity'] == '40') {
                                                echo "selected";
                                            } ?>>40 Ltr</option>
                        <option value="50" <?php if ($result['fual_capacity'] == '50') {
                                                echo "selected";
                                            } ?>>50 Ltr</option>
                    </select>

                </div>

                <div class="select-box">
                    <p style="color: red;"><?php echo $br; ?></p>
                    <span class="details">Select Break Type :</span>
                    <select name="break" id="break">
                        <option value="">Break-Type</option>
                        <option value="disc break" <?php if ($result['break_type'] == 'disc break') {
                                                        echo "selected";
                                                    } ?>>Disc Break</option>
                        <option value="Carbon break" <?php if ($result['break_type'] == 'Carbon break') {
                                                            echo "selected";
                                                        } ?>>Carbon Break</option>
                        <option value="ABS break" <?php if ($result['break_type'] == 'ABS break') {
                                                        echo "selected";
                                                    } ?>>ABS Break</option>
                    </select>

                </div>

                <div class="select-box">
                    <p style="color: red;"><?php echo $et; ?></p>
                    <span class="details">Select Engine Type :</span>
                    <select name="engine" id="engine">
                        <option value=""> Engine Type</option>
                        <option value="Petrol engine " <?php if ($result['en_type'] == 'Petrol engine') {
                                                            echo "selected";
                                                        } ?>>Petrol Engine</option>
                        <option value="Diesel engine" <?php if ($result['en_type'] == 'Diesel engine') {
                                                            echo "selected";
                                                        } ?>>Diesel Engine</option>
                        <option value="EV" <?php if ($result['en_type'] == 'EV') {
                                                echo "selected";
                                            } ?>>EV Engine</option>
                        <option value="Hybrid" <?php if ($result['en_type'] == 'Hybrid') {
                                                    echo "selected";
                                                } ?>>Hybrid Engine</option>

                    </select>

                </div>
                <div class="select-box">
                    <p style="color: red;"><?php echo $pr; ?></p>
                    <span class="details">Select Engine Power : </span>
                    <select name="engine-power" id="engine-power">
                        <option value="">Engine Power</option>
                        <option value="400 " <?php if ($result['en_power'] == '400') {
                                                    echo "selected";
                                                } ?>>400 Hp</option>
                        <option value="261" <?php if ($result['en_power'] == '261') {
                                                echo "selected";
                                            } ?>>261 Hp</option>
                        <option value="300" <?php if ($result['en_power'] == '300') {
                                                echo "selected";
                                            } ?>> 300 Hp</option>
                        <option value="500" <?php if ($result['en_power'] == '500') {
                                                echo "selected";
                                            } ?>> 500 Hp</option>

                    </select>

                </div>

            </div>
            <p style="color: red;"><?php echo $ml; ?></p>
            <div class="mil">
                <span class="mi-de">Milage: </span>
                <input type="text" name="mile" id="mil" placeholder="Enter Car Mielage" value="<?php echo $result['mileage']; ?>">
            </div>
            <div class="container1">
        <h2>Accessories</h2>
        <div class="accessories">
        <?php

                $accessories = [
                    "Air Conditioner", "Power Steering", "CD Player", "Power Door Locks",
                    "Driver Airbag", "Central Locking", "AntiLock Braking System", "Brake Assist",
                    "Passenger Airbag", "Crash Sensor", "Power Windows", "Leather Seats"
                ];
                foreach ($accessories as $accessory) {
                    echo '<label><input type="checkbox" name="accessories[]" value="' . $accessory . '"';
                    if (in_array($accessory, $oldAccessories)) {
                        echo ' checked';
                    }
                    echo '>' . $accessory . '</label><br>';
                }
                ?>
            </div>
            
    </div>                              
            <div class="button">
                <button type="submit" name="submit" class="btn">Update Car</button>
                <!--<input type="button" value="Add Car" name="submit">-->
            </div>
        </form>
    </div>

</body>

</html>