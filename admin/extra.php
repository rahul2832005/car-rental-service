<?php

@include "include/config.php";

if (isset($_POST["btn"])) {

    
    $car_name=$_POST['car_name'];
    $modal=$_POST['modal'];
    $rent_price=$_POST['rent_price'];
    $no_plate=$_POST['num_plate'];
    $company_name=$_POST['company_name'];
    $seat=$_POST['capacity'];
    $fual=$_POST['fual'];

    $file_name = $_FILES['image']['name'];
    $location = "img/";
    $image_name = implode(",", $file_name);

    if (!empty($file_name)) {
        foreach ($file_name as $key => $val) {
            $target = $location . $val;
            move_uploaded_file($_FILES['image']['tmp_name'][$key], $target);
        }
        $insert = "insert into car_list (name,modal,price,no_plate,company_name,image,seat,fual) values ('$car_name',$modal,$rent_price,'$no_plate','$company_name','$image_name',$seat,'$fual')";

        $run = mysqli_query($conn, $insert);

        if ($run == true) {
            echo "image upload success";
        }
        else
        {
            echo "not";
        }
    }
}
if (isset($_POST['dis'])) {

    $fetch_query= mysqli_query($conn, "select * from demo where id=13");
    $result=mysqli_fetch_array($fetch_query);
    $image=explode(",",$result['image']);

    $index=0;
    echo "<img src='img/$image[$index]' height='420' width='420'/>";
    echo "<br/>";

    $index=1;
    echo "<img src='img/$image[$index]' height='420' width='420'/>";
    echo "<br/>";

    $index=2;
    echo "<img src='img/$image[$index]' height='420' width='420'/>";
    echo "<br/>";

   
    echo "<form method='get'>";
    for($i=0;$i<count($image);$i++)
    {
        echo "<button type='submit' value='$i' name='image'>";
        echo "<img src='img/$image[$i]' height='120' widht='120'/>";
        echo "</button>";
    }
    echo "</form>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

 

    <input type="text" name="car_name" id="" placeholder="Enter Car Name"><br><br>

    <input type="number" name="modal" id="" placeholder="Enter Car Modal"><br><br>

    <input type="number" name="rent_price" id="" placeholder="Enter Car-Rent Price"><br><br>

    <input type="text" name="num_plate" id="" placeholder="Enter Car No.Plate"><br><br>

    <input type="text" name="company_name" id="" placeholder="Enter Car Company"><br><br>

    <input type="number" name="capacity" id="" placeholder="Enter Car Capacity"><br><br>

    <select name="fual" id="fual">
                        <option value="type" id="option">Fual Type</option>
                        <option value="Petrol" id="option">Petrol</option>
                        <option value="Diesel" id="option">Diesel</option>
                        <option value="CNG" id="option">CNG</option>
                    </select><br><br>

    <input type="file" name="image[]" multiple="multiple"><br><br>

        <input type="submit" value="submit" name="btn"><br><br>

        <input type="submit" value="display" name="dis"><br><br>
    </form>

</body>

</html>
