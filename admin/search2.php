<?php
$servername = "localhost";
$username = "root";  
$password = "";
$dbname = "car_rent"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) 
{
    echo "Connection failed: " ;
}

if (isset($_POST['search'])) 
{
    $search = trim($_POST['search']);
    
    $sql = "SELECT * FROM car_list WHERE name LIKE  '%$search%'  or fual LIKE '%$search%'";
    $ex=mysqli_query($conn,$sql);
   
    $result=mysqli_num_rows($ex);
?>
<html>
    <body>


    <table>
    <thead>
        <tr>
            <th>vehicle id</th>
            <th>Car Name</th>
            <th>Price</th>
            <th>No Plate</th>
            <th>Company Name</th>
            <th>Seat</th>
            <th>Fual</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <div id="result">
    <?php
while ($row = mysqli_fetch_assoc($ex))
{
?>

    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['no_plate'] ?></td>
        <td><?php echo $row['company_name'] ?></td>
        <td><?php echo $row['seat'] ?></td>
        <td><?php echo $row['fual'] ?></td>
        <td><a id="edit" href="update.php?uid=<?php echo $row['id'] ?>"><i class="fa-solid fa-pen"></i></a>   <a id="delete" href=""><i class="fa-solid fa-trash"></i></a></td>
        <!-- <td> 
         <img src="upload/<?php echo $row['image'] ?>" height="80" width="80"> 
        </td>-->
    </tr>

<?php
}
?>
</div>
</table>
</body>
</html>
<?php } ?>