<?php
// error_reporting(0);
$conn=mysqli_connect("localhost","root","","car_rent");
if (!$conn) {
    echo "not";
}

$cn=$mod=$rp=$np=$cname=$se=$fu=$ier=$mile=$dr=$et=$pr=$br=$mile=$ft=$ml="";
$car_name=$modal=$rent_price=$no_plate=$company_name=$seat=$fual=$power=$engine=$f_tank=$break=$door="";
if(isset($_POST['submit']))
{
    $car_name=$_POST['car_name'];
    $modal=$_POST['modal'];
    $rent_price=$_POST['rent_price'];
    $no_plate=$_POST['num_plate'];
    $company_name=$_POST['company_name'];
    $seat=$_POST['capacity'];
    $fual=$_POST['fual'];
    $door=$_POST['door'];
    $power=$_POST['engine-power'];
    $engine=$_POST['engine'];
    $break=$_POST['break'];
    $f_tank=$_POST['fual-tank'];
    $mile=$_POST['mile'];
    
   

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
        if($door=="")
        {
            $dr="Please Select Door";
        }
        if($power=="")
        {
            $pr="Please Select  Engine Power";
        }
        if($engine=="")
        {
            $et="Please Select  Engine Type";
        }
        if($f_tank=="")
        {
            $ft="Please Select FuaL capacity";
        }
        if($break=="")
        {
            $br="Please Select Break type";
        }
        if($mile=="")
        {
            $ml="Please Enter Milage";
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
            $insert = "insert into car_list (name,modal,price,no_plate,company_name,image,seat,fual,door,en_power,en_type,break_type,fual_capacity,mileage)
             values ('$car_name',$modal,$rent_price,'$no_plate','$company_name','$image_name',$seat,'$fual',$door,'$power','$engine','$break',$f_tank,$mile);";
            $run = mysqli_query($conn, $insert);
            if ($run == true)
            {
                echo "<script>alert('Car Added Succesfully')</script>";
            }
            else
            {
               echo "<script>alert('Someing Went Wrong')</script>";
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
<?php
       /* if(isset($message))
        {
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
        }*/
    ?>
    <div class="container">
      
        
        <form action="" method="post" enctype="multipart/form-data" >
        <div class="title">Add Car  
        
        </div>
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
                <span class="details">Select Fual </span>
                    <select name="fual" id="fual">
                        <option value="type" >Fual Type</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="CNG">CNG</option>
                    </select>
                   
                </div>
                
                
            <div class="up-img">
            Upload Images<span style="color: red;">*</span>
                <span style="color: red;"><?php echo $ier; ?></span>
                <input type="file" name="image[]" multiple="multiple" id="file"><br>
                <label for="file">Upload Image</label>     
                
            </div>
            </div>
            
            <div class="bi-txt"><u><b>Accessories.<span style="color: red;">*</span> </b></u></div>
            <div class="accessories">
            <div class="select-box">
                <p style="color: red;"><?php echo $dr; ?></p>
                <span class="details">Select Doors :</span>
                    <select name="door" id="door">
                        <option value="">Doors</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                   
                </div>
                <div class="select-box">
                <p style="color: red;"><?php echo $ft; ?></p>
                <span class="details">Select Fual Capacity :</span>
                    <select name="fual-tank" id="fual-tank">
                        <option value="">Fual Capacity</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                   
                </div>

                <div class="select-box">
                <p style="color: red;"><?php echo $br; ?></p>
                <span class="details">Select Break Type :</span>
                    <select name="break" id="break">
                        <option value="">Break-Type</option>
                        <option value="disc brakes">disc brakes</option>
                        <option value="drum brakes">drum brakes</option>
                        <option value="anti-lock brakes">anti-lock brakes</option>
                    </select>
                   
                </div>

                <div class="select-box">
                <p style="color: red;"><?php echo $et; ?></p>
                <span class="details">Select Engine Type :</span>
                    <select name="engine" id="engine">
                        <option value=""> Engine Type</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Diesel engine">Diesel engine</option>
                        <option value=" Gas Engines"> Gas Engines</option>
                       
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
                    <input type="text" name="mile" id="mil" placeholder="Enter Car No.Plate">
                </div>
                
            <div class="button">
            <button type="submit" name="submit" class="button">Add Car</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>
        </form>
    </div>
</body>

</html>