<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
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
            background: linear-gradient(to right, #4facfe, #00f2fe);
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

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
        <h2>Forgot Password?</h2>
        <p>Enter your email and we'll send you a reset link.</p>
        
        <form action="send_reset_email.php" method="POST">
            <div class="input-group">
                <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>

</body>
</html>
