<?php
$conn = mysqli_connect('localhost', 'root', '', 'car_rent');

if (!$conn) {
    echo "not connect";
}
$status=0;
$sql = "select * from booking where status=$status";

$result = mysqli_query($conn, $sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Boking</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            /* width: 800px; */
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .search-container {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }
        .search-container input {
            padding: 5px;
            font-size: 14px;
            width: 200px;
        }
        
        .action-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        #edit,#delete{
            margin-right: 10px;
            margin-left: 6px;
            color: #000;
            text-decoration: none;
            font-size: 16px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>New Booking</h1>
        <div class="search-container">
           
            <input type="text" placeholder="Search...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                 
                    <th>Booking NO</th>
                    <th>User Email</th>
                    <th>vehicle Id</th>
                    
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Posting Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $n=1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['bookingno'] ?></td>
                <td><?php echo $row['userEmail'] ?></td>
                <td><?php echo $row['vid'] ?></td>
                <td><?php echo $row['FromDate'] ?></td>
                <td><?php echo $row['ToDate'] ?></td>
                <td><?php echo $row['PostingDate'] ?></td>
                <?php  if($row['status']==0)
                    {
                        echo "<td>Not Confirmed Yet</td>";
                    } 
                    else{
                        echo "<td>Confirmed</td>";
                    }
                ?>
                <td><a name="Approve" class="Approve" href="Approve.php?vid=<?php echo $row['vid']; ?> & userEmail=<?php echo $row['userEmail'] ?>">Action</a></td>

               
            </tr>

        <?php
        $n++;
        }
        ?>
        </table>
       
    </div>
</body>
</html>