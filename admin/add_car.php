<?php
// error_reporting(0);
@include "include/config.php";
$allimages = [];
$count=0;
$imageError1 = $imageError2 = $imageError3 = ""; 
$cn=$mod=$rp=$np=$cname=$se=$fu=$ire=$mile=$dr=$et=$pr=$br=$mile=$ft=$ml=$crp="";
$car_name=$modal=$rent_price=$no_plate=$company_name=$seat=$fual=$power=$engine=$f_tank=$break=$door=$chprice="";
if(isset($_POST['submit']))
{
    $car_name=$_POST['car_name'];
    $modal=$_POST['modal'];
    $rent_price=$_POST['rent_price'];
    $chprice=$_POST['chprice'];
    $no_plate=$_POST['num_plate'];
    $brand=$_POST['brand'];
    $seat=$_POST['capacity'];
    $fual=$_POST['fual'];
    $door=$_POST['door'];
    $power=$_POST['engine-power'];
    $engine=$_POST['engine'];
    $break=$_POST['break'];
    $f_tank=$_POST['fual-tank'];
    $mile=$_POST['mile'];
    $accessories = $_POST['accessories'];

    
   

    if($car_name=="")
    {
        $cn="Enter Car Name";
        $count++;
    }
    if($modal=="")
    {
        $mod="Enter Car Model";
        $count++;
    }
    elseif(!is_numeric($modal))
    {
        $mod ="Enter Only Digit";
        $count++;
    }
    if($rent_price==""){
        $rp="Enter Car Rent Price per/Day";
        $count++;
    }
    elseif(!is_numeric($rent_price)){
        $rp ="Enter Only Digit";
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

        if($no_plate==""){
            $np="Enter Car Number";
            $count++;
        }

        if($brand==""){
                $cname="Enter Car Company Name";
                $count++;
            
            }   
        
         if($seat==""){
             $se="Enter Capacity";
             $count++;
            }
        elseif(!is_numeric($seat)){
              $se ="Enter Only Digit";
              $count++;
            }

        if($fual=="type")
        {
            $fu="Select Fual Type";
            $count++;
        }
        if($door=="")
        {
            $dr="Please Select Door";
            $count++;
        }
        if($power=="")
        {
            $pr="Please Select  Engine Power";
            $count++;
        }
        if($engine=="")
        {
            $et="Please Select  Engine Type";
            $count++;
        }
        if($f_tank=="")
        {
            $ft="Please Select FuaL capacity";
            $count++;
        }
        if($break=="")
        {
            $br="Please Select Break type";
            $count++;
        }
        if($mile=="")
        {
            $ml="Please Enter Milage";
            $count++;
        }
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
       
      if($count==0)
      {
    // Loop through each input field (image1[], image2[], image3[]) and process files
    foreach ($_FILES as $inputName => $file) {
        // Check if files are uploaded for this field
        if (isset($file['name']) && is_array($file['name'])) {
            $fileNames = $file['name'];
            $location = "img/";

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
        $accessories_list = mysqli_real_escape_string($conn, implode(', ', $accessories));

        $imagePathsWithoutimg = str_replace("img/", "", $imagePaths);
        
        $insert = "insert into car_list (cname,modal,chprice,price,no_plate,brand,image,seat,fual,door,en_power,en_type,break_type,fual_capacity,mileage,accessories)
    values ('$car_name',$modal,$chprice,$rent_price,'$no_plate','$brand','$imagePathsWithoutimg',$seat,'$fual',$door,'$power','$engine','$break',$f_tank,$mile,'$accessories_list')";
        $run = mysqli_query($conn, $insert);

        if ($run) {
            echo "<script>alert('Car Added Successfully');</script>";
      
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
        echo "<script>window.open('add_car.php', 'second');</script>";
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
      
        
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="title">Add Car</div>
        <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
        <div class="car_details">
                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="" placeholder="Enter Car Name" value="<?php echo $car_name; ?>">
                    <p style="color: red;"><?php echo $cn; ?></p>
                </div>

                <div class="select-box">
                <p style="color: red;"><?php echo $cname; ?></p>
                <span class="details" style="display:block;font-size:20px;margin-top:-11px;">Select Car Brand :</span>
                    <select name="brand" id="brand" style="margin-right: 121px;">
                    <option value="">Select Brand</option>
                        <?php  
                            $selectbrand="select * from brands";
                            $exselect=mysqli_query($conn,$selectbrand);

                            while($row=mysqli_fetch_assoc($exselect))
                            {?>
                                <option value="<?php echo $row['bname']; ?>"><?php echo $row['bname']; ?></option>
                           <?php }
                        ?>
                    </select>
                            </div>
                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="" placeholder="Enter Car Modal" value="<?php echo $modal; ?>">
                    <p style="color: red;"><?php echo $mod; ?></p>
                </div>

                <div class="input-box">
                    <span class="details">Rent Price per/Hour</span>
                    <input type="number" name="chprice" id="" placeholder="Enter Car-Rent Price" value="<?php echo $chprice; ?>">
                    <p style="color: red;"><?php echo $crp; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">Rent Price Per/Day</span>
                    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price" value="<?php echo $rent_price; ?>">
                    <p style="color: red;"><?php echo $rp; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate" value="<?php echo $no_plate ;?>">
                    <p style="color: red;"><?php echo $np; ?></p>
                </div>
             

                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity" value="<?php echo $seat ;?>">
                    <p style="color: red;"><?php echo $se; ?></p>
                </div>
               
                
                <div class="fual-type">
                <p style="color: red;"><?php echo $fu; ?></p>
                <span class="details">Select Fual :</span>
                    <select name="fual" id="fual">
                        <option value="type" >Fual Type</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="CNG">CNG</option>
                    </select>
                   
                </div>
                
                
            <!-- Input for multiple images for the first input -->
            <div class="up-img">
                    Upload Image1<span style="color: red;">*</span>
                    <span style="color: red;"><?php echo $ire; ?></span>
                    <input type="file" name="image1[]" multiple onchange="previewImages(this, 'imagePreview1')"><br>
                    <div id="imagePreview1"></div> <!-- Preview container for image1 -->
                    <p style="color: red;"><?php echo $imageError1; ?></p>

                </div>
    
                <!-- Input for multiple images for the second input -->
                <div class="up-img">
                    Upload Image2<span style="color: red;">*</span>
                    <input type="file" name="image2[]" multiple onchange="previewImages(this, 'imagePreview2')"><br>
                    <div id="imagePreview2"></div> <!-- Preview container for image1 -->
                    <p style="color: red;"><?php echo $imageError2; ?></p>

                </div>

                <!-- Input for multiple images for the third input -->
                <div class="up-img">
                    Upload Image3<span style="color: red;">*</span>
                    <input type="file" name="image3[]" multiple onchange="previewImages(this, 'imagePreview3')"><br>
                    <div id="imagePreview3"></div> <!-- Preview container for image1 -->
                    <p style="color: red;"><?php echo $imageError3; ?></p>

                </div>
           
          
            </div>
            
            <div class="bi-txt"><u><b>Accessories.<span style="color: red;">*</span> </b></u></div>
            <div class="accessories">
            <div class="select-box">
                <p style="color: red;"><?php echo $dr; ?></p>
                <span class="details">Select Doors :</span><br>
                    <select name="door" id="door">
                        <option value="">Doors</option>
                        <option value="2">2 Door</option>
                        <option value="4">4 Door</option>
                        <option value="5">5 Door</option>
                    </select>
                   
                </div>
                <div class="select-box">
                <p style="color: red;"><?php echo $ft; ?></p>
                <span class="details">Select Fual Capacity :</span>
                    <select name="fual-tank" id="fual-tank">
                        <option value="">Fual Capacity</option>
                        <option value="20">20 Ltr</option>
                        <option value="40">40 Ltr</option>
                        <option value="50">50 Ltr</option>
                    </select>
                   
                </div>

                <div class="select-box">
                <p style="color: red;"><?php echo $br; ?></p>
                <span class="details">Select Break Type :</span>
                    <select name="break" id="break">
                        <option value="">Break-Type</option>
                        <option value="disc break">Disc Break</option>
                        <option value="Carbon break">Carbon Break</option>
                        <option value="ABS break">ABS Break</option>
                    </select>
                   
                </div>

                <div class="select-box">
                <p style="color: red;"><?php echo $et; ?></p>
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
                <p style="color: red;"><?php echo $pr; ?></p>
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
                <p style="color: red;"><?php echo $ml; ?></p>
                <div class="mil">
                    <span class="mi-de">Milage: </span>
                    <input type="text" name="mile" id="mil" placeholder="Enter Car Mielage">
                </div>




                <div class="container1">
        <h2>Accessories</h2>
            <div class="accessories">
                <label><input type="checkbox" name="accessories[]" value="Air Conditioner"> Air Conditioner</label>
                <label><input type="checkbox" name="accessories[]" value="Power Steering"> Power Steering</label>
                <label><input type="checkbox" name="accessories[]" value="CD Player"> CD Player</label>
                <label><input type="checkbox" name="accessories[]" value="Power Door Locks"> Power Door Locks</label>
                <label><input type="checkbox" name="accessories[]" value="Driver Airbag"> Driver Airbag</label>
                <label><input type="checkbox" name="accessories[]" value="Central Locking"> Central Locking</label>
                <label><input type="checkbox" name="accessories[]" value="AntiLock Braking System"> AntiLock Braking System</label>
                <label><input type="checkbox" name="accessories[]" value="Brake Assist"> Brake Assist</label>
                <label><input type="checkbox" name="accessories[]" value="Passenger Airbag"> Passenger Airbag</label>
                <label><input type="checkbox" name="accessories[]" value="Crash Sensor"> Crash Sensor</label>
                <label><input type="checkbox" name="accessories[]" value="Power Windows"> Power Windows</label>
                <label><input type="checkbox" name="accessories[]" value="Leather Seats"> Leather Seats</label>
            </div>
            
    </div> 
            <div class="button">
            <button type="submit" name="submit" class="btn">Add Car</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>

        </form>
    </div>
    
</body>

</html>