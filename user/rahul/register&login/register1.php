<? php/*
ob_start();
$conn=mysqli_connect('localhost','root','','rahul');
if(!$conn)
{
    echo "not connect";
}
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$sql="INSERT INTO `login` (`username`, `email`, `password`) VALUES ('$fname', '$email', '$pass');";
	$query=mysqli_query($conn,$sql);
	if(!$query)
	{
		echo "not insert";
	}
    else
    {
        echo "inserted";
        header("location:login1.php");
    }
	
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background: url(rbg.jpg) no-repeat;
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
            font-size: 14.5px;
            margin: -15px 0px 15px;
        }

        .remember-forgot label input {
            color: #fff;
            margin-right: 3px;
        }

        .remember-forgot a {
            color: #fff;
            text-decoration: none;
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
    </style>
</head>

<body>
    </div>
    <div class="content">
        THE PLACE WHERE ADVENTURES
        BEGINS!
    </div>
    <div class="container">
        <form action="#" method="post">
            <h1>Register</h1>

            <div class="input-box">
                <input type="text" placeholder="First-Name" name="fname" required />
            </div>

            <div class="input-box">
                <input type="text" placeholder="number" name="no" />
            </div>

            <div class="input-box">
                <input type="text" placeholder="Email" name="email" />
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" />
            </div>
            <div class="input-box">
                <input type="password" placeholder="confirm password" name="con_pass" />
            </div>


            <button type="submit" class="btn" name="submit">Register</button>


        </form>
    </div>