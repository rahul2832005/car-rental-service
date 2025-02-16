
<?php
session_start();

if (!isset($_SESSION['alogin'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$user_id = $_SESSION['alogin']; // Assuming you store user_id in session after login

// Simulate a random notification (you can customize the message format)
$random_car_id = rand(1000, 9999);
$notifications = ["Car with ID {$random_car_id} is due soon!"];

echo json_encode($notifications);
?>
