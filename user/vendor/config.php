<?php  
session_start();
    $conn=mysqli_connect("localhost","root","","car_rent");
    if(!$conn)
    {
        echo "Not connect";
    }

?>