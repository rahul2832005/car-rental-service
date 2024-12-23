<?php
$conn=mysqli_connect("localhost","root","","car_rent");

    if(isset($_POST['submit']))
    {
        $car_name=$_POST['car_name'];
        $modal=$_POST['modal'];
        $rent_price=$_POST['rent_price'];
        $no_plate=$_POST['num_plate'];
        $company_name=$_POST['company_name'];
        $seat=$_POST['capacity'];
        $fual=$_POST['fual'];
        $car_image=$_FILES['image']['name'];
        $car_image_tmp_name=$_FILES['image']['tmp_name'];
        $car_image_folder='upload/'.$car_image;

        if(empty($car_name) || empty($modal) || empty($rent_price) || empty($no_plate) || empty($company_name)||empty($seat) ||empty($fual)||empty($car_image) )
        {
            $message[]='please fill out all';
        }
        else
        {
            $insert="insert into car_list values('$car_name','$modal','$rent_price','$no_plate','$company_name','$car_image','$seat','$fual')";
            $upload=mysqli_query($conn,$insert);

            if($upload)
            {
                move_uploaded_file($car_image_tmp_name,$car_image_folder);
                $message[]='new car added successfully';

            }
            else
            {
                $message[]='could not add car';
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
<?php
       /* if(isset($message))
        {
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
        }*/
        ?>
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
               
               <input type="file" name="image" id="file">
               <label for="file">Upload Image</label>

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