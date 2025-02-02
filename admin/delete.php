<?php
 $conn=mysqli_connect("localhost","root","","car_rent");

 if(!$conn)
 {
     echo "not";
 }

 if(isset($_GET['uid']))

    {
        $id=$_GET['uid'];
        // echo $id;

        $sql="select * from car_list where vid=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 
        $image=explode(",",$user['image']);
            
        // echo count($image);

        // print_r($image);

        $sql="delete from car_list where vid=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            for($i=0;$i<count($image);$i++)
            {
                unlink("img/".$image[$i]); 
            }
                echo "<script>alert('delete success')
                 window.open('managecar.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }


    

?>
