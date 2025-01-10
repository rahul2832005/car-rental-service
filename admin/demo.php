<?php
    $conn=mysqli_connect("localhost","root","","car_rent");

    if(!$conn)
    {
        echo "not connect";
    }

    if(isset($_POST["display"]))
    {
       
        $sql="select * from rahul where id=1";
        $result=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($result))
        {
           ?>
           <img src="rahul/<?php echo $row['image'] ?>" height="80" width="80"> 
           <br><input type="text" name="old_image" value="<?php  echo $row['image'] ?>">
           <?php
        }
    }

    if(isset($_POST["update"]))
    {
        
        $image=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $location='rahul/'.$image;

        $sql="update rahul set image='$image' where id=1";
        $result=mysqli_query($conn,$sql);

        if($result)
        {
            move_uploaded_file($tmp,$location);
            echo "success";
        }
        else{
            echo "not";
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

    <input type="file" name="image" id=""><br><br>
  <input type="submit" value="update" name="update">
<br><br>
    <input type="submit" value="display" name="display">
    

    </form>
       
</body>
</html>