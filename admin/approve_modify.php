<?php
include "include/config.php";

$booking_id = $_GET['id'];

// Update booking details
$query = "UPDATE booking SET 
            FromDate = new_start_date, 
            ToDate = new_end_date, 
            modification_status = 'approved'
          WHERE id = $booking_id";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Booking has been modified successfully!');
    window.loaction.href='confirmed-booking.php';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
