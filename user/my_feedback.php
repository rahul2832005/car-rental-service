<?php
session_start();
include "include/config.php";

$user_id = $_SESSION['userid']; // Logged-in user ID

$sql = "SELECT f.rating, f.comment, f.created_at, c.cname, u.name, u.profile_picture 
        FROM feedback f 
        JOIN car_list c ON f.vid = c.vid 
        JOIN reguser u ON f.uid = u.uid 
        WHERE f.uid = $user_id 
        ORDER BY f.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Feedback</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
     
        
   
        .rating {
            color: gold;
            font-size: 18px;
        }
        .date {
            font-size: 12px;
            color: gray;
        }
        
        .testimonial-card {
            background: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            text-align: left;
        }

        .testimonial-header {
            display: flex;
            /* align-items: center; */
            margin-bottom: 15px;
        }

        .avatar {
            width: 70px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .name-and-stars {
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .name {
            color: black;
            margin: 0;
            font-size: 23px;
            font-weight: bold;
        }

        .role {
            margin: 0;
            color: #777;
            font-size: 18px;
            line-height: 29px;
        }

        .testimonial-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .stars {
            color: #f5c518;
            font-size: 27px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>My Feedback</h2>

    <?php if (mysqli_num_rows($result) > 0) { 
        while ($row = mysqli_fetch_assoc($result)) { ?>
     

            <div class="testimonial-card">
                <div class="testimonial-header">
                    <img src="<?php echo $row['profile_picture']; ?>" alt="Atalia Helena" class="avatar">
                    <div>
                        <div class="name-and-stars">
                            <h3 class="name"><?php echo $row['name']; ?></h3>
                            <span class="stars"><?php echo str_repeat("⭐", $row['rating']); ?></span>
                        </div>
                        <p class="role">For <?php echo $row['cname'];?></p>
                    </div>
                </div>
                <p class="testimonial-text">“<?php echo $row['comment']; ?>”</p>
                <p class="date">Submitted on: <?php echo date("d M Y", strtotime($row['created_at'])); ?></p>

            </div>
    <?php } } else { ?>
        <p>No feedback given yet.</p>
    <?php } ?>
</div>

</body>
</html>
