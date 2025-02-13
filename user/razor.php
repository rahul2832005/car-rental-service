<?php
require('vendor/autoload.php'); // Composer autoload file include karo

use Razorpay\Api\Api;

$keyId = 'rzp_live_vZHJ6c1F6PFLRC';         // Yahan apni Key ID daalein
$keySecret = 'WupX5UDSTE6xHtY2TtDutJLk'; // Yahan apna Key Secret daalein

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => 3456,
    'amount'          => 50000, // 500 INR in paise
    'currency'        => 'INR',
    'payment_capture' => 1      // Auto capture payment
];

$order = $api->order->create($orderData);

echo $order;
?>



<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment Gateway Integration</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<button id="rzp-button1">Pay Now</button>

<script>
    var options = {
        "key": "rzp_live_vZHJ6c1F6PFLRC", // yahan apni Key ID daalein
        "amount": "50000", // amount in paise (50000 paise = ₹500)
        "currency": "INR",
        "name": "Your Company Name",
        "description": "Test Transaction",
        "image": "https://your_logo_url.com/logo.png",
        "order_id": "ORDER_ID_FROM_BACKEND", // yeh backend se generate hoga
        "handler": function (response){
            alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
            // Yahan aap AJAX se payment verification ke liye backend call kar sakte ho
        },
        "prefill": {
            "name": "Customer Name",
            "email": "customer@example.com",
            "contact": "9999999999"
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
</script>

</body>
</html>
