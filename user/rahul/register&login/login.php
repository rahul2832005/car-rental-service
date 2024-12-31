<?php
session_start();
ob_start();
$conn=mysqli_connect("localhost","root","","rahul");
$e_name=$e_pass="";
if(!$conn)
{
    echo "not conntect";
} 
if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$pass=$_POST["password"];

	
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
<html>
	<head>
		<style type="text/css">
			body{
				margin-top:100px;
				background:url("image/login_bg.jpg") no-repeat;
				background-size:cover;
			}
			.form{
				width: 280px;
				margin:auto;
				padding:12px;
				border:2px solid #ccc;
				border-radius:18px;
				font-family:Arial Black;
				background-color:skyblue;
				
			}
			h3{
				color:white;
				text-align:center;
			}
			input{
				padding:12px;
				width:100%;
				margin-bottom:12px;
				border:0px;
				border-radius:6px;
				background-color:#fff;
			}
			button{
			
				background-color:black;
				color:white;
				padding:12px;
				font-size:1rem;
				border-radius:6px;
				margin-left: 97px;

			}
			button:hover{
				cursor: pointer;
			}
			p{
				text-align:center;
			}
				
	

		</style>
	</head>
    <body>
        <div class="form">
        <form method="post" action="login.php">
			
				<h3>Sign in</h3>
				<p>sign in with your email and password</p>

				Email<input type="text" name="email" placeholder="Enter Email-id" required><br>
				
		
            	Password<input type="password" name="password" placeholder="Enter Password" required><br>
				
		
			<section>
            <button type="submit" name="submit">Login</button>
			<p>Not a member?<a href="register.php">Register Here!</a></p>
			</section>
		</div>
        </form>

    </body>
</html>