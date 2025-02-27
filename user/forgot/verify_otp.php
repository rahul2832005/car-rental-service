<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = $_POST["otp"];

    if (isset($_SESSION["otp"]) && time() < $_SESSION["otp_expire"]) {
        if ($user_otp == $_SESSION["otp"]) {
            $_SESSION["verified"] = true;
           
            header("Location: reset_password.php");
            exit();
        } else {
            echo "<script> alert('Invalid OTP!');</script>";
        }
    } else {
       
        echo "<script> alert('OTP expired! Please request a new one.');</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 14px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            text-align: left;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #4facfe;
            box-shadow: 0px 0px 5px rgba(79, 172, 254, 0.5);
        }

        button {
            width: 100%;
            background: #4facfe;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background: #00c6fb;
        }

        .resend-link {
            font-size: 14px;
            margin-top: 10px;
            color: #333;
        }

        .resend-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold;
        }

        .resend-link a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 400px) {
            .container {
                padding: 15px;
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>OTP Verification</h2>
        <p>Enter the OTP sent to your email or phone</p>
        
        <form action="" method="POST">
            <label for="otp">Enter OTP</label>
            <input type="number" name="otp" required>
            <button type="submit">Verify OTP</button>
        </form>

        <p class="resend-link">Didn't receive OTP? <a href="resend_otp.php">Resend OTP</a></p>
    </div>
</body>
</html>

