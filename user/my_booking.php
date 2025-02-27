<?php
session_start();
@include "include/config.php";
$uid = $_SESSION['alogin'];
if (isset($_GET['all']) && $_GET['all'] == 'true') {

    $sql = "SELECT reguser.*, 
car_list.cname, 
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
} 
else 
{
    $sql = "SELECT reguser.*, 
car_list.cname, 
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
    <link rel="stylesheet" href="css/my_booking.css">

</head>

<body>
    <div class="booking-container">
        <div class="booking-header">
            <span> Bookings History</span>
            <a href="my_booking.php?all=true">View All Bookings →</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Days</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    $image = explode(",", $row['image']);
                ?>
                    <tr class="clickable-row" data-href="booking_details.php?bookingno=<?php echo $row['bookingno']; ?>">
                        <td><img src="../admin/img/<?php echo $image[0]; ?>" alt="Car Image" class="booking-img"></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['FromDate']; ?></td>
                        <td><?php echo $row['ToDate']; ?></td>
                        <td><?php echo $row['totalnodays']; ?></td>
                        <td><?php echo $row['grand_total']; ?></td>
                        <td class="status">
                            <?php echo ($row['status'] == 0) ? 'In Progress' : (($row['status'] == 1) ? 'Success' : (($row['status'] == 2) ? 'Rejected' : 'Returned')); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.clickable-row');
        rows.forEach(row => {
            row.addEventListener('click', function() {
                const href = this.getAttribute('data-href');
                window.location.href = href;
            });
        });
    });
</script>

</body>

</html>