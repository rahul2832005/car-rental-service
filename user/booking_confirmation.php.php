<?php
session_start();
include "include/config.php";
require('vendor/autoload.php');

// Razorpay API Keys
$keyId = 'rzp_test_lFfdAvwRtocJ83';
$keySecret = 'hzszbJxefW7Otvh7tsaarvf4';

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

// Retrieve booking details
$bookingData = $_SESSION['booking_data'];
// $did=$_SESSION['driver_id'];

// Ensure amount is in paise
$amount_in_paise = $bookingData['amount'] * 100;

// Create Razorpay order
$orderData = [
    'receipt'         => 'rcptid_' . $bookingData['bookingno'],
    'amount'          => $amount_in_paise,
    'currency'        => 'INR',
    'payment_capture' => 1
];

$razorpayOrder = $api->order->create($orderData);
$order_id = $razorpayOrder['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
       

        body {
           
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom,rgb(221, 65, 91),rgb(202, 156, 28));
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            padding: 20px;
        }

        .booking-box {
            background: #ffffff;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
            animation: fadeIn 0.5s ease-in-out;
        }

        .car-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .booking-details {
            text-align: left;
            margin-top: 15px;
        }

        .booking-details p strong {
            min-width: 150px;
        }

        .booking-details p {
            background: rgba(0, 0, 0, 0.05);
            padding: 3px;
            display: flex;
            /* justify-content: space-between; */
            align-items: center;
        }

        .pay-btn {
            background: linear-gradient(to bottom,rgb(221, 65, 91),rgb(202, 156, 28));
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
        }

        .pay-btn:hover {
            background: #9d50bb;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #4e1163;
            color: white;
        }

        .back-btn {
            background: #ccc;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-bottom: 14px;
            margin-right: -7px;
        }

        .back-btn:hover {
            background: #999;
        }
       

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <header>
        <?php include('navbar.php'); ?>
    </header>

    <?php
    $vid = $bookingData['vid'];
    $query = "SELECT * from car_list where vid=$vid";

    // $query = "select * from car_list where vid=$vid";

    $exquery = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($exquery)) {
        $image = explode(",", $row['image']);

    ?>
        <div class="container">
            <div class="booking-box">
                <h1>Booking Confirmation</h1>
                <img src="../admin/img/<?php echo $image[0]; ?>" alt="Car Image" class="car-image">
                <div class="booking-details">
                    <p><strong>Booking No:</strong> <?php echo $bookingData['bookingno']; ?></p>
                    <p><strong>Car Name  :</strong> <?php echo $row['cname']; ?></p>
                    <?php } ?>
                <p><strong>User Email:</strong> <?php echo $bookingData['useremail']; ?></p>
                <p><strong>Pickup Date:</strong> <?php echo date('d-m-Y H:i:s', strtotime($bookingData['fdate'])); ?>
                <p>
                <p><strong>Pickup Date:</strong> <?php echo date('d-m-Y H:i:s', strtotime($bookingData['tdate'])); ?>
                <p>
                <p><strong>Pickup Location:</strong> <?php echo $bookingData['pick_up_loc']; ?></p>
                <p><strong>Drop-off Location:</strong> <?php echo $bookingData['drop_of_loc']; ?></p>
                <p><strong>Rent Type:</strong> <?php echo $bookingData['rent_type']; ?></p>
                <?php if($bookingData['did']) { ?>
                <p><strong>Driver Name:</strong> <?php echo $bookingData['dname']; ?></p>
                <?php } ?>
                <p><strong>Amount:</strong> ₹<?php echo $bookingData['amount']; ?></p>
            </div>

            <div class="payment-section">
                <!-- <b class="h2">Payment</b> -->
                <button class="back-btn" onclick="goBack()">Back</button>
                <button class="pay-btn" onclick="payNow()">Pay  ₹<?php echo $bookingData['amount']; ?></button>
            </div>

            </div>
        </div>

        <?php include('footer.php'); ?>

        <script>
            function payNow() {
                console.log('Payment function called');

                var options = {
                    "key": "<?php echo $keyId; ?>",
                    "amount": "<?php echo $amount_in_paise; ?>",
                    "currency": "INR",
                    "name": "Carola",
                    "description": "Payment for Booking Car",
                    "order_id": "<?php echo $order_id; ?>",
                    "handler": function(response) {
                        console.log('Payment successful');
                        window.location.href = 'payment_success.php?payment_id=' + response.razorpay_payment_id + '&order_id=' + response.razorpay_order_id + '&signature=' + response.razorpay_signature;
                    },
                    "prefill": {
                        "name": "<?php echo $bookingData['useremail']; ?>",
                        "email": "<?php echo $bookingData['useremail']; ?>",
                        "contact": "9999999999"
                    },
                    "theme": {
                        "color": "#631579"
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>

        <!--  for  back button -->
        <script>
            function goBack() {
                window.history.back();
            }
        </script>


</body>

</html>