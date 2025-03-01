<?php
include "include/config.php";
$booking_id = $_GET['id']; // Booking ID from URL

// Fetch booking details
$query = "SELECT * FROM booking WHERE id = $booking_id";
$result = mysqli_query($conn, $query);
$booking = mysqli_fetch_assoc($result);

$queryday = "SELECT vid, DATEDIFF(ToDate, FromDate) AS booking_days FROM booking WHERE id = $booking_id";
$resultday = mysqli_query($conn, $queryday);
$bookingday = mysqli_fetch_assoc($resultday);

$old_booking_days = $bookingday['booking_days']; // Total days of old booking

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Booking</title>
    <link rel="stylesheet" href="style.css"> <!-- Linking external CSS -->
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Form Container */
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        /* Heading */
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Fields */
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button Styling */
        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Modify Your Booking</h2>
        <form action="process_modify.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">

            <label>New Start Date:</label>
            <input type="date" id="new_start_date" name="new_start_date" required><br>

            <label>New End Date:</label>
            <input type="date" id="new_end_date" name="new_end_date" required><br>

            <button type="submit">Request Modification</button>

            <label>You Select  Only <?php echo $old_booking_days; ?>  Day</label><br>
            <!-- <label>Otherwise Pay Extra</label> -->
            <!-- <input type="date" id="new_end_date" name="new_end_date" required><br> -->
        </form>
    </div>

    <script>
        function validateForm() {
            let startDate = document.getElementById("new_start_date").value;
            let endDate = document.getElementById("new_end_date").value;
            let today = new Date().toISOString().split("T")[0];

            if (startDate < today) {
                alert("Start date cannot be in the past.");
                return false;
            }
            if (endDate <= startDate) {
                alert("End date must be after the start date.");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>