<?php
session_start();
@include "include/config.php";

if (!isset($_GET['bookingno'])) {
    echo "Booking ID is missing.";
    exit;
}

$booking_id = intval($_GET['bookingno']);

$sql = "SELECT reguser.*, 
car_list.cname, 
car_list.image,
booking.FromDate, 
booking.ToDate, 
booking.message,
booking.rent_type, 
booking.vid, 
booking.status, 
booking.PostingDate, 
booking.id, 
booking.bookingno, 
booking.userEmail,
DATEDIFF(booking.ToDate, booking.FromDate) as totalnodays, 
TIMESTAMPDIFF(HOUR, booking.FromDate, booking.ToDate) AS total_hours,
car_list.price, 
car_list.chprice, 

(DATEDIFF(booking.ToDate, booking.FromDate) * car_list.price) AS grand_total,
 (TIMESTAMPDIFF(HOUR, booking.FromDate, booking.ToDate) * car_list.chprice) AS grand_totalh,

 (DATEDIFF(booking.ToDate, booking.FromDate) * driver.dprice) AS grand_total_day_d,
 (TIMESTAMPDIFF(HOUR, booking.FromDate, booking.ToDate) * driver.hprice) AS grand_total_hour_d,

(DATEDIFF(booking.ToDate, booking.FromDate) * driver.dprice)
+(DATEDIFF(booking.ToDate, booking.FromDate) * car_list.price) AS grand_totald,

(TIMESTAMPDIFF(HOUR, booking.FromDate, booking.ToDate) * driver.hprice)
               +(TIMESTAMPDIFF(HOUR, booking.FromDate, booking.ToDate) * car_list.chprice) AS grand_total_h,


driver.dfname, 
driver.did, 
driver.dprice, 
driver.hprice, 
driver.status as driver_status
FROM booking
JOIN car_list ON car_list.vid = booking.vid
JOIN reguser ON reguser.email = booking.userEmail
LEFT JOIN driver ON driver.did = booking.did
WHERE booking.bookingno = '$booking_id'";

$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "No booking found with this ID.";
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .booking-details-container {
            max-width: 700px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            overflow: hidden;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .booking-info img {
            width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .info-box {
            background-color: #f4f4f9;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 12px;
            border-left: 5px solid #4CAF50;
        }

        .info-box p {
            margin: 0;
            font-size: 16px;
            color: #555;
        }

        .info-box strong {
            color: #2c3e50;
        }

        a.back-btn {
            display: inline-block;
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a.back-btn:hover {
            background-color: #45a049;
        }

        a.cancel-btn {
            display: inline-block;
            margin-top: 15px;
            background-color: rgb(224, 39, 39);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a.cancel-btn:hover {
            background-color: rgb(228, 14, 78);
        }

        .status-in-progress {
            color: #e67e22;
        }

        .status-success {
            color: #2ecc71;
        }

        .status-rejected {
            color: #e74c3c;
        }

        .status-maintenance {
            color: #3498db;
        }

        @media (max-width: 768px) {
            .booking-details-container {
                margin: 15px;
                padding: 18px;
            }

            .info-box p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="booking-details-container">
        <h2>Your Booking Details</h2>
        <div class="booking-info">
            <img src="../admin/img/<?php echo explode(',', $row['image'])[0]; ?>" alt="Car Image" class="booking-img">
            <h2>Car Info <span style="color: red;">*</span></h2>
            <div class="info-box">
                <p><strong>Car Name:</strong> <?php echo $row['cname']; ?></p>
            </div>
            <div class="info-box">
                <p><strong>From Date:</strong> <?php echo $row['FromDate']; ?></p>
            </div>
            <div class="info-box">
                <p><strong>To Date:</strong> <?php echo $row['ToDate']; ?></p>
            </div>
            <div class="info-box">
                <p><strong>Rent Type</strong>
                    <?php echo $row['rent_type']; ?></p>
            </div>
            <?php if ($row['rent_type'] == 'Day') { ?>
                <div class="info-box">
                    <p><strong>Total Days:</strong>
                        <?php echo $row['totalnodays']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Price per Day:</strong> &#8377;
                        <?php echo $row['price']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Car Grand Total:</strong> &#8377;
                        <?php echo $row['grand_total']; ?></p>
                </div>
               
            <?php } else {  ?>
                <div class="info-box">
                    <p><strong>Total Hours:</strong>
                        <?php echo $row['total_hours']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Price per Hour:</strong> &#8377;
                        <?php echo $row['chprice']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong> Car Grand Total:</strong> &#8377;
                        <?php echo $row['grand_totalh']; ?></p>
                </div>
                
                        
            <?php  } ?>

            <div class="info-box">
                <p><strong>Status:</strong> <span class="<?php
                                                            echo ($row['status'] == 0) ? 'status-in-progress' : (($row['status'] == 1) ? 'status-success' : (($row['status'] == 2) ? 'status-rejected' : 'status-maintenance'));
                                                            ?>">
                        <?php
                        echo ($row['status'] == 0) ? 'In Progress' : (($row['status'] == 1) ? 'Success' : (($row['status'] == 2) ? 'Rejected' : 'In Maintenance'));
                        ?></span></p>
            </div>
            <div class="info-box">
                <p><strong>Booking Number:</strong> <?php echo $row['bookingno']; ?></p>
            </div>

            <div class="info-box">
                <p><strong>Posting Date:</strong> <?php echo $row['PostingDate']; ?></p>
            </div>
            <?php if($row['did']=="") {?>
                    <div class="info-box">
                    <p><strong> Grand Total:</strong> &#8377;
                        <?php if($row['rent_type']=='Day')
                        {
                            echo $row['grand_total'];
                        }
                        elseif($row['rent_type']=='hour')
                        {
                            echo $row['grand_totalh'];
                        } ?></p>
                </div>
                        <?php } ?>
        </div>
    <?php if ($row['did']) { ?>
        <h2>Driver Info <span style="color: red;">*</span></h2>
        <div class="booking-info">
            <div class="info-box">
                <p><strong>Driver Name</strong> &#8377;
                    <?php echo $row['dfname']; ?></p>
            </div>
            <?php if ($row['rent_type'] == 'Day') { ?>
                <div class="info-box">
                    <p><strong>Total Days:</strong>
                        <?php echo $row['totalnodays']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Price per Day:</strong> &#8377;
                        <?php echo $row['dprice']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Driver Grand Total:</strong> &#8377;
                        <?php echo $row['grand_total_day_d']; ?></p>
                </div>
            <?php } else {  ?>
                <div class="info-box">
                    <p><strong>Total Hours:</strong>
                        <?php echo $row['total_hours']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Price per Hour:</strong> &#8377;
                        <?php echo $row['hprice']; ?></p>
                </div>

                <div class="info-box">
                    <p><strong>Driver Grand Total:</strong> &#8377;
                        <?php echo $row['grand_total_hour_d']; ?></p>
                </div>
            <?php } ?>
            <div class="info-box">
                    <p><strong> Grand Total:</strong> &#8377;
                        <?php echo $row['grand_total_h']; ?></p>
                </div>
            
        </div>
<?php } ?>
        <a href="my_booking.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Bookings</a>
        <?php if ($row['status'] != 2) { ?>
            <a href="../admin/Approve.php?eaid=<?php echo $row['bookingno'] ?> && vid=<?php echo $row['vid']; ?>  && userEmail=<?php echo $row['userEmail']; ?>" class="cancel-btn" onclick="return confirm('Do you really want to cancel your booking?');"> Cancel Booking</a>
        <?php  } ?>
    </div>
</body>

</html>