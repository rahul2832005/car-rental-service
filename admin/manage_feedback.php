<?php
include "include/config.php";
// Fetch feedback data
$sql = "SELECT f.fid, f.rating, f.comment, f.created_at, c.cname, u.name 
        FROM feedback f
        JOIN car_list c ON f.vid = c.vid
        JOIN reguser u ON f.uid = u.uid
        ORDER BY f.created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 23px 16px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed;
            /* Fixes table layout */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        td:nth-child(4) {
            /* Target the Comment column */
            word-wrap: break-word;
            white-space: normal;
            overflow-wrap: break-word;
            /* max-width: 500px; */
        }

        th {
            background: #007bff;
            color: white;
        }

        .delete,
        .view {
            margin: 0 5px;
            font-size: 16px;
            transition: 0.3s;
            padding: 5px 8px;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .delete:hover {
            background: #c82333;
        }

        .view {
            background: rgb(45, 96, 207);
            color: white;
        }

        .view:hover {
            background: rgb(67, 97, 161);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Feedback</h2>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Car</th>
                    <th>Rating</th>
                    <th class="commet">Comment</th>
                    <th>Date</thle=>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr id="feedback-<?php echo $row['fid'];
                                        $fid = $row['fid']; ?>">
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo str_repeat("⭐", $row['rating']); ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                        <td>
                            <a class="view" style="padding:5px 4px;" href="viewfeedback.php?fid=<?php echo $row['fid']; ?>">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="delete" href="delete.php?fid=<?php echo $row['fid']; ?>" onclick="return confirm('Do You Delete FeedBack!');">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>