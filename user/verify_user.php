<?php
@include "include/config.php"; // Ensure config.php has $conn for DB connection

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    // Verify the token
    $stmt = "SELECT * FROM reguser WHERE email = '$email' AND token = '$token'";
    $exstmt = mysqli_query($conn, $stmt);

    if ($exstmt && mysqli_num_rows($exstmt) > 0) {
        // Update verification status
        $stmt1 = "UPDATE reguser SET is_verified = 1, token = '' WHERE email = '$email'";
        $exstmt1 = mysqli_query($conn, $stmt1);

        if ($exstmt1) {
            echo "<script>alert('✅ Your email has been verified successfully!');window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('❌ Verification failed!');</script>";
        }
    } else {
        echo "<script>alert('⚠️ Invalid or expired token!');</script>";
    }
} else {
    echo "<script>alert('⚠️ Invalid request! Missing email or token.');</script>";
}
?>
