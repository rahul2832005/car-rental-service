<?php
session_start();
@include "include/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["cropped_image"])) {
    $uploadDir = "upload/";
    $fileName = "profile_" . $_SESSION["userid"] . ".jpg";
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["cropped_image"]["tmp_name"], $filePath)) {
        // Database update query
        $updateQuery = "UPDATE reguser SET profile_picture='$filePath' WHERE uid='{$_SESSION["userid"]}'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "Profile updated successfully!";
        } else {
            echo "Database error: " . mysqli_error($conn);
        }
    } else {
        echo "File move error. Check folder permissions.";
    }
} else {
    echo "No file uploaded or invalid request.";
}
?>
