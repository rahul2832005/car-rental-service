<?php
// error_reporting(0);
@include "include/config.php";

if (!isset($_GET['vid']) || empty($_GET['vid'])) {
    echo "Invalid car ID.";
    exit;
}

$vid = $_GET['vid'];
$sql = "SELECT * FROM car_list WHERE vid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $vid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    echo "Car not found.";
    exit;
}

$car = mysqli_fetch_assoc($result);
$image = explode(',', $car['image']);
$oldAccessories = explode(', ', $car['accessories']); // Split string into array

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Car - <?php echo $car['cname']; ?></title>
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px;
        }

        .car-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007BFF;
        }

        h2 {
            color: #333;
            margin-top: 10px;
        }

        .btn-container {
            margin: 15px 0;
        }

        .btn {
            display: inline-block;
            padding: 8px 15px;
            margin: 5px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #0056b3;
        }

        .user-profile {
            text-align: left;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 700px;
        }

        .profile-info {
            margin-bottom: 15px;
            padding: 12px 50px;
        }

        .profile-info label {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }

        .profile-info input {
            width: 130%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
        }

        .back-btn {
            background: green;
            color: white;
            margin-top: 15px;
        }

        .detail {
            display: flex;
            flex-wrap: wrap;
            margin-left: 22px;
        }

        .accessories {
            margin-bottom: 30px;
        }

        .accessories label {
            display: block;
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }

        .accessories .details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
        }

        .accessories .details input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="img/<?php echo $image[0]; ?>" alt="<?php echo $car['cname']; ?>" class="car-image">
        <h2><?php echo $car['cname']; ?></h2>

        <div class="btn-container">
            <button class="btn">View RC File</button>
            <button class="btn">View Insurance File</button>
        </div>

        <div class="user-profile">
            <div class="detail">
                <?php
                $fields = ['cname' => 'Car Name:', 'chprice' => 'Rent Per Hour:', 'price' => 'Rent Per Day:', 'modal' => 'Model:', 'no_plate' => 'Number Plate:', 'brand' => 'Brand:', 'seat' => 'Seat:', 'fual' => 'Fual:', 'door' => 'Door:', 'en_power' => 'Engine Power:', 'en_type' => 'Engine Type:', 'break_type' => 'Break Type:', 'fual_capacity' => 'Fual Capacity:', 'mileage' => 'Mileage:', 'status' => 'Status:'];
                foreach ($fields as $key => $label) {
                    echo '<div class="profile-info">
                            <label>' . $label . '</label>
                            <input type="text" value="' . $car[$key] . '" readonly>
                        </div>';
                }
                ?>
            </div>
            <div class="accessories">
                <label>Accessories:</label>
                <div class="details">
                    <?php foreach ($oldAccessories as $accessory): ?>
                        <input type="text" value="<?php echo htmlspecialchars(trim($accessory)); ?>" readonly>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <button class="btn back-btn" onclick="goBack()">⬅ Back</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>