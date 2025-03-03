<?php
session_start();
include "include/config.php"; // Database connection

// Check if user is logged in
if (!isset($_SESSION['adlogin'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_id = $_SESSION['adid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch user from database
    $query = "SELECT apassword FROM admin WHERE aid = $admin_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user || $old_password !== $user['apassword']) {
        echo "<script>alert('Old password is incorrect!');</script>";
    } elseif ($new_password !== $confirm_password) {
        echo "<script>alert('New passwords do not match!');</script>";
    } else {
        // Hash new password
        // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password
        $update_query = "UPDATE admin SET apassword = '$new_password' WHERE aid = $admin_id";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Password changed successfully!');</script>";
            echo "<script>
    if(window.top !== window.self) { 
        window.top.location.href = 'admin_login.php'; // Parent page ko redirect karega
    } else {
        window.location.href = 'admin_login.php'; // Normal redirect karega agar iframe nahi hai
    }
</script>";
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .container {
            width: 350px;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px 0px #aaa;
            border-radius: 8px;
            margin-top: 100px;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: rgb(221, 114, 65);
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Change Password</h2>
        <form method="POST" onsubmit="return validateForm()">
            <label>Old Password:</label>
            <input type="password" name="old_password" id="old_password" required>

            <label>New Password:</label>
            <input type="password" name="new_password" id="new_password" required>

            <label>Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <button type="submit">Change Password</button>
        </form>
    </div>

    <script>
        function validateForm() {
            let newPassword = document.getElementById("new_password").value;
            let confirmPassword = document.getElementById("confirm_password").value;

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>