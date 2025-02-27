<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - OTP</title>
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

        .login-link {
            font-size: 14px;
            margin-top: 10px;
            color: #333;
        }

        .login-link a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
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
        <h2>Forgot Password?</h2>
        <p>Enter your email to receive an OTP</p>
        
        <form action="send_otp.php" method="POST">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Send OTP</button>
        </form>

        <p class="login-link">Remembered your password? <a href="../login.php">Login</a></p>
    </div>
</body>
</html>
