<?php
include "include/config.php";

if (!isset($_GET['fid']) || empty($_GET['fid'])) {
    echo "Invalid Feedback ID.";
    exit;
}

$fid = $_GET['fid'];

$sql = "SELECT f.fid, f.rating, f.comment, f.created_at, c.cname, u.name, u.profile_picture
        FROM feedback f
        JOIN car_list c ON f.vid = c.vid
        JOIN reguser u ON f.uid = u.uid
        WHERE f.fid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $fid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$feedback = mysqli_fetch_assoc($result);

if (!$feedback) {
    echo "Feedback not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
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

        .container {
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .name {
            font-size: 20px;
            font-weight: bold;
        }

        .stars {
            font-size: 18px;
            color: gold;
        }

        .car-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;

        }

        .comment {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            text-align: justify;
            word-wrap: break-word;
        }

        .date {
            font-size: 14px;
            color: #777;
            margin-top: 15px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #0056b3;
        }
        .container img{
            object-fit: scale-down;
            object-fit: cover;
            /* object-fit: cover; */
        }
    </style>
</head>

<body>

    <div class="container">
        <img src="../user/<?php echo $feedback['profile_picture']; ?>" alt="<?php echo $feedback['name']; ?>" class="avatar">
        <h2 class="name"><?php echo $feedback['name']; ?></h2>
        <p class="stars"><?php echo str_repeat("⭐", $feedback['rating']); ?></p>
        <p class="car-name">For: <?php echo $feedback['cname']; ?></p>
        <p class="comment">"<?php echo $feedback['comment']; ?>"</p>
        <p class="date">Submitted on: <?php echo date("d M Y", strtotime($feedback['created_at'])); ?></p>
        <a href="manage_feedback.php" class="back-btn">Go Back</a>
    </div>

</body>

</html>
