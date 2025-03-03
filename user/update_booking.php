<?php
include "include/config.php";

$booking_id = $_GET['booking_id'];
$new_start_date = $_GET['new_start_date'];
$new_end_date = $_GET['new_end_date'];

$update_query = "UPDATE booking SET 
                FromDate = '$new_start_date', 
                ToDate = '$new_end_date',
                modification_status = 'approved'
                WHERE id = $booking_id";

if (mysqli_query($conn, $update_query)) {
    echo "<script>alert('Your booking has been modified successfully!');
    window.location.href='my_booking.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
