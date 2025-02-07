<?php
@include "include/config.php";
session_start();
// error_reporting(0);
/*   RazorPay Integration  */
$vid = $_GET['vid'];
$uid = $_SESSION['userid'];
$useremail = $_SESSION['alogin'];


$sdate = date('Y-m-d');
$fdate = $tdate = $pick_up_loc = "";
$errors = [];


if (isset($_POST['Book'])) {
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    $pick_up_loc = $_POST['pick_up_loc'];
    $drop_of_loc = $_POST['drop_of_loc'];
    $rent_type = $_POST['rent_type'];

    $status = 0;
    $bookingno = mt_rand(1000, 9999);


    if (empty($fdate)) {
        $errors['fdate'] = "Select a pickup date.";
    }
    if (empty($tdate)) {
        $errors['tdate'] = "Select a drop-off date.";
    }
    if (!empty($fdate) && !empty($tdate) && $fdate > $tdate) {
        $errors['date'] = "Pickup date cannot be after drop-off date.";
    }
    if (empty($pick_up_loc)) {
        $errors['pick_up_loc'] = "Select a pickup location.";
    }
    if (empty($drop_of_loc)) {
        $errors['drop_of_loc'] = "Select a drop-off location.";
    }

    if (empty($errors)) {
        $avlquery = "SELECT * FROM booking 
                     WHERE vid = $vid
                     AND status != 2
                     AND ('$fdate' BETWEEN DATE(FromDate) AND DATE(ToDate) 
                          OR '$tdate' BETWEEN DATE(FromDate) AND DATE(ToDate) 
                          OR (FromDate BETWEEN '$fdate' AND '$tdate') 
                          OR (ToDate BETWEEN '$fdate' AND '$tdate'))";

        $exavlquery = mysqli_query($conn, $avlquery);
        if (mysqli_num_rows($exavlquery) > 0) {
            echo "<script>alert('Car already booked for the selected dates');</script>";
            echo "<script>document.location = 'dis_car.php';</script>";
        } else {
            
               

                $sql = "INSERT INTO booking (bookingno, userEmail, vid, FromDate, ToDate, status,pickup,dropof) 
                VALUES ('$bookingno', '$useremail', '$vid', '$fdate', '$tdate', '$status','$pick_up_loc','$drop_of_loc')";




                if (mysqli_query($conn, $sql)) {


                    echo "<script>alert('Booking successful');</script>";
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
            
        }
    }
}
?>