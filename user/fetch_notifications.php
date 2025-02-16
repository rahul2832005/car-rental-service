<?php
@include "include/config.php";
session_start();

if (!isset($_SESSION['alogin'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$user_id = $_SESSION['alogin']; // Assuming you store user_id in session after login
$tomorrow = date('Y-m-d', strtotime('+1 day'));

// $sql = "SELECT vid FROM booking WHERE ToDate = '$tomorrow' AND userEmail = '$user_id'";
// $sql = "SELECT vid FROM booking where userEmail = '$user_id'";
$sql = "SELECT vid FROM booking where ToDate='$tomorrow' and  userEmail = '$user_id'";
$result = mysqli_query($conn, $sql);

$notifications = [];
while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = "Car with ID {$row['vid']} is due tomorrow!";
}

echo json_encode($notifications);
?>