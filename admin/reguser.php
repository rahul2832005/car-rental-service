<?php
@include "include/config.php";


$sql = "select * from reguser";

$result = mysqli_query($conn, $sql);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
<body>
    <div class="container">
        <h1>Manage Users</h1>
        <div class="search-container">
           
            <input type="text" placeholder="Search...">
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>User Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                
                </tr>
            </thead>
            <tbody>
            <?php
            $n=1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $n ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['mnumber'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td> <a id="delete" href="delete.php?uid=<?php echo $row['uid']  ?>"><i class="fa-solid fa-trash"></i></a></td></td>

               
            </tr>

        <?php
        $n++;
        }
        ?>
        </table>
       
    </div>
</body>
</html>