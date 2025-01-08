<?php

$conn = mysqli_connect("localhost", "root", "", "car_rent");
if (!$conn) {
    echo "not";
}

if (isset($_POST["btn"])) {
    $image = $_FILES['image'];

    $file_name = $_FILES['image']['name'];
    $location = "img/";
    $image_name = implode(",", $file_name);

    if (!empty($file_name)) {
        foreach ($file_name as $key => $val) {
            $target = $location . $val;
            move_uploaded_file($_FILES['image']['tmp_name'][$key], $target);
        }
        $insert = "insert into demo (image) values ('$image_name')";

        $run = mysqli_query($conn, $insert);

        if ($run == true) {
            echo "image upload success";
        }
    }
}
if (isset($_POST['dis'])) {

    $fetch_query= mysqli_query($conn, "select * from demo where id=10");
    $result=mysqli_fetch_array($fetch_query);
    $image=explode(",",$result['image']);

    foreach($image as $img)
    {
        echo "<img src='img/$img' height='120' width='120'/>";
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

        <input type="submit" value="display" name="dis">
    </form>

</body>

</html>