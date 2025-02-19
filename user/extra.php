<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @font-face {
    font-family: 'pop-regular';
    src: url('../font/Poppins-Regular.ttf');
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'pop-regular';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, rgb(233, 71, 71), #ff6666);
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
            margin-top: -10px;
        }

        .left img {
            width: 450px;
            height: 430px;
            object-fit: fill;
            border-radius: 10px;
        }


        .right {
            flex: 1;
            padding: 25px;
            line-height: 50px;
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
            padding: 5px;
            background:rgb(235, 66, 66);
            font-size: 25px;
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
                <button class="btn">Login</button>
                <div class="signup-link">
                    Don't have an account? <a href="#">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>