<?php

$conn=mysqli_connect("localhost","root","","car_rent");


$vid = $_GET['vid'];
$userEmail = $_GET['userEmail'];

$query="select * from booking where vid=$vid";
$res=mysqli_query($conn,$query);

if($res){
    $row=mysqli_fetch_assoc($res); }
else{
    echo "data not found";
}


$status=1;


$update="update booking set status=$status where vid=$vid";
$q=mysqli_query($conn,$update);



if($q){

    echo "<script>alert('Approve')</script>";
    header("Location:new-booking.php");
}
else{
    echo "<script>alert('book not  approved')</script>";
}

?>




