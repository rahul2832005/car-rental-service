<?php
       session_start();
       @include "include/config.php";
       
       
       $bookingdata=$_SESSION['booking_data'];
       $did=$_SESSION['driver_id'];
       
       
       $vid=$bookingdata['vid'];
       $bookingno=$bookingdata['bookingno'];
       $useremail=$bookingdata['useremail'];
       $fdate=$bookingdata['fdate'];
       $tdate=$bookingdata['tdate'];
       $pick_up_loc=$bookingdata['pick_up_loc'];
       $drop_of_loc=$bookingdata['drop_of_loc'];
       $status=$bookingdata['status'];
       $order_id=$bookingdata['order_id'];
       $amount=$bookingdata['amount'];
       $rent_type=$bookingdata['rent_type'];
       $dname=$bookingdata['dname'];
       $did=$bookingdata['did'];
       $payment=1;
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .summary {
            padding: 15px;
            border-radius: 8px;
            background: #f9f9f9;
            margin-top: 20px;
            text-align: left;
        }
        .summary p {
            margin: 8px 0;
            font-size: 16px;
        }
        .total {
            font-size: 22px;
            font-weight: bold;
            color: #d9534f;
            margin-top: 15px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Car Rental Summary</h2>
       
        <div class="summary">
            <p><strong>Car:</strong> <?php echo $vid; ?></p>
            <p><strong>From Date:</strong> <?php echo date('d-m-Y', $fdate); ?></p>
            <p><strong>To Date:</strong> <?php echo date('d-m-Y', $tdate); ?></p>
            
            <p class="total">Total Cost: $<?php echo number_format($amount, 2); ?></p>
        </div>
        <button onclick="window.print()">Print Invoice</button>
       
    </div>
</body>
</html>
