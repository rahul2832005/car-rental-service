<?php
$conn = mysqli_connect('localhost', 'root', '', 'car_rent');

if (!$conn) {
    echo "not connect";
}

$sql = "select * from car_list";

$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table{
            text-align: left;
            background-color: white;
        }


        th {
            background: #fffff0;
           padding: 0.5rem 2rem;
           border: 1px solid black;
            
        }
        td{
            padding: 0.5rem 2rem;
            border: 1px solid black;
           
        }
        table{
            /* border: 1px solid black; */
            border-collapse: collapse;            
        }
    </style>
</head>

<body>
    <h1>All Cars</h1>

    <table>
        <tr>
            <th>car_name</th>
            <th>price</th>
            <th>no_plate</th>
            <th>company_name</th>
            <th>seat</th>
            <th>fual</th>
            <!-- <th>image</th> -->
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['no_plate'] ?></td>
                <td><?php echo $row['company_name'] ?></td>
                <td><?php echo $row['seat'] ?></td>
                <td><?php echo $row['fual'] ?></td>
                <!-- <td> 
                 <img src="upload/<?php echo $row['image'] ?>" height="80" width="80"> 
                </td>-->
            </tr>

        <?php
        }
        ?>
    </table>
</body>

</html>