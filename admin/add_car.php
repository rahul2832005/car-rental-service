<?php
//error_reporting(0);
$conn=mysqli_connect("localhost","root","","car_rent");
if (!$conn) {
    echo "not";
}

$cn=$mod=$rp=$np=$cname=$se=$fu=$ier="";
$car_name=$modal=$rent_price=$no_plate=$company_name=$seat=$fual="";
if(isset($_POST['submit']))
{
    $car_name=$_POST['car_name'];
    $modal=$_POST['modal'];
    $rent_price=$_POST['rent_price'];
    $no_plate=$_POST['num_plate'];
    $company_name=$_POST['company_name'];
    $seat=$_POST['capacity'];
    $fual=$_POST['fual'];

   

    if($car_name=="")
    {
        $cn="Enter Car Name";
    }
    if($modal=="")
    {
        $mod="Enter Car Model";
    }
    elseif(!is_numeric($modal))
    {
        $mod ="Enter Only Digit";
    }
    if($rent_price==""){
        $rp="Enter Car Rent Price";}
    elseif(!is_numeric($modal)){
        $rp ="Enter Only Digit";}

        if($no_plate==""){
            $np="Enter Car Number";}

        if($company_name==""){
                $cname="Enter Car Company Name";}   
        
         if($seat==""){
             $se="Enter Capacity";}
        elseif(!is_numeric($seat)){
              $se ="Enter Only Digit";}

        if($fual=="type")
        {
            $fu="Select Fual Type";
        }
     $file_name = $_FILES['image']['name'];
     $location = "img/";
     $image_name = implode(",", $file_name);
    if($image_name!="")
    {
        if (!empty($file_name))
         {
            foreach ($file_name as $key => $val) 
            {
                $target = $location . $val;
                move_uploaded_file($_FILES['image']['tmp_name'][$key], $target);
                
               
            }
            $insert = "insert into car_list (name,modal,price,no_plate,company_name,image,seat,fual) values ('$car_name',$modal,$rent_price,'$no_plate','$company_name','$image_name',$seat,'$fual')";
            $run = mysqli_query($conn, $insert);
            if ($run == true)
            {
                echo "<script>alert('Car Added Succesfull')</script>";
            }
            else
            {
                echo "not";
            }
        
    
        }
    }
    else
    {
        $ier="Please select File";
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
</head>

<body>

    <div class="container">
        <div class="title">Add Car</div>
        
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="bi-txt"><u><b>Basic Info.<span style="color: red;">*</span> </b></u></div>
        <div class="car_details">
                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="" placeholder="Enter Car Name" value="<?php echo $car_name; ?>">
                    <p style="color: red;"><?php echo $cn; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="" placeholder="Enter Car Modal" value="<?php echo $modal; ?>">
                    <p style="color: red;"><?php echo $mod; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">Rent Price</span>
                    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price" value="<?php echo $rent_price; ?>">
                    <p style="color: red;"><?php echo $rp; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate" value="<?php echo $no_plate ;?>">
                    <p style="color: red;"><?php echo $np; ?></p>
                </div>
                <div class="input-box">
                    <span class="details">Car Company Name</span>
                    <input type="text" name="company_name" id="" placeholder="Enter Car Company" value="<?php echo $company_name; ?>">
                    <p style="color: red;"><?php echo $cname; ?></p>
                
                </div>

                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity" value="<?php echo $seat ;?>">
                    <p style="color: red;"><?php echo $se; ?></p>
                </div>
               
                
                <div class="fual-type">
                <p style="color: red;"><?php echo $fu; ?></p>
                    <select name="fual" id="fual">
                        <option value="type" id="option">Fual Type</option>
                        <option value="Petrol" id="option">Petrol</option>
                        <option value="Diesel" id="option">Diesel</option>
                        <option value="CNG" id="option">CNG</option>
                    </select>
                   
                </div>
                <div class="up-img-txt"><u><b>Upload Images<span style="color: red;">*</span> </b></u></div>
                

                <p>Image1<span style="color: red;">*</span><span style="color: red;"><?php echo $ier; ?></span>
                <input type="file" name="image[]" multiple="multiple" id="file"><br>
                <label for="file">Upload Image</label>     
           </p> 
            </div>
            <div class="ace-txt"><u><b>Acessories<span style="color: red;">*</span> </b></u></div>
            
                <div class="ace-chk">
                <input type="checkbox" id="airconditioner" name="airconditioner" value="1">Air Conditioner
                <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">Power Door Locks
                <input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">AntiLock Braking System
                
            </div>
            <div class="ace-chk">
                <input type="checkbox" id="powersteering" name="powersteering" value="1">Power Steering 
                <input type="checkbox" id="driverairbag" name="driverairbag" value="1">Driver Airbag
                <input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">Passenger Airbag
                <input type="checkbox" id="powerwindow" name="powerwindow" value="1">Power Windows 
                
            </div>
            <div class="ace-chk">
                <input type="checkbox" id="centrallocking" name="centrallocking" value="1">Central Locking
                <input type="checkbox" id="crashcensor" name="crashcensor" value="1">Crash Sensor
                <input type="checkbox" id="leatherseats" name="leatherseats" value="1">Leather Seats 
                <input type="checkbox" id="brakeassist" name="brakeassist" value="1">Brake Assist
            </div>
        
        
            <div class="button">
            <button type="submit" name="submit" class="button">Add Car</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>
        </form>
    </div>
</body>

</html>
