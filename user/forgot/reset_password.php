<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'car_rent');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
$op=$er="";
$newp = $conp = "";
$token = isset($_GET['token']) ? $_GET['token'] : '';

if (isset($_POST['reset'])) {
    $count = 0;
    $newp = $_POST['new_pass'];
    $conp = $_POST['con_pass'];
    $token = $_POST['token']; // Get token from POST

    // Validate input fields
    if (empty($newp)) {
        $op = "Enter new Password";
        $count++;
    }

    if (empty($conp)) {
        $er = "Enter confirm password ";
        $count++;
    } elseif ($newp !== $conp) {
        $er = "Password does not match!";
        $count++;
    }

    if ($count == 0) {
        // Verify if the token exists
        $stmt = $conn->prepare("SELECT uid FROM reguser WHERE reset_token = ? AND reset_expiry > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();



        
        if ($stmt->affected_rows > 0) {
        
            // Hash the new password before updating
            // $hashed_password = password_hash($newp, PASSWORD_BCRYPT);

            // Update password securely
            $stmt = $conn->prepare("UPDATE reguser SET password = ?, reset_token = NULL , reset_expiry=NOW()  WHERE reset_token = ?");
            $stmt->bind_param("ss", $newp, $token);
            $stmt->execute();

                echo "<script>alert('Password changed successfully!'); window.location.href='../login.php';</script>";
            } else {
                echo "<script>alert('Password update failed!');</script>";
            }
        
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        /* Form Container */
        .container {
            background: white;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Title & Subtitle */
        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: 0.3s ease-in-out;
        }

        .input-group input:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }

        /* Button */
        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0px 5px 10px rgba(0, 91, 187, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            p {
                font-size: 12px;
            }

            .input-group input {
                font-size: 14px;
                padding: 10px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="reset-box">
            <h2>Reset Your Password</h2>
            <p>Please enter a new password for your account.</p>

            <form action="" method="post">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

                <div class="input-group">
                    <input type="password" name="new_pass" placeholder="Enter New Password" value="<?php echo $newp; ?>" >
                    <p style="color: red;"><?php echo $op; ?></p>
                </div>

                <div class="input-group">
                    <input type="password" name="con_pass" placeholder="Confirm New Password" value="<?php echo $conp; ?>">
                    <p style="color: red;"><?php echo $er; ?></p>
                </div>

                <button type="submit" name="reset">Reset Password</button>
            </form>
        </div>
    </div>
</body>

</html>