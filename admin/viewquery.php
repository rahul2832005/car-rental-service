<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If installed via Composer
include "include/config.php"; // Database connection

if (isset($_GET['contactid'])) {
    $query_id = $_GET['contactid'];
    $query = "SELECT * FROM contactusquery WHERE contactid = $query_id";
    $exquery = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exquery);
} else {
    echo "<script>alert('Invalid request!'); window.location.href='manage_contactus_query.php';</script>";
    exit();
}

// Handle reply submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reply_message = $_POST['reply_message'];
    $to_email = $row['Email'];
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP provider
        $mail->SMTPAuth = true;
        $mail->Username = 'carolarental3@gmail.com';
        $mail->Password = 'bojiwwvipmyipdqc';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('carolarental3@gmail.com', 'CarOla');
        $mail->addAddress   ($to_email);

        $mail->isHTML(true);
        $mail->Subject = 'Reply to Your Contact Query';
        $mail->Body    = "
        Welcome To Carola. <br>
        <p>Dear ".$row['username']."</p><br>  
        <p><strong>Your Query:</strong><br>" . nl2br($row['messages']) . "</p><br> 
        <p><strong>Admin's Reply:</strong><br>" . nl2br($reply_message) . "</p><br> 
        <p>Best Regards,<br>Admin Team</p>
        <h2>Thank You</h2>";
        $mail->send();
        echo "<script>alert('Replay sent Done!');</script>";
        echo "<script>window.open('manage_contacctus_query.php', 'second');</script>";
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Query Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px 0px #aaa;
            border-radius: 8px;
            margin-top: 50px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .detail {
            text-align: left;
            padding: 10px;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 100px;
        }
        .btn-send {
            background-color: #28a745;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }
        .btn-send:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Query Details</h2>
    <div class="detail"><strong>Name:</strong> <?php echo $row['username']; ?></div>
    <div class="detail"><strong>Email:</strong> <?php echo $row['Email']; ?></div>
    <div class="detail"><strong>Message:</strong> <?php echo nl2br($row['messages']); ?></div>
    <div class="detail"><strong>Posting Date:</strong> <?php echo $row['PostingDate']; ?></div>

    <!-- Reply Form -->
    <h3>Reply to Query</h3>
    <form method="POST">
        <textarea name="reply_message" placeholder="Enter your reply..." required></textarea>
        <button type="submit" class="btn-send">Send Reply</button>
    </form>

    <a href="#" class="btn-back" onclick="goBack()">← Back to Queries</a>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
