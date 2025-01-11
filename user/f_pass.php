<?php
// error_reporting(0);
session_start(); 
$er=$op=$email=$opass="";
$conn=mysqli_connect('localhost','root','','car_rent');
if(!$conn)
{
    echo "Not Conect";
}

if(isset($_POST['reset']))
{
    $count=0;
   
    $opass=$_POST['old_pass'];
    $email=$_POST['email'];
    if($opass=="")
    {
        $op="Enter Old Password";
        $count++;
    }

    if($email=="")
    {   
        $er="Enter email ";
        $count++;
    }
    else
    {
        $ex1='/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-z]/';
        if(!preg_match($ex1,$email))
        {
            $er="Enter Valid Email Address !";
            $count++;
        }
    }
    
    $query="select * from reguser where email='$email' && password='$opass'";
    $exquery=mysqli_query($conn,$query);
    $row=mysqli_num_rows($exquery);
    if($row>0)
    {
        $query1="select * from reguser  where email='$email'";
        $result=mysqli_query($conn,$query1);
        $show=mysqli_fetch_assoc($result);
 
        $email1=$show['email'];
        $_SESSION['mailcheck']=$email1;
       header("location:f_pass2.php");
    }
    elseif($count==0 && $row!=1)
    {
        echo "<script>alert('Some Error Occur!');</script>";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 40px;
    border-radius: 8px;
    width: 360px;
}

h2 {
    margin-bottom: 20px;
    color: #333333;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

input[type="email"] {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #cccccc;
    border-radius: 4px;
}

button {
    padding: 10px;
    font-size: 16px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="forgot-password-box">
            <h2>Forgot Your Password?</h2>
            <form action="" method="post">
            <input type="text" name="email" placeholder="Enter your email" value="<?php echo $email; ?>">
           <p style="color: red;"><?php echo $er; ?></p>
                <input type="text" name="old_pass" placeholder="Enter your Old Password" value="<?php echo $opass;?>" >
                <p style="color: red;"><?php  echo $op; ?></p>
          
                <button type="submit"name="reset">Reset Password</button>
              
                  
             

            </form>
        </div>
    </div>
    
</body>
</html>
