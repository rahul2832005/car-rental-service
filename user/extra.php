<?php
$conn = mysqli_connect("localhost", "root", "", "car_rent");
mysqli_select_db($conn, 'demo');

if (!$conn) {
    echo "not connect";
}

if (isset($_POST['submit'])) {
    $image = $_FILES['image'];

    $filename = $_FILES['image']['name'];

    $location="upload/";
    $imgname=implode(",",$filename);

    if(!empty($imgname))
    {
        foreach($filename as $key =>$val)
        {
            $target=$location.$val;
            move_uploaded_file($_FILES['image']['tmp_name'][$key],$target);

        }
        $insert="insert into demo (image) values('$imgname')";

        $run=mysqli_query($conn,$insert);

        if($run)
        {
           echo "image upload"; 
        }
        else
        {
            echo "not upload";
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
    <style>
        .design {
            width: 50%;
            margin: auto;
            padding: 20px 15px;
            background-color: #e91e63;
        }
    </style>
</head>

<body>
    <h2 align="center">multiple image uploading</h2>

    <div class="design">
        <form action="" method="post" enctype="multipart/form-data">
            please select image<br><br>
            <input type="file" name="image[]" multiple=""><br><br>
            <input type="submit" name="submit" id="">
        </form>
    </div>
    <?php
        $select="select * from demo where id='6'";
        $r=mysqli_query($conn,$select);

        $result=mysqli_fetch_array($r);

        $image=explode(",",$result['image']);
        print_r($image);

        foreach($image as $img)
        {
            echo "<img src='upload/$img' height='120' width='120'/>";
        }

     /*   if(mysqli_num_rows($r)>0)
       {
         while($row=mysqli_fetch_array($r))
         {
            ?>
            <img src="upload/<?php echo $row['image']; ?>">
            <?php
         }
       }*/
    ?>
</body>

</html>