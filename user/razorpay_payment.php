<?php
include "include/config.php";
require('vendor/autoload.php');// Include Razorpay SDK

use Razorpay\Api\Api;

// Razorpay API Keys
$keyId = 'rzp_test_lFfdAvwRtocJ83';
$keySecret = 'hzszbJxefW7Otvh7tsaarvf4';
$api = new Api($keyId, $keySecret);

$amount = $_GET['amount']; // Amount from previous page
$booking_id = $_GET['booking_id'];
$new_start_date = $_GET['new_start_date'];
$new_end_date = $_GET['new_end_date'];

$orderData = [
    'receipt'         => "order_" . rand(),
    'amount'          => $amount * 100, // Convert to paisa
    'currency'        => 'INR',
    'payment_capture' => 1 // Auto capture payment
];

$razorpayOrder = $api->order->create($orderData);
$order_id = $razorpayOrder['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <script>
        var options = {
            "key": "<?php echo $keyId; ?>",
            "amount": "<?php echo $orderData['amount']; ?>",
            "currency": "INR",
            "name": "Car Rental Service",
            "description": "Booking Modification Payment",
            "order_id": "<?php echo $order_id; ?>",
            "handler": function (response){
                window.location.href = "update_booking.php?booking_id=<?php echo $booking_id; ?>&new_start_date=<?php echo $new_start_date; ?>&new_end_date=<?php echo $new_end_date; ?>";
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    </script>
</body>
</html>
