<?php
@include "include/config.php";
if (isset($_POST['search'])) 
{
    $search = trim($_POST['search']);
    
    // $sql = "SELECT * FROM car_list WHERE name LIKE  '%$search%'  or fual LIKE '%$search%'";
    $sql = "SELECT car_list.*, 
    MAX(booking.status) AS status     
FROM car_list 
LEFT JOIN booking ON car_list.vid = booking.vid
WHERE car_list.cname LIKE '%$search%'  
OR car_list.fual LIKE '%$search%'
GROUP BY car_list.vid";
    $ex=mysqli_query($conn,$sql);
   
    $result=mysqli_num_rows($ex);
}
?>
<html>
    <body>

    <?php if($result>0){ ?> 
    <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Car Name</th>
            <th>Price</th>
            <th>No Plate</th>
            <th>Brand</th>
            <th>Seat</th>
            <th>Fual</th>
            <th>Action</th>
        </tr>
    </thead>
    <!-- <tfoot>
        <tr>
            <th># </th>
            <th>Car Name</th>
            <th>Price</th>
            <th>No Plate</th>
            <th>Company Name</th>
            <th>Seat</th>
            <th>Fual</th>
            <th>Action</th>
        </tr>
    </tfoot> -->
    <tbody>
    <div id="result">
    <?php
    $n=1;
while ($row = mysqli_fetch_assoc($ex))
{
?>

    <tr>
        <td><?php echo $n; ?></td>
        <td><?php echo $row['cname'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['no_plate'] ?></td>
        <td><?php echo $row['brand'] ?></td>
        <td><?php echo $row['seat'] ?></td>
        <td><?php echo $row['fual'] ?></td>
        <td><a id="edit" href="update.php?uid=<?php echo $row['vid'] ?>"><i class="fa-solid fa-pen"></i></a>   <a id="delete" href=""><i class="fa-solid fa-trash"></i></a></td>
        <!-- <td> 
         <img src="upload/<?php echo $row['image'] ?>" height="80" width="80"> 
        </td>-->
    </tr>

<?php
$n++;
}
?>
</div>
</table>
<?php   } else { ?>
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
            <th>Action</th>
        </tr>
    </tfoot> -->
 <tbody>
        <tr>
            <td colspan="8">
                No data Found in Table
            </td>
        </tr>
    </tbody>
</table>
<?php } ?>
</body>
</html>
