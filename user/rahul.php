<?php

    $conn = mysqli_connect("localhost", "root", "", "car_rent");
    if(!$conn)
    {
     echo "not";
    }
   

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="rahul.php" method="post">
        <?php
        if(isset($_POST['submit']))
        {
            $sql="select * from gallery";
            $run=mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($run)>0)
            {
                while($row=mysqli_fetch_array($run))
                {
                    $image=explode(",",$row['image']);
    
                    //  print_r($image);
                     echo "<img src='/car%20rental%20service/admin/gallery/$image'/>";
                
            
           
        }
        ?>
        <button type="submit" name="submit">all</button>
        <?php
            }
        }
        ?>
    </form>
</body>
</html>