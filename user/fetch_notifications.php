<?php
@include "include/config.php";
session_start();

if (!isset($_SESSION['alogin'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$user_id = $_SESSION['alogin']; // Assuming you store userEmail in session after login
$current_date = date('Y-m-d', strtotime('+0 day')); // Get the current date (only date part)

// Query to check if any bookings have ToDate with today's date (ignoring time part)
$sql = "SELECT vid FROM booking WHERE DATE(ToDate) = '$current_date' AND userEmail = '$user_id' AND status=1";
$result = mysqli_query($conn, $sql);

$notifications = [];
while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = "Car with ID {$row['vid']} is due ToDay !";
}

if (empty($notifications)) {
    $notifications[] = "No cars are due ToDay !";
}

echo json_encode($notifications);
?>
