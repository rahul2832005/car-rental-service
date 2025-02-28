<?php
// Database connection
include "include/config.php";

// Fetch user details
$uid = $_GET['uid']; // Get user ID from URL
$sql = "SELECT * FROM reguser WHERE uid = '$uid'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
            margin-bottom: 20px;
        }

        .doc-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .doc-links a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .doc-links a:hover {
            background-color: #0056b3;
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
            display: inline-block;
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #45a049;
            cursor: pointer;
        }

        .detail {
            display: flex;
            flex-wrap: wrap;
            margin-left: 22px;
        }

        @media (max-width: 600px) {
            .profile-info label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-section">
            <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture" class="profile-img">
            <div class="doc-links">
                <a href="../user/<?php echo $user['aadhar_file']; ?>" target="_blank">View Aadhar File</a>
                <a href="../user/<?php echo $user['license_file']; ?>" target="_blank">View License File</a>
            </div>
        </div>
        <div class="user-profile">
            <div class="detail">
                <div class="profile-info">
                    <label>Name:</label>
                    <input type="text" value="<?php echo $user['name']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Mobile:</label>
                    <input type="text" value="<?php echo $user['mnumber']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Email:</label>
                    <input type="email" value="<?php echo $user['email']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>DOB:</label>
                    <input type="text" value="<?php echo $user['DOB']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Gender:</label>
                    <input type="text" value="<?php echo $user['gender']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>State:</label>
                    <input type="text" value="<?php echo $user['state']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Address:</label>
                    <input type="text" value="<?php echo $user['address']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Pincode:</label>
                    <input type="text" value="<?php echo $user['pincode']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Aadhar Number:</label>
                    <input type="text" value="<?php echo $user['aadhar_number']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>License Number:</label>
                    <input type="text" value="<?php echo $user['license_number']; ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Is Verified:</label>
                    <input type="text" value="<?php echo ($user['is_verified'] ? 'Yes' : 'No'); ?>" readonly>
                </div>
                <div class="profile-info">
                    <label>Created At:</label>
                    <input type="text" value="<?php echo $user['created_at']; ?>" readonly>
                </div>
            </div>
        </div>
        <button class="back-btn" onclick="goBack()"><i class="fas fa-arrow-left" ></i> Back to Bookings</button>
    </div>
<script>
    function goBack()
    {
        window.history.back();
    }
</script>
</body>

</html>