<?php
@include "include/config.php";
    if(isset($_POST['submit']))
    {
        $car_id=$_POST['car_id'];
        $car_name=$_POST['car_name'];
        $modal=$_POST['modal'];
        $rent_price=$_POST['rent_price'];
        $no_plate=$_POST['num_plate'];
        $company_name=$_POST['company_name'];
        $seat=$_POST['capacity'];
        $fual=$_POST['fual'];
        $file_name =$_FILES['image']['name'];
        $location = "upload/";
         $image_name = implode(",", $file_name);

        if (!empty($file_name)) 
        {
            foreach ($file_name as $key => $val) 
            {
                $target = $location . $val;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], $target);
            }
            $insert="insert into car_list values('$car_id','$car_name','$modal','$rent_price','$no_plate','$company_name','$image_name','$seat','$fual')";
    
            $run = mysqli_query($conn,$insert);
    
            if ($run == true) {
                echo "image upload success";
            }
            else
            {
                echo "not add";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_car_style.css">
    <title>add car</title>
</head>

<body>

    <div class="container">
        <div class="title">Add Car  
        <?php
        if(isset($message))
        {
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
        }
        ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="car_details">

            <div class="input-box">
                    <span class="details">Car Id</span>
                    <input type="text" name="car_id" id="" placeholder="Enter Car Id">
                </div>
                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="" placeholder="Enter Car Name">
                </div>
                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="" placeholder="Enter Car Modal">
                </div>
                <div class="input-box">
                    <span class="details">Rent Price</span>
                    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price">
                </div>
                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate">
                </div>
                <div class="input-box">
                    <span class="details">Car Company Name</span>
                    <input type="text" name="company_name" id="" placeholder="Enter Car Company">
                </div>

                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity">
                </div>
               
                <div class="file">
                <input type="file" name="image[]" id="file" multiple="multiple"/>
                </div>

                <div class="fual-type">
                    <select name="fual" id="fual">
                        <option value="type" id="option">Fual Type</option>
                        <option value="Petrol" id="option">Petrol</option>
                        <option value="Diesel" id="option">Diesel</option>
                        <option value="CNG" id="option">CNG</option>
                    </select>
                </div>
            
            </div>
            <div class="button">
            <button type="submit" name="submit" class="button">Add Car</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>
                
        </form>
    </div>
</body>

</html>