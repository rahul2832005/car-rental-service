<?php
include "include/config.php"; // Database connection

$query = "SELECT * FROM booking WHERE modification_status = 'pending'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Modify Requests</title>
</head>
<body>
    <h2>Pending Modification Requests</h2>
    <table border="1">
        <tr>
            <th>Booking ID</th>
            <th>Old Start Date</th>
            <th>Old End Date</th>
            <th>New Start Date</th>
            <th>New End Date</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['FromDate'] ?></td>
            <td><?= $row['ToDate'] ?></td>
            <td><?= $row['new_start_date'] ?></td>
            <td><?= $row['new_end_date'] ?></td>
            <td>
                <a href="approve_modify.php?id=<?= $row['id'] ?>">Approve</a> |
                <a href="reject_modify.php?id=<?= $row['id'] ?>">Reject</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
