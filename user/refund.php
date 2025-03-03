<?php
require('vendor/autoload.php'); // Razorpay SDK include karein

use Razorpay\Api\Api;

// Razorpay API Keys
$api_key = 'rzp_test_lFfdAvwRtocJ83';
$api_secret = 'hzszbJxefW7Otvh7tsaarvf4';

$api = new Api($api_key,$api_secret);

// Refund Process Function
function processRefund($payment_id, $amount)
{
    global $api;
    try {
        $refund = $api->payment->fetch($payment_id)->refund([
            'amount' => $amount * 100 // Razorpay me amount paisa me hota hai (100 paise = 1 INR)
        ]);
        
        if ($refund) {
            echo "Refund Successful! Refund ID: " . $refund['id'];
            return $refund['id'];
        } else {
            echo "Refund Failed!";
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Example Call
$payment_id = 'pay_Q1rqsbFUl4Dmsp';
$refund_amount = 1000; // Amount to refund in INR
$refund_id = processRefund($payment_id, $refund_amount);

// Save refund_id in database for tracking
?>