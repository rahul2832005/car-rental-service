<?php
include "include/config.php";

$booking_id = $_GET['id'];

// Reject modification request
$query = "UPDATE booking SET modification_status = 'rejected' WHERE id = $booking_id";

if (mysqli_query($conn, $query)) {
    echo "Modification request rejected!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
