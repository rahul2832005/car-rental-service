<?php
session_start();
ob_start();
$conn=mysqli_connect('localhost','root','','rahul');
if(!$conn)
{
    echo "not connect";
}
if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$pass=$_POST["password"];
    echo $email;

	
	$query="select * from login where email='$email' and password=$pass";
	
	$hm=mysqli_query($conn,$query);
	
	$row=mysqli_num_rows($hm);
	
	if($row==1)
	{
		$_SESSION["email"]=$_POST["email"];
		header("location:welcome.php");
	}
	else
	{
	
	header("location:register.php");

		echo "user not found";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="lstyle.css"></link>
</head>
<body>
  <div class="container">
    <form action="#" method="post">
        <h1>Login</h1>

        <div class="input-box">
            <input type="text" placeholder="Email" name="email"required />
            
        </div>

        <div class="input-box">
            <input type="password" placeholder="Password"  name="password"required />
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
  THE GOAL OF THE LIFE IS
LIVING IN  AGREEMENT 
WITH NATURE.
<p><hr></hr></p>
<div class="social-links">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            

          </div>  
  </div>
</body>
</html>