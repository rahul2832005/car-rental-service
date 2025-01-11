<?php
error_reporting(0);
    $conn=mysqli_connect("localhost","root","","car_rent");

    if(!$conn)
    {
        echo "not";
    }

    if(isset($_GET['uid']))

    {
        $id=$_GET['uid'];
        

        $sql="select * from car_list where id=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_assoc($result); 
        
    }
    if(isset($_POST['update']))
    {
        $id=$_POST['car_id'];
        $car_name=$_POST['car_name'];
        $modal=$_POST['modal'];
        $rent_price=$_POST['rent_price'];
        $number=$_POST['num_plate'];
        $company_name=$_POST['company_name'];
        $seat=$_POST['capacity'];
        $fual=$_POST['fual'];
        $new_image=$_FILES['image']['name'];
        $old_image=$_POST['old_image'];

        if($new_image!="")
        {
            $update_image=$_FILES['image']['name'];
        }
        else
        {
            $update_image=$_POST['old_image'];
        }
        
        $sql="update car_list set name='$car_name',modal='$modal',price='$rent_price'
        ,no_plate='$number',company_name='$company_name',seat='$seat',fual='$fual',image='$update_image' where id='$id'";

        $result=mysqli_query($conn,$sql);

        if($result)
        {
            if($_FILES['image']['name']!="")
            {
                move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$_FILES['image']['name']);
                unlink("upload/".$_POST['old_image']);

            }
            $message[]="car updated successfully";
        }
        else
        {
            $message[]="not update car!";
        }

    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add car</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
    font-family:arial;
}

body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg,#f94449,#d1001f);
}

.container{
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 25px 30px;
    border-radius: 5px;
}

.container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
}

.container .title::before{
content: "";
position: absolute;
left: 0;
bottom: 0;
height: 3px;
width: 220px;
background: linear-gradient(135deg,#f94449,#c30010);
}

.container form .car_details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}

form .car_details .input-box{
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
}

.car_details .input-box .details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
    font-size: 20px;
}

.car_details .input-box input{
    height: 45px;
    width: 100%;
    outline: none;
    border-radius: 5px;
    border: 1px solid black;
    padding-left: 15px;
    font-size: 16px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.car_details .input-box input:focus,
.car_details .input-box input:valid{

border-color:#d1001f;
}

.file{
    margin-bottom: 15px;
}

.space{
    margin-right: 50px;
}
#file{
    font-size: 16px;
    background: white;
    border-radius: 5px;
    box-shadow: 5px 5px 10px black;
    width: 250px;
    outline: none;
}

::-webkit-file-upload-button{
    color: #fff;
    background:#d71929;
    padding: 8px;
    border: none;
    border-radius: 5px;
   
}

::-webkit-file-upload-button:hover{
    background: #f94449;
}

#fual{
        margin-bottom: 27px;
        text-align: left;
        font-size: 22px;
        width: 150px;
        border-radius: 4px;
        height: 43px;
        border: 1px solid #d1001f;
        
}

.fual-type{
    margin-right: 150px;
}

form .button{
    height: 45px;
    width: 45px 0;
}

form .button{
    width: 100%;
    outline: none;
    border: none;
    font-size: 30px;
    font-weight: 500;
    color: #fff;
    background:linear-gradient(135deg,#f94449,#c30010);
    border-radius: 5px;
}

label{
    height: 100px;
    width: 150px;
    border-radius: 6px;
    border: 1px dashed #999;
    margin-right: 147px;
    text-align: center;
    display: grid;
    place-items: center;
    font-size: 20px;
}

label:hover{
    border-color: #d1001f;
    border: 1px dashed ;
}

form .button input:hover{
    background:linear-gradient(-135deg,#f94449,#c30010);
}

@media (max-width:584px){
    .container{
        max-width: 100%;
    }

    form .car_details .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
    .container form .car_details{
        max-height: 300px;
        overflow-y: scroll;
    }
    .car_details::-webkit-scrollbar{
        width: 0;
    }
}
    </style>
</head>

<body>

    <div class="container">
        <div class="title">Update Car Details  
       
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="car_details">

            <div class="input-box">
                    <span class="details">Car Id</span>
                    <input type="text" name="car_id" id="" placeholder="Enter Car Id" value="<?php echo $user['id']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">Car Name</span>
                    <input type="text" name="car_name" id="" placeholder="Enter Car Name" value="<?php echo $user['name']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">Car Modal</span>
                    <input type="number" name="modal" id="" placeholder="Enter Car Modal" value="<?php echo $user['modal']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">Rent Price</span>
                    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price" value="<?php echo $user['price']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">No. plate</span>
                    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate" value="<?php echo $user['no_plate']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">Car Company Name</span>
                    <input type="text" name="company_name" id="" placeholder="Enter Car Company" value="<?php echo $user['company_name']; ?>">
                </div>

                <div class="input-box">
                    <span class="details">Car Capacity</span>
                    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity" value="<?php echo $user['seat']; ?>">
                </div>
               
                <div class="file">
                <input type="file" name="image" id="file" value="<?php echo $user['image']; ?>"/ >
                <input type="hidden" name="old_image" id="file" value="<?php echo $user['image']; ?>"/ >
                </div>
                

                <div class="fual-type">
                    <select name="fual" id="fual">
                        <option value="type" id="option"
                        <?php 
                        if($user['fual']=='type')
                        {
                            echo "selected";
                        } 
                        ?> 
                        >Fual Type</option>
                        <option value="Petrol" id="option" 
                        <?php 
                        if($user['fual']=='Petrol')
                        {
                            echo "selected";
                        } 
                        ?>
                            >Petrol</option>
                        <option value="Diesel" id="option"
                        <?php 
                        if($user['fual']=='Diesel')
                        {
                            echo "selected";
                        } 
                        ?>>Diesel</option>
                        <option value="CNG" id="option"
                        <?php 
                        if($user['fual']=='CNG')
                        {
                            echo "selected";
                        } 
                        ?>>CNG</option>
                    </select>
                </div>
            
            </div>
            <div class="button">
            <button type="submit" name="update" class="button">Update Car Details</button>
                    <!--<input type="button" value="Add Car" name="submit">-->
                </div>
                <?php
        if(isset($message))
        {
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
        }
        ?>
        </form>
    </div>
</body>

</html>