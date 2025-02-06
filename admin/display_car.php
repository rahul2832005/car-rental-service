<?php
@include "include/config.php";
$res=$sql1=$row1=$re="";

// $sta="select status from booking where vid=(select  vid from car_list)";
//  $ex=mysqli_query($conn,$sta);
 




$sql = "select * from car_list";

$result = mysqli_query($conn, $sql);



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            
            max-width: 800px;
            margin: 80px 31px;
            
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
        <h1>Manage Brands</h1>
        <div class="search-container">
           
            <input type="text" placeholder="Search...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car Name</th>
                    <th>Price</th>
                    <th>No Plate</th>
                    <th>Company Name</th>
                    <th>Seat</th>
                    <th>Fual</th>
                    <th>Action</th>
                    <th>Status</th>
                  

                </tr>
            </thead>
            <tbody>
            <?php
          
        while ($row = mysqli_fetch_assoc($result)) {
           
    
        ?>

            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['no_plate'] ?></td>
                <td><?php echo $row['company_name'] ?></td>
                <td><?php echo $row['seat'] ?></td>
                <td><?php echo $row['fual'] ?></td>
                <td><a id="edit" href="update.php?uid=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen"></i></a>   <a id="delete" href="delete.php?uid=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                 <!-- <td> 
                 <img src="upload/<?php echo $row['image'] ?>" height="80" width="80"> 
                </td> -->
               
            </tr>

        <?php
        }
        
        ?>
        </table>
       
    </div>
</body>
</html>