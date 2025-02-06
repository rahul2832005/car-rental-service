<?php
session_start();
@include "include/config.php";
$uid=$_SESSION['alogin'];
if (isset($_GET['all']) && $_GET['all'] == 'true') {
$sql = "SELECT reguser.*, 
car_list.name, 
car_list.image,
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
WHERE booking.userEmail = '$uid'  ORDER BY booking.PostingDate DESC";
}else{
    $sql = "SELECT reguser.*, 
car_list.name, 
car_list.image,
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
WHERE booking.userEmail = '$uid'  ORDER BY booking.PostingDate DESC LIMIT 1";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .booking-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .booking-item {
            display: flex;
            align-items: center;
            
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }
        .booking-img {
            width: 80px;
            height: 60px;
            border-radius: 5px;
            object-fit: cover;
        }
        .booking-details {
            display: flex;
        }
        .price {
            color: red;
            font-weight: bold;
        }
        .status {
            background: lightblue;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        table {
            width: 100%;
            
            margin-top: 20px;
        }
        th, td {
           
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <div class="booking-header">
            <span>Recent Bookings</span>
            <a href="my_booking.php?all=true">View All Bookings →</a>
        </div>
        <table>

            <thead>
                <tr>
                    <th>image </th>
                    <th>Name</th>
                    <th>FromDate</th>
                    <th>ToDate</th>
                    <th>Days</th>
                    <th>Total</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
          
            <tbody>
            <?php  while($row=mysqli_fetch_assoc($result)){
                     $image = explode(",", $row['image']); ?>
                <tr>
                    <td> <img src="../admin/img/<?php echo $image[0]; ?>" alt="Toyota Camry SE 400" class="booking-img"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['FromDate']; ?></td>
                    <td><?php echo $row['ToDate']; ?></td>
                    <td><?php echo $row['totalnodays']; ?></td>
                    <td><?php echo $row['grand_total']; ?></td>
                   <?php if($row['status']==0)
                    {
                        echo " <td class='status'>In Progress</td>";
                    }
                    elseif($row['status']==1)
                    {
                        echo " <td class='status'>Success</td>";

                    }
                    elseif($row['status']==2)
                    {
                        echo " <td class='status'>Rejected</td>";
                    }
                    else
                    {
                        echo " <td class='status'>In Maintanance</td>";

                    }
                    ?>

                    <?php } ?>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html> 