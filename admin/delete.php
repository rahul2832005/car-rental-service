<?php
error_reporting(0);
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

    if(isset($_GET['did']))

    {
        $id=$_GET['did'];
        // echo $id;

        $sql="select * from driver where did=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 

        $sql="delete from driver where did=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            
                echo "<script>alert('delete success')
                 window.open('managedriver.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }

    if(isset($_GET['fid']))

    {
        $id=$_GET['fid'];
        // echo $id;

        $sql="select * from feedback where fid=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 

        $sql="delete from feedback where fid=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            
                echo "<script>alert('delete success')
                 window.open('manage_feedback.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }
    
    // contacct us query delete

    if(isset($_GET['contactid']))

    {
        $id=$_GET['contactid'];
        // echo $id;

        $sql="select * from contactusquery where contactid=$id";

        $result=mysqli_query($conn,$sql) or die("can not fetch the data.".mysqli_error($conn));
        $user=mysqli_fetch_array($result); 

        $sql="delete from contactusquery where contactid=$id";;

        $run=mysqli_query($conn,$sql);

        if($run==true)
        {
            
                echo "<script>alert('delete success')
                 window.open('manage_contactus_query.php', 'second');</script>";
         
        }
        else
        {
            echo "<script>alert('not delete ')</script>";
        }

        
    }
    
    

?>
