<?php
@include "include/config.php";
 if(isset($_GET['vid']))

    {
        $id=$_GET['vid'];
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

    if(isset($_GET['uid']))

    {
        $id=$_GET['uid'];
        // echo $id;

        $sql="select * from reguser where uid=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 

        $sql="delete from reguser where uid=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            
                echo "<script>alert('delete success')
                 window.open('reguser.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }




    
    if(isset($_GET['bid']))

    {
        $id=$_GET['bid'];
        // echo $id;

        $sql="select * from brands where bid=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 

        $sql="delete from brands where bid=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            
                echo "<script>alert('delete success')
                 window.open('managebrand.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }
    

?>
