<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', 'sans-serif';
            font-size: 20px;
        }

        body {
            display: flex;
            /*justify-content: center;*/
            align-items: center;
            min-height: 100vh;
            background: url("image/login_bg.jpg") no-repeat;
            background-size: cover;

        }
       
        .container {
            /* background:green;*/
            margin-left: 50px;
            width: 355px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            backdrop-filter: blur(6px);
        }

        .container h1 {
            font-size: 36px;
            text-align: center;
        }

        .container .input-box {
            position: relative;
            width: 100%;
            height: 50%;
            margin: 30px 0;
        }

        .input-box input {
            width: 100%;
            height: 6vh;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder {
            color: #fff;
        }

        .container .remember-forgot {
            display: flex;
            justify-content: space-between;
            margin: -15px 0px 15px;
        }

        .remember-forgot label input {
            color: #fff;
            margin-right: 5px;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
            margin-left: 40px;
            margin-right: -40px;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .container .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 5px;
            box-decoration-break: 0px 0px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 16px;
            font-weight: 400;
            color: #333;
        }

        .container .register-link {
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0px 20px;
        }

        .register-link p a {
            color: #fff;
            text-decoration: none;
           
        }

        .register-link p a:hover {
            text-decoration: underline;
        }

        .content {
            margin-left: 50px;
            color: #fff;
            height: 100%;
            width: 50%;
            display: flex;
            /*justify-content: center;*/
            flex-direction: column;
            font-size: 45px;
            font-family: ARIAL;
            font-weight: bold;
        }

        .social-links {
            margin-bottom: 20px;
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            margin-right: 10px;
            color: black;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        hr {
            width: 370px;
            border: 3px solid white;
            margin-bottom: 10px;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <h1>Login</h1>

            <div class="input-box">
                <input type="text" placeholder="Email" name="email"/>
                

            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password"/>
                
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" /> Remember me</label>
                <a href="#"> Forgot Password?</a>
            </div>
            <button type="submit" class="btn" name="submit">Log in</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register1.php">Register Here!</a></p>
            </div>
        </form>
    </div>
    <div class="content">
        UNLOCK UNFORGETTABLE MEMORIES
        ON THE ROAD.
        <p>
            <hr>
            </hr>
        </p>
        <div class="social-links">
            <a href=""><i class="fa-solid fa-facebook"></i></a>
            <a href=""><i class="fa-solid fa-twitter"></i></a>
            <a href=""><i class="fa-solid fa-instagram"></i></a>


        </div>
    </div>
</body>

</html>
=======
<?php
//login page
    ob_start();
    session_start();
    error_reporting(0);
    include 'connection.php';

    if(isset($_POST["login"]))
    {
        $count=0;
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query="select * from reguser where email='$email' && password='$password'";
        $exquery=mysqli_query($conn,$query);

        $row=mysqli_num_rows($exquery);

        if($row==1)
        {
            $show="select * from reguser where email='$email'";
            $data=mysqli_query($conn,$show);
            $user=mysqli_fetch_assoc($data);
            // $id = $user["id"];
            // $_SESSION["userid"]=$id;
            

            $username=$user["name"];
            $_SESSION["alogin"]=$username;
           
             header("location:dis_car.php");

        }
        else {
        ?>
            <script type="text/javascript">
            alert("NO User Found Of  This Details !");</script>

        <?php  }
        if($email=="")
        {
            $em="Enter Email ID !";
            $count++;
        }
        else
        {
            $ex1='/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-z]/';
            if(!preg_match($ex1,$email))
            {
                $em="Enter Valid Email Address !";
                $count++;
            }
        }
        if($password=="")
        {
            $pass="Enter The Password";
            $count++;
        }
        else
        {
            if(strlen($password)<8)
            {
                $pass="Enter At leasr 8 character !";
                $count++;
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #40c9a2, #63e6be);
        }

        .login-container {
            display: flex;
            background: white;
            border-radius: 24px;
            overflow: hidden;
            width: 1000px;
            height: 600px;
            box-shadow: 0 20px 40px rgba(226, 118, 118, 0.1);
        }

        .car-section {
            flex: 1;
           background:linear-gradient(red,white,maroon);
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .car-image {
            width: 120%;
            max-width: 800px;
            height:60%;
           
            
        }

        .form-section {
            flex: 1;
            padding: 60px;
            position: relative;
        }

        .close-button {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            text-decoration: none;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 16px;
            color: #1a1a1a;
        }

        .subtitle {
            color: #666;
            margin-bottom: 32px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #40c9a2;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            background: #ffc107;
            border: none;
            border-radius: 8px;
            color: #1a1a1a;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-button:hover {
            background: #ffb300;
        }

        .alternative-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
        }

        .alternative-actions a {
            color: #40c9a2;
            text-decoration: none;
            font-size: 14px;
        }

        .signup-section {
            margin-top: 32px;
            text-align: center;
            color: #666;
        }

        .signup-section a {
            color: #40c9a2;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    

    <div class="login-container">
        <div class="car-section">
            <img src="image/file (1).png" alt="Rental Car" class="car-image">
        </div>
        <div class="form-section">
            <a href="dis_car.php" class="close-button">×</a>
            <h1>Login your Account</h1>
            <p class="subtitle">Since this is your first trip, you'll need to provide us with some information before you can check out.</p>
            
           

            <form method="POST" >
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email Id" ><p style="color: red;"><?php echo $em ;?></p>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" ><p style="color: red;"><?php echo $pass ; ?></p>
                </div>
                
                <button type="submit" class="login-button" name="login">Login</button>
                
                <div class="alternative-actions">
                    <a href="#">Login with phone instead</a>
                    <a href="#">Forgot password?</a>
                </div>
                
                <div class="signup-section">
                    New member? <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
>>>>>>> 335798e5deb0f6b149078e2c5c4946b6ec6edc30
