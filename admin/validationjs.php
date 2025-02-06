<?php
@include "include/config.php";
error_reporting(0);
$errors = [];
$allimages = [];
$imageError1 = $imageError2 = $imageError3 = ""; 

$cn=$mod=$rp=$np=$cname=$se=$fu=$ire=$mile=$dr=$et=$pr=$br=$mile=$ft=$ml="";
$car_name=$modal=$rent_price=$no_plate=$company_name=$seat=$fual=$power=$engine=$f_tank=$break=$door="";

if (isset($_POST['submit'])) {
    $car_name = trim($_POST['car_name']);
    $modal = trim($_POST['modal']);
    $rent_price = trim($_POST['rent_price']);
    $no_plate = trim($_POST['num_plate']);
    $company_name = trim($_POST['company_name']);
    $seat = trim($_POST['capacity']);
    $fual = trim($_POST['fual']);
    $door = trim($_POST['door']);
    $power = trim($_POST['engine-power']);
    $engine = trim($_POST['engine']);
    $break = trim($_POST['break']);
    $f_tank = trim($_POST['fual-tank']);
    $mile = trim($_POST['mile']);

    // Validation
    if (empty($car_name)) $errors['car_name'] = "Enter Car Name";
    if (empty($modal) || !is_numeric($modal)) $errors['modal'] = "Enter a valid numeric model year";
    if (empty($rent_price) || !is_numeric($rent_price)) $errors['rent_price'] = "Enter a valid numeric rent price";
    if (empty($no_plate)) $errors['num_plate'] = "Enter Car Number Plate";
    if (empty($company_name)) $errors['company_name'] = "Enter Car Company Name";
    if (empty($seat) || !is_numeric($seat)) $errors['capacity'] = "Enter valid numeric capacity";
    if (empty($fual)) $errors['fual'] = "Select Fuel Type";
    if (empty($door)) $errors['door'] = "Select the number of doors";
    if (empty($power)) $errors['engine-power'] = "Select Engine Power";
    if (empty($engine)) $errors['engine'] = "Select Engine Type";
    if (empty($f_tank)) $errors['fual-tank'] = "Select Fuel Capacity";
    if (empty($break)) $errors['break'] = "Select Brake Type";
    if (empty($mile) || !is_numeric($mile)) $errors['mile'] = "Enter a valid numeric mileage";
    if (empty($_FILES['image1']['name'][0])) {
        $imageError1 = "Please upload  at least one image in image 1.";
        $count++;
    }
    if (empty($_FILES['image2']['name'][0])) {
        $imageError2 = "Please upload at least one image in Image 2.";
        $count++;
    }
    if (empty($_FILES['image3']['name'][0])) {
        $imageError3 = "Please upload at least one image in Image 3.";
        $count++;
    }
   

    // If no errors, insert into database
    if (empty($errors)) {
        foreach ($_FILES as $inputName => $file) {
            if (isset($file['name']) && is_array($file['name'])) {
                $fileNames = $file['name'];
                $location = "img/";

                foreach ($fileNames as $key => $val) {
                    $target = $location . $val;
                    if (move_uploaded_file($file['tmp_name'][$key], $target)) {
                        $allimages[] = $target;
                    }
                }
            }
        }

        if (count($allimages) > 0) {
            $imagePaths = implode(",", $allimages);
            $imagePathsWithoutimg = str_replace("img/", "", $imagePaths);

            $insert = "INSERT INTO car_list (name, modal, price, no_plate, company_name, image, seat, fual, door, en_power, en_type, break_type, fual_capacity, mileage) 
                       VALUES ('$car_name', $modal, $rent_price, '$no_plate', '$company_name', '$imagePathsWithoutimg', $seat, '$fual', $door, '$power', '$engine', '$break', $f_tank, $mile)";
            $run = mysqli_query($conn, $insert);

            if ($run) {
                echo "<script>alert('Car Added Successfully');</script>";
                header("Location: " . $_SERVER['PHP_SELF']); // Redirect to prevent form resubmission
                exit();
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
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


    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="title">Add Car</div>
            <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
            <div class="car_details">

                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="car_name" placeholder="Enter Car Name" value="<?php echo $car_name; ?>">
                    <p id="car_name_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['car_name']?></p>

                </div>

                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="modal" placeholder="Enter Car Modal"  value="<?php echo $modal; ?>">
                    <p id="modal_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['modal']?></p>

                </div>

                <div class="input-box">
                    <span class="details">Rent Price</span>
                    <input type="number" name="rent_price" id="rent_price" placeholder="Enter Car-Rent Price" value="<?php echo $rent_price; ?>">
                    <p id="rent_price_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['rent_price']?></p>

                </div>

                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="num_plate" placeholder="Enter Car No.Plate" value="<?php echo $no_plate; ?>">
                    <p id="num_plate_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['num_plate']?></p>

                </div>

                <div class="input-box">
                    <span class="details">Car Company Name</span>
                    <input type="text" name="company_name" id="company_name" placeholder="Enter Car Company" value="<?php echo $company_name; ?>">
                    <p id="company_name_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['company_name']?></p>


                </div>

                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="capacity" placeholder="Enter Car Capacity" value="<?php echo $seat; ?>">
                    <p id="capacity_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['capacity']?></p>

                </div>


                <div class="fual-type">
                    <p id="fual_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['fual']?></p>

                    <span class="details">Select Fual </span>
                    <select name="fual" id="fual">
                        <option value="type">Fual Type</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="CNG">CNG</option>
                    </select>

                </div>


                <!-- Input for multiple images for the first input -->
                <div class="up-img">
                    Upload Image1<span style="color: red;">*</span>
                    <input type="file" name="image1[]" id="image1" multiple>
                    <p style="color: red;"><?php echo $imageError1; ?></p>
                    <div id="imagePreview1"></div> <!-- Preview container for image1 -->
                </div>

                <!-- Input for multiple images for the second input -->
                <div class="up-img">
                    Upload Image2<span style="color: red;">*</span>
                    <input type="file" name="image2[]" id="image2" multiple>
                    <p style="color: red;"><?php echo $imageError2; ?></p>
                    <div id="imagePreview2"></div> <!-- Preview container for image1 -->

                </div>

                <!-- Input for multiple images for the third input -->
                <div class="up-img">
                    Upload Image3<span style="color: red;">*</span>
                    <input type="file" name="image3[]" id="image3" multiple>
                    <p style="color: red;"><?php echo $imageError3; ?></p>
                    <div id="imagePreview3"></div> <!-- Preview container for image1 -->

                </div>


            </div>

            <div class="bi-txt"><u><b>Accessories.<span style="color: red;">*</span> </b></u></div>
            <div class="accessories">

                <div class="select-box">
                    <p id="door_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['door']?></p>

                    <span class="details">Select Doors :</span><br>
                    <select name="door" id="door">
                        <option value="">Doors</option>
                        <option value="2">2 Door</option>
                        <option value="4">4 Door</option>
                        <option value="5">5 Door</option>
                    </select>

                </div>
                <div class="select-box">
                    <p id="fual_tank_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['fual-tank']?></p>

                    <span class="details">Select Fual Capacity :</span>
                    <select name="fual-tank" id="fual-tank">
                        <option value="">Fual Capacity</option>
                        <option value="20">20 Ltr</option>
                        <option value="40">40 Ltr</option>
                        <option value="50">50 Ltr</option>
                    </select>

                </div>

                <div class="select-box">
                    <p id="break_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['break']?></p>

                    <span class="details">Select Break Type :</span>
                    <select name="break" id="break">
                        <option value="">Break-Type</option>
                        <option value="disc break">Disc Break</option>
                        <option value="Carbon break">Carbon Break</option>
                        <option value="ABS break">ABS Break</option>
                    </select>

                </div>

                <div class="select-box">
                    <p id="engine_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['engine']?></p>

                    <span class="details">Select Engine Type :</span>
                    <select name="engine" id="engine">
                        <option value=""> Engine Type</option>
                        <option value="Petrol ">Petrol Engine</option>
                        <option value="Diesel engine">Diesel Engine</option>
                        <option value="EV">EV Engine</option>
                        <option value="Hybrid">Hybrid Engine</option>

                    </select>

                </div>
                <div class="select-box">
                    <p id="engine_power_error" style="color: red;"></p>
                    <p style="color: red;"><?php echo $errors['engine-power']?></p>

                    <span class="details">Select Engine Power : </span>
                    <select name="engine-power" id="engine-power">
                        <option value="">Engine Power</option>
                        <option value="400 Hp">400 Hp</option>
                        <option value="261 Hp">261 Hp</option>
                        <option value="300 Hp"> 300 Hp</option>
                        <option value="500  Hp"> 500 Hp</option>

                    </select>

                </div>

            </div>
            <p id="mile_error" style="color: red;"></p>
            <p style="color: red;"><?php echo $errors['mile']?></p>

            <div class="mil">
                <span class="mi-de">Milage: </span>
                <input type="text" name="mile" id="mile" placeholder="Enter Car Mielage">

            </div>

            <div class="button">
                <button type="submit" name="submit" class="button">Add Car</button>
                <!--<input type="button" value="Add Car" name="submit">-->
            </div>
        </form>
    </div>
    <script>
        // Function to validate a text input field
        function validateField(field, errorId, errorMessage) {
            const value = field.value.trim();
            const errorElement = document.getElementById(errorId);
            if (value === "") {
                errorElement.innerText = errorMessage;
            } else {
                errorElement.innerText = ""; // Clear error if valid
            }
        }

        // Function to validate number input (Only Digits Allowed)
        function validateNumber(field, errorId, errorMessage) {
            const value = field.value.trim();
            const errorElement = document.getElementById(errorId);
            if (value === "" || isNaN(value)) {
                errorElement.innerText = errorMessage;
            } else {
                errorElement.innerText = "";
            }
        }

        // Function to validate dropdown selection
        function validateDropdown(field, errorId, errorMessage) {
            const value = field.value;
            const errorElement = document.getElementById(errorId);
            if (value === "type" || value === "") {
                errorElement.innerText = errorMessage;
            } else {
                errorElement.innerText = "";
            }
        }

        // Function to validate image upload fields
        function validateImageUpload(input, errorId) {
            const errorElement = document.getElementById(errorId);
            if (input.files.length === 0) {
                errorElement.innerText = "Please upload at least one image.";
            } else {
                errorElement.innerText = "";
            }
        }

        // Attach validation events to each input field
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("car_name").addEventListener("blur", function() {
                validateField(this, "car_name_error", "Enter Car Name");
            });

            document.getElementById("modal").addEventListener("blur", function() {
                validateNumber(this, "modal_error", "Enter Only Digits for Model");
            });

            document.getElementById("rent_price").addEventListener("blur", function() {
                validateNumber(this, "rent_price_error", "Enter Only Digits for Rent Price");
            });

            document.getElementById("num_plate").addEventListener("blur", function() {
                validateField(this, "num_plate_error", "Enter Car Number");
            });

            document.getElementById("company_name").addEventListener("blur", function() {
                validateField(this, "company_name_error", "Enter Car Company Name");
            });

            document.getElementById("capacity").addEventListener("blur", function() {
                validateNumber(this, "capacity_error", "Enter Only Digits for Capacity");
            });

            document.getElementById("fual").addEventListener("blur", function() {
                validateDropdown(this, "fual_error", "Select Fuel Type");
            });

            document.getElementById("door").addEventListener("blur", function() {
                validateDropdown(this, "door_error", "Please Select Doors");
            });

            document.getElementById("engine-power").addEventListener("blur", function() {
                validateDropdown(this, "engine_power_error", "Please Select Engine Power");
            });

            document.getElementById("engine").addEventListener("blur", function() {
                validateDropdown(this, "engine_error", "Please Select Engine Type");
            });

            document.getElementById("fual-tank").addEventListener("blur", function() {
                validateDropdown(this, "fual_tank_error", "Please Select Fuel Capacity");
            });

            document.getElementById("break").addEventListener("blur", function() {
                validateDropdown(this, "break_error", "Please Select Brake Type");
            });

            document.getElementById("mile").addEventListener("blur", function() {
                validateNumber(this, "mile_error", "Please Enter Mileage in Digits");
            });

           
        });
    </script>

</body>

</html>