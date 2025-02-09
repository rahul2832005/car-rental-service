<?php
// error_reporting(0);
$host="localhost";
$username="root";
$db="car_rent";
$pass='';
$conn = mysqli_connect("$host", "$username", "$pass", "$db");
if (!$conn) {
    echo "not";
}



// $host="ql.freedb.tech";
// $username="freedb_Bhupat";
// $db="freedb_car_rent";
// $pass='hcXB%$e?A538wtY';