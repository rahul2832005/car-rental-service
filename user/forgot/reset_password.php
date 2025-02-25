<?php
session_start();
error_reporting(0);

$conn=mysqli_connect("localhost","root","","car_rent");
if(!$conn)
{
    echo "not";
}
$op=$er="";
$count=0;
// if (!isset($_SESSION["verified"])) {
//     echo "Unauthorized access!";
//     exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newp = $conp = "";
    $newp = $_POST['password'];
    $conp = $_POST['con_password'];
 // Validate input fields
 if (empty($newp)) {
    $op = "Enter new Password";
    $count++;
}

if (empty($conp)) {
    $er = "Enter confirm password ";
    $count++;
} elseif ($newp !== $conp) {
    $er = "Password does not match!";
    $count++;
}

    
    $email = $_SESSION["email"];
if($count==0)
{
    mysqli_query($conn, "UPDATE reguser SET password='$newp',reset_otp='' WHERE email='$email'");
    echo "<script>alert('Password Reset SuccessFylly .');</script>";
    echo "<script>window.location.href='../login.php'</script>";
   
}  
// header("location:../login.php"); 
    // Clear session
    session_unset();
    session_destroy();

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
            border-color: #ff9a9e;
            box-shadow: 0px 0px 5px rgba(255, 154, 158, 0.5);
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
        <h2>Reset Password</h2>
        <p>Enter your new password</p>
        
        <form action="" method="POST">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" value="<?php echo $newp; ?>">
            <p style="color: red;"><?php echo $op; ?></p>

            <label for="password">New Password</label>
            <input type="password" name="con_password" id="password" value="<?php echo $conp; ?>">
            <p style="color: red;"><?php echo $er; ?></p>

            <button type="submit">Reset Password</button>
        </form>

        <p class="login-link">Back to <a href="../login.php">Login</a></p>
    </div>
</body>
</html>
