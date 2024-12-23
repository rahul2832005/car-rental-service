<?php
@include "connection.php";

    if(isset($_POST['submit']))
    {
        $car_name=$_POST['name'];
        $rent_price=$_POST['price'];
        $seat=$_POST['seat'];
        $fual=$_POST['fual'];
        $car_image=$_FILES['image']['name'];
        $car_image_tmp_name=$_FILES['image']['tmp_name'];
        $car_image_folder='upload/'.$car_image;

        if(empty($car_name) || empty($rent_price) || empty($car_image) || empty($seat) || empty($fual) )
        {
            $message[]='please fill out all';
        }
        else
        {
            $insert="insert into car_list values('$car_name','$rent_price','$car_image','$seat','$fual')";
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
<html>
    <body>
        <?php
        if(isset($message))
        {
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name: </label>
            <input type="text" name="name" id="name"  value=""><br>

            <label for="price">Price: </label>
            <input type="number" name="price" id="price"  value=""><br>
            
            <label for="seat">Seat-Capacity: </label>
            <input type="number" name="seat" id="seat"  value=""><br>
            
            <label for="fual">Fual-Type: </label>
            <input type="text" name="fual" id="price"  value=""><br>
            
            
            <label for="image">Image: </label>
            <input type="file" name="image" id="image" accept=".jpg,.png,.jpeg"  value=""><br><br>
            
            <button type="submit" name="submit">submit</button>

        </form>
        <a href="data.php">data</a>
    </body>

</html>