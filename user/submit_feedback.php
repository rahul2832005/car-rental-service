<?php
// error_reporting(0);
@include "include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $car_id = $_POST['car_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback (uid, vid, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $user_id, $car_id, $rating, $comment);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully.');
        window.location.href='my_feedback.php';</script>";
        // header("Location: feedback.php");
    } else {
        echo "Error submitting feedback.";
    }
}
?>
