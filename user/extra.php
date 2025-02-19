<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right,rgb(233, 71, 71), #ff6666);
        }

        .container {
            display: flex;
            width: 800px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 500px;
        }

        .left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .left img {
            max-width: 400px;
            height: 450px;
            border-radius: 10px;
        }

        .right {
            flex: 1;
            padding: 50px;
        }

        .right h2 {
            margin-bottom: 20px;
        }

        .input-box {
            width: 100%;
            margin-bottom: 15px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .checkbox {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #ff0000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="image/login.jpg" alt="Login Image">
        </div>
        <div class="right">
            <h2>Sign in</h2>
            <form>
                <div class="input-box">
                    <input type="text" placeholder="User Name" required>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button class="btn">Sign in</button>
                <div class="signup-link">
                    Don't have an account? <a href="#">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>