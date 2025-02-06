<?php
@include "include/config.php";
$res = $sql1 = $row1 = $re = "";
if (!$conn) {
    echo "not connect";
}

$sql1 = "select  * from brands";
$ex = mysqli_query($conn, $sql1);

$sql2 = "select  * from car_list";
$ex1 = mysqli_query($conn, $sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <form  action="result.php" method="post">
        <select name="brand">
            <option value="">Select Brand</option>
            <?php
            while ($row = mysqli_fetch_assoc($ex)) {
            ?>
                <option><?php echo $row['bname']; ?></option>
            <?php
            }
            ?>
        </select><br>
            <select name="fual">
        <option>Select Fuel Type</option>
        <option value="Petrol">Petrol</option>
        <option value="Diesel">Diesel</option>
        <option value="CNG">CNG</option>
        </select>

            <br>
        <button type="submit" > Search Car</button>

     
    </form>

</body>

</html>