
<?php  

$nm=$count=$num=$email=$em=$pass=$passer=$com_pass=$cpas=$match=$fname=$no="";
require 'vendor/autoload.php'; // If using Composer
@include "include/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["sign-up"]))
{
    $count=0;

    $fname=$_POST["fname"];
    $no=$_POST["no"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $com_pass=$_POST["com_pass"];
    $token = bin2hex(random_bytes(50)); // Generate a random token

    
   
    if($fname=="")
    {
        $nm="Enter Name !";
        $count++;
    }
    else
    {
        $ex='/^[a-zA-Z]*$/';
        if(!preg_match($ex,$fname))
        {
        $nm="Enter Only Alpha !";
        $count++;
        }
    }

    if($no=="")
        {
            $num="Please Enter Number !";
            $count++;
        }
        else
        {
            if(!is_numeric($no) || (strlen($no)<10 ))
            {
                $num="Not Number Compalate !";
                 $count++;
                
            }
           
         }
            
                 
        
        if($email=="")
        {
            $em="Enter Email ID !";
            $count++;
        }
        else
        {
            $emailquery="select * from reguser where email='$email'";
            $exemailquery=mysqli_query($conn,$emailquery);
            $row=mysqli_num_rows($exemailquery);
            if($row>0)
            {
                $em="Email Already Exist!";
                $count++;
            }
            $ex1= '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
            if(!preg_match($ex1,$email))
            {
                $em="Enter Valid Email Address !";
                $count++;
            }
        }
        if($pass=="")
        {
            
            $passer="Enter The Password";
            $count++;
        }
        elseif(strlen($pass)<8)
        {
                $passer="Enter At lease 8 character !";
                $count++;
        }
        
        if($com_pass=="")
        {
            $cpas="Enter Confirm Pasword !";
            $count++;
        }
        elseif($com_pass!=$pass) 
        {
            $cpas="Not Matched Password !";
            $count++;
        }

       if($count==0)
       {
          // Check if email already exists
    $stmt = "SELECT * FROM reguser WHERE email = '$email'";
    $exstmt = mysqli_query($conn, $stmt);
    
    if (mysqli_num_rows($exstmt) > 0) {
        echo "<script>alert('Email already exists!');window.location.href='register.php';</script>";
        exit;
    }

    // Insert user into database
    $stmt1 = "INSERT INTO reguser (name, mnumber, email, password, token) VALUES ('$fname', '$no', '$email', '$pass', '$token')";
    $exstmt1 = mysqli_query($conn, $stmt1);

    if ($exstmt1) {
        // Send Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'carolarental3@gmail.com';
            $mail->Password = 'slwrclbveudzqlag'; // Use an app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('carolarental3@gmail.com', 'CarOla');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verify Your Email';
            $mail->Body    = "
                Welcome to CarOla! <br>
                Click the link below to verify your account: <br>
                <a href='http://localhost/projects/rental/car-rental-service/user/verify_user.php?token=$token&email=$email'>BM Verify Email</a> 
                <a href='http://localhost/car%rental%service/user/verify_user.php?token=$token&email=$email'>RB Verify Email</a> 
                <br><br>
                If you did not request this, please ignore this email.
                <br><br>
                <h2>Thank You!</h2>
            ";

            $mail->send();
            echo "<script>alert('Verification Link Sent To Your Email!');window.location.href='login.php';</script>";
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('Registration failed!');window.location.href='register.php';</script>";
    }
       }


       
        
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
            background: url("image/register1_bg.jpg") no-repeat;
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

        .error {
            font-size: 17px;
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
            <!-- <p><?php /*echo $count;*/ ?></p> -->
            <div class="input-box">
                <input type="text" placeholder="Full-Name" name="fname" value="<?php echo $fname ; ?>"/>
                <p style="color: red;"><?php  echo $nm ; ?></p>
            </div>

            <div class="input-box">
                <input type="text" placeholder="number" name="no" value="<?php echo $no ; ?>"/>
                <p style="color: red;"><?php  echo $num ; ?></p>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Email" name="email" value="<?php echo $email ; ?>" />
                <p style="color: red;"><?php  echo $em ; ?></p>

            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="pass" value="<?php echo $pass ; ?>" />
                <p style="color: red;"><?php  echo $passer ; ?></p>

            </div>

            <div class="input-box">
                <input type="password" placeholder="confirm password" name="com_pass"  value="<?php echo $com_pass ; ?>"/>
                <p style="color: red;"><?php  echo $cpas ; ?></p>
                <p style="color: green;"><?php  echo $match ; ?></p>

            </div>

            <div class="input-box">
            <button type="submit" class="btn" name="sign-up">Register</button>
            </div>
            <div class="register-link">
                <p>You Already have an account?<a href="login.php">Login Here!</a></p>
            </div>

        </form>
    </div>
    </body>
</html>
