
<?php
// Include the above logic or move it to a separate file and include it
// Database connection
$conn = new mysqli("localhost", "root", "", "car_rent");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = date('Y-m-d');
$tomorrow = date('Y-m-d', strtotime('+1 day'));

// Fetch records where return_date is 1 day away and not yet notified
$sql = "SELECT * FROM booking WHERE ToDate = '$tomorrow' AND is_notified = 0";
$result = $conn->query($sql);

$notifications = [];

while ($row = $result->fetch_assoc()) {
    $notifications[] = "Reminder: Car with ID {$row['vid']} needs to be returned tomorrow!";
    // Update the record to mark it as notified
    $updateSql = "UPDATE booking SET is_notified = 1 WHERE userEmail = {$row['']}";
    $conn->query($updateSql);
}

$conn->close();

if (!empty($notifications)) {
    foreach ($notifications as $notification) {
        echo "<div class='notification'>$notification</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
.notification {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    border: 1px solid #f5c6cb;
}


    </style>
</head>
<body>
    
</body>
</html>
