<?php

$conn=mysqli_connect("localhost","root","","car_rent");

// for approve 
if(isset($_REQUEST['aid'])){
    $aid=intval($_GET['aid']);
    $status=1;
$update="update booking set status=$status where vid=$aid";
$q=mysqli_query($conn,$update);

$update1="update car_list set status=$status where vid=$aid";
$q1=mysqli_query($conn,$update1);
echo "<script>alert('Approve success')
window.open('confirmed-booking.php', 'second');</script>";

}


// for cancel booking
if(isset($_REQUEST['eaid'])){
    $eaid=$_GET['eaid'];
    $status=2;
$update="update booking set status=$status where vid=$eaid";
$q=mysqli_query($conn,$update);

$update1="update car_list set status=0 where vid=$eaid";
$q1=mysqli_query($conn,$update1);
$sdate=date('Y-m-d');
$next_date = date('Y-m-d', strtotime('+1 day'));
    // $update1="update booking set FromDate='$sdate',ToDate='$next_date' where vid=$eaid";
    // $q1=mysqli_query($conn,$update1);



    echo "<script>alert('Booking Cancelled')
window.open('canceled-booking.php', 'second');</script>";

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

.confirm-button, .cancel-button {
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
        $vid=$_GET['vid'];
        $uid=$_GET['userEmail'];
        $sql = "SELECT reguser.*, 
        car_list.name, 
        booking.FromDate, 
        booking.ToDate, 
        booking.message, 
        booking.vid as vid, 
        booking.status, 
        booking.PostingDate, 
        booking.id, 
        booking.bookingno, 
        DATEDIFF(booking.ToDate, booking.FromDate) as totalnodays, 
        car_list.price, 
        (DATEDIFF(booking.ToDate, booking.FromDate) * car_list.price) AS grand_total
 FROM booking 
 JOIN car_list ON car_list.vid = booking.vid 
 JOIN reguser ON reguser.email = booking.userEmail 
 WHERE booking.vid = $vid && booking.userEmail='$uid'
 ORDER BY booking.PostingDate DESC LIMIT 1" ;
//  JOIN brands ON car_list.VehiclesBrand = tblbrands.id 

 $result = mysqli_query($conn, $sql);

 while($row=mysqli_fetch_assoc($result)){
        ?>
        <h2 class="title">#<?php echo $row['bookingno']; ?> Booking Details</h2>

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
                    <td><strong>City</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>Country</strong></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="section">
            <h3>Booking Details</h3>
            <table class="details-table">
                <tr>
                    <td><strong>Vehicle Name</strong></td>
                    <td><?php echo $row['name']; ?></td>
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
                  <?php   if($row['status']==0){
                    echo "<td>Not Confirmed Yet</td>"; 
                }
                elseif($row['status']==1){
                    echo "<td>Booked</td>";
                }
                elseif($row['status']==2){
                    echo "<td>Cancelled</td>";
                }
                else
                {
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
        <?php if($row['status']==0)
        { ?>
        <div class="buttons">
            
                <a href="Approve.php?aid=<?php echo $row['vid'] ?>"> <button class="confirm-button" name="approve" onclick="return confirm('Do you really want to Approve this Booking')">Confirm Booking</button></a>
                <a href="Approve.php?eaid=<?php echo $row['vid'] ?>"> <button class="cancel-button" name="cancel" onclick="return confirm('Do you really want to Cancel this Booking')">Cancel Booking</button></a>
          
        </div>
  <?php  } 
  }?>
       

        <div class="print-button">
            <button onclick="window.print()">Print</button>
        </div>
    </div>
</body>
</html>




