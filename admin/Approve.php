<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If installed via Composer
 error_reporting(0);
@include "include/config.php";
// for approve 
$did = $_GET['did'];
$email = $_GET['userEmail'];

if (isset($_REQUEST['aid'])) {
    $aid = intval($_GET['aid']);
    $vid = $_GET['vid'];
    $email = $_GET['userEmail'];




    $status = 1;
    $update = "update booking set status=$status where bookingno=$aid";
    $q = mysqli_query($conn, $update);

    $update1 = "update car_list set status=$status where vid=$vid";
    $q1 = mysqli_query($conn, $update1);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP provider
        $mail->SMTPAuth = true;
        $mail->Username = 'carolarental3@gmail.com';
        $mail->Password = 'bojiwwvipmyipdqc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('carolarental3@gmail.com', 'CarOla');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body    = "
        Welcome To Carola. <br>
Your Booking done!<br>    
        <h2>Thank You</h2>";
        $mail->send();
        echo "<script>alert('Booking Done email sent!');</script>";
    

    echo "<script>alert('Approve success')
window.open('confirmed-booking.php', 'second');</script>";
    }
catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
}


// for cancel booking
if (isset($_REQUEST['eaid'])) {
    $eaid = $_GET['eaid'];
    $vid = $_GET['vid'];

    $status = 2;
    $update = "update booking set status=$status where bookingno=$eaid";
    $q = mysqli_query($conn, $update);


    $sdate = date('Y-m-d');
    $next_date = date('Y-m-d', strtotime('+1 day'));
    // $update1="update booking set FromDate='$sdate',ToDate='$next_date' where vid=$eaid";
    // $q1=mysqli_query($conn,$update1);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP provider
        $mail->SMTPAuth = true;
        $mail->Username = 'carolarental3@gmail.com';
        $mail->Password = 'bojiwwvipmyipdqc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('carolarental3@gmail.com', 'CarOla');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Cancelled Your Booking';
        $mail->Body    = "
        Welcome To Carola. <br>
Sorry! To Say That  Your  Booking Is  Cancelled !<br>
Try Again !!    
        <h2>Thank You</h2>";
        $mail->send();
        echo "<script>alert('Booking Cancel email sent!');</script>";

    echo "<script>alert('Booking Cancelled')
window.open('canceled-booking.php', 'second');</script>";
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            color: red;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        h3 {
            color: blue;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        .details-table td strong {
            color: #555;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .confirm-button,
        .cancel-button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .confirm-button {
            background-color: #4CAF50;
            color: white;
        }

        .cancel-button {
            background-color: #f44336;
            color: white;
        }

        .confirm-button:hover {
            background-color: #45a049;
        }

        .cancel-button:hover {
            background-color: #e53935;
        }

        .print-button {
            text-align: center;
            margin-top: 30px;
        }

        .print-button button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: #008CBA;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-button button:hover {
            background-color: #007B8A;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php

        $bno = $_GET['bno'];
        $uid = $_GET['userEmail'];
        //         $sql = "SELECT reguser.*, 
        //         car_list.cname, 
        //         booking.FromDate, 
        //         booking.ToDate, 
        //         booking.message, 
        //         booking.vid, 
        //         booking.status, 
        //         booking.PostingDate, 
        //         booking.id, 
        //         booking.bookingno, 
        //         DATEDIFF(booking.ToDate, booking.FromDate) as totalnodays, 
        //         car_list.price, 
        //         (DATEDIFF(booking.ToDate, booking.FromDate) * car_list.price) AS grand_total
        //  FROM booking 
        //  JOIN car_list ON car_list.vid = booking.vid 
        //  JOIN reguser ON reguser.email = booking.userEmail 
        //  WHERE booking.bookingno = $bno AND booking.userEmail='$uid'
        //  ORDER BY booking.PostingDate" ;
        $bm = "SELECT did FROM booking WHERE bookingno=$bno AND (userEmail='$uid' OR did='$did')";
        $exbm = mysqli_query($conn, $bm);

        if (mysqli_num_rows($exbm) > 0) {
            $sql = "SELECT reguser.*, 
               car_list.cname, 
               booking.FromDate, 
               booking.ToDate, 
               booking.message, 
               booking.vid, 
               booking.status, 
               booking.PostingDate, 
               booking.id, 
               booking.bookingno, 
               booking.userEmail,
               DATEDIFF(booking.ToDate, booking.FromDate) as totalnodays, 
               car_list.price, 
               (DATEDIFF(booking.ToDate, booking.FromDate) * car_list.price) AS grand_total,
               (DATEDIFF(booking.ToDate, booking.FromDate) * driver.dprice) AS grand_totald,
               driver.dfname, 
               driver.did, 
               driver.dprice, 
               driver.hprice, 
               driver.status as driver_status
        FROM booking
        JOIN car_list ON car_list.vid = booking.vid
        JOIN reguser ON reguser.email = booking.userEmail
        LEFT JOIN driver ON driver.did = booking.did
        WHERE booking.bookingno = $bno
        ORDER BY booking.PostingDate";
            $result = mysqli_query($conn, $sql);
        } else {
            echo "<script>alert('No Record Found');</script>";
            exit;
        }

        $na = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <h2 class="title">#<?php echo $row['bookingno'];?> Booking Details</h2>

            <div class="section">
                <h3>User Details</h3>
                <table class="details-table">
                    <tr>
                        <td><strong>Booking No.</strong></td>
                        <td>#<?php echo $row['bookingno']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Email Id</strong></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Contact No</strong></td>
                        <td><?php echo $row['mnumber']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Country</strong></td>
                        <td><?php echo "India"; ?></td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <h3>Booking Details</h3>
                <table class="details-table">
                    <tr>
                        <td><strong>Vehicle Name</strong></td>
                        <td><?php echo $row['cname']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Booking Date</strong></td>
                        <td><?php echo $row['PostingDate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>From Date</strong></td>
                        <td><?php echo $row['FromDate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>To Date</strong></td>
                        <td><?php echo $row['ToDate']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total Days</strong></td>
                        <td><?php echo $row['totalnodays']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Rent Per Day</strong></td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Grand Total</strong></td>
                        <td><?php echo $row['grand_total']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Booking Status</strong></td>
                        <?php if ($row['status'] == 0) {
                            echo "<td>Not Confirmed Yet</td>";
                        } elseif ($row['status'] == 1) {
                            echo "<td>Booked</td>";
                        } elseif ($row['status'] == 2) {
                            echo "<td>Cancelled</td>";
                        } else {
                            echo "<td>Not Available</td>";
                        }

                        ?>
                    </tr>
                    <tr>
                        <td><strong>Last Return Date</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>

            <?php if ($row['did']) {   ?>
                <div class="section">
                    <h3>Driver Details</h3>
                    <table class="details-table">
                        <tr>
                            <td><strong>Driver Name</strong></td>
                            <td><?php echo $row['dfname']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Booking Date</strong></td>
                            <td><?php echo $row['PostingDate']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Total Days</strong></td>
                            <td><?php echo $row['totalnodays']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Rent Per Day</strong></td>
                            <td><?php echo $row['dprice']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Grand Total</strong></td>
                            <td><?php echo $row['grand_totald']; ?></td>
                        </tr>



                    </table>
                </div>

            <?php }
            if ($row['status'] == 0) { ?>
                <div class="buttons">

                    <a href="Approve.php?aid=<?php echo $row['bookingno'] ?> && vid=<?php echo $row['vid']; ?> && userEmail=<?php echo $row['userEmail']; ?>"> <button class="confirm-button" name="approve" onclick="return confirm('Do you really want to Approve this Booking')">Confirm Booking</button></a>
                    <a href="Approve.php?eaid=<?php echo $row['bookingno'] ?> && vid=<?php echo $row['vid']; ?>  && userEmail=<?php echo $row['userEmail']; ?>"> <button class="cancel-button" name="cancel" onclick="return confirm('Do you really want to Cancel this Booking')">Cancel Booking</button></a>

                </div>
        <?php  }
        } ?>


        <div class="print-button">
            <button onclick="window.print()">Print</button>
            <button onclick="window.print()"><?php echo $na;  ?></button>
        </div>
    </div>
</body>

</html>