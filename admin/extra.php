<?php

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    echo "not";
}

if (isset($_POST["btn"])) 
{
    $image=$_FILES['image'];

    $file_name=$_FILES['image']['name'];
    $location="img/";
    $image_name=implode(",",$file_name);

    if(!empty($file_name))
    {
        foreach($file_name as $key => $val)
        {
                $target=$location.$val;
                move_uploaded_file($_FILES['image']['tmp_name'][$key],$target);
                
        }
        $insert="insert into demo (image) values ('$image_name')";

        $run=mysqli_query($conn,$insert);

        if($run==true)
        {
            echo "image upload success";
        }
    }
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

        <input type="file" name="image[]" multiple="multiple">

        <input type="submit" value="submit" name="btn">
    </form>

</body>

</html>