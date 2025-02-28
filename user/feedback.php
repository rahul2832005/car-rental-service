<?php  
@include "include/config.php";
error_reporting(0);
session_start();
$vid="";
$user_id = $_SESSION['userid'];
$car_id = $_GET['vid']; 

$sql = "SELECT * FROM feedback WHERE uid = $user_id AND vid = $car_id";
$exsql = mysqli_query($conn, $sql);
$result = mysqli_num_rows($exsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h2 {
            color: #333;
            font-weight: 600;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #444;
        }

        select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: 0.3s;
            font-size: 16px;
        }

        select:focus, textarea:focus {
            border-color: #007BFF;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        .submit-btn {
            display: inline-block;
            background: #007BFF;
            color: white;
            padding: 12px 20px;
            margin-top: 15px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        .submit-btn:active {
            transform: scale(0.98);
        }

        /* Animation */
        .submit-btn::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.2);
            transition: 0.6s;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
        }

        .submit-btn:active::after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
            transition: 0s;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<?php


if ($result == 0) { ?>

    <div class="container">
        <h2>Leave a Review</h2>
        <form action="submit_feedback.php" method="POST">
            <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

            <label>Rating:</label>
            <select name="rating" required>
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="2">⭐⭐</option>
                <option value="1">⭐</option>
            </select>

            <label>Comment:</label>
            <textarea name="comment" placeholder="Write your experience..." required></textarea>

            <button type="submit" class="submit-btn">Submit Feedback</button>
        </form>
    </div>

<?php } else {
    echo "<div class='container'><h2>You have already provided feedback.</h2></div>";
}
?>

</body>
</html>
