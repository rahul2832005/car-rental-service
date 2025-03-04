<?php
include "include/config.php"; // Database connection

$query = "SELECT * FROM booking WHERE modification_status = 'pending'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Modify Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #444;
        }
        .table-container {
            max-width: 90%;
            margin: auto;
            overflow-x: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .btn {
            padding: 4px 9px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }
        .approve {
            background: #28a745;
        }
        .approve:hover {
            background: #218838;
        }
        .reject {
            background: #dc3545;
        }
        .reject:hover {
            background: #c82333;
        }
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    <h2>Pending Modification Requests</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Old Start Date</th>
                <th>Old End Date</th>
                <th>New Start Date</th>
                <th>New End Date</th>
                <th style="padding:0px 27px">Action</th>
            </tr>
            <?php
     
            $query = "SELECT * FROM booking WHERE modification_status = 'pending'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['FromDate'] ?></td>
                    <td><?= $row['ToDate'] ?></td>
                    <td><?= $row['new_start_date'] ?></td>
                    <td><?= $row['new_end_date'] ?></td>
                    <td>
                        <a href="approve_modify.php?id=<?= $row['id'] ?>" class="btn approve"><i class="fa-solid fa-check"></i></a>
                        <a href="reject_modify.php?id=<?= $row['id'] ?>" class="btn reject"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
