<?php
@include "include/config.php";$search="";

if (isset($_POST['search'])) 
{
    $search = trim($_POST['search']);
}

// $sql = "SELECT car_list.*, 
// booking.status     
// FROM car_list 
// LEFT JOIN booking ON car_list.vid = booking.vid
// WHERE car_list.name LIKE '%$search%'  
// OR car_list.fual LIKE '%$search%'";
$sql = "SELECT * FROM car_list WHERE name LIKE '%$search%'  
           OR fual LIKE '%$search%' ";

$result = mysqli_query($conn, $sql);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
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
<script src="ajax.js"></script>

<body>
    <div class="container">
        <h1>Manage Brands</h1>
        <div class="search-container">
           
            <input type="text" id="search" placeholder="Search by name..." autocomplete="off">
            <!-- <a href="managecar.php"><button type="submit">refresh</button></a> -->
        </div>
        <table class="tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car Name</th>
                    <th>Price</th>
                    <th>No Plate</th>
                    <th>Company Name</th>
                    <th>Seat</th>
                    <th>Fual</th>
                    <th>status</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <!-- <tfoot>
                <tr>
                    <th>#</th>
                    <th>Car Name</th>
                    <th>Price</th>
                    <th>No Plate</th>
                    <th>Company Name</th>
                    <th>Seat</th>
                    <th>Fual</th>
                    <th>status</th>
                    <th>Action</th>
                   
                </tr>
            </tfoot> -->

            <tbody>
            <div id="result">
            <?php
            $n=1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['no_plate'] ?></td>
                <td><?php echo $row['company_name'] ?></td>
                <td><?php echo $row['seat'] ?></td>
                <td><?php echo $row['fual'] ?></td>
                <?php 
                if($row['status']==0){
                    echo "<td>Available</td>"; 
                }
                elseif($row['status']==1){
                    echo "<td>Booked</td>";
                }
                elseif($row['status']==2){
                    echo "<td>Maintanance</td>";
                }
                else
                {
                    echo "<td>Not Available</td>";
                }

                ?>
                <td><a id="edit" href="update.php?uid=<?php echo $row['vid'] ?>"><i class="fa-solid fa-pen"></i></a>   
                <a id="delete" href="delete.php?uid=<?php echo $row['vid']  ?>"><i class="fa-solid fa-trash"></i></a></td>

            </tr>

        <?php
        $n++;
        }
        ?>
        </div>
        </table>
       
    </div>
    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var query = $(this).val();
                if (query.length > 0) {
                    $(".tbl").hide(); 
                    $.ajax({
                        url: "search2.php",
                        method: "POST",
                        data: { search: query },
                        success: function(data) {
                            $("#result").html(data);
                        }
                    });
                } else {
                    $(".tbl").show(); 
                    $("#result").html("");
                }
            });
        });
    </script>
</body>
</html>