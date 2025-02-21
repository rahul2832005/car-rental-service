<?php
session_start();
error_reporting(0);
@include 'include/config.php';

if(isset($_POST['submit']))
{
    $count=0;
    $em=$pass="";
    $aemail=$_POST['username'];
    $apassword=$_POST['password'];


    if($aemail=="")
    {
        $em="Enter Email ID !";
        $count++;
    }
    else
    {
        $ex1='/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-z]/';
        if(!preg_match($ex1,$aemail))
        {
            $em="Enter Valid Email Address !";
            $count++;
        }
    }

    if($apassword=="")
    {
        $pass="Enter The Password";
        $count++;
    }
    else
    {
        if(strlen($apassword)<8)
        {
            $pass="Enter At leasr 8 character !";
            $count++;
        }
    }

  

    if($count==0)
        {
            
            $query="select * from admin where aemail='$aemail' && apassword='$apassword'";
            $exquery=mysqli_query($conn,$query);
        
            $row=mysqli_num_rows($exquery);
            $user=mysqli_fetch_assoc($exquery);
           
           
            $username=$user["aemail"];
            $_SESSION["adlogin"]=$username;
           
            header("location:dashboard.php");     
             
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Car Rental</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
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
            background: url('car-rental-bg.jpg') no-repeat center center/cover;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #d32f2f;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            padding-left: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #d32f2f;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            border: none;
            background: #d32f2f;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .login-btn:hover {
            background: #b71c1c;
        }
        .forgot-password {
            display: block;
            margin-top: 10px;
            color: #d32f2f;
            text-decoration: none;
            font-size: 14px;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Car Rental Admin Login</h2>
        <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form action="" method="POST">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" >
                <p style="color: red;"><?php echo $em;  ?></p>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" >
                <p style="color: red;"><?php echo $pass;  ?></p>

            </div>
            <button type="submit" class="login-btn" name="submit">Login</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
