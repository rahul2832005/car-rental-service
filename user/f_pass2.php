<?php
// error_reporting(0);
$er=$op=$email=$opass=$newp=$conp="";
session_start(); 
if(!$_SESSION['mailcheck'])
{
    header("location:f_pass.php");
}
@include "include/config.php";
if(!$conn)
{
    echo "Not Conect";
}

if(isset($_POST['reset']))
{
    $count=0;
    $newp=$_POST['new_pass'];
    $conp=$_POST['con_pass'];
    $email=$_SESSION['mailcheck'];
    if($newp=="")
    {
        $op="Enter new Password";
        $count++;
    }

    if($conp=="")
    {   
        $er="Enter confirm password ";
        $count++;
    }
    elseif($newp!=$conp)
    {
        $er="Password Not Match";
        $count++;
    }

    if($count==0)
    {
    $query="update reguser set password='$newp' where email='$email'";
    $exquery=mysqli_query($conn,$query);
    if($exquery)
    {
        echo "<script>alert('Password Change Done')</script>";
    }
 
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
            <input type="text" name="new_pass" placeholder="Enter new pass" value="<?php echo $newp; ?>" >
            <p style="color: red;"><?php echo $op;?></p>
           
                <input type="text" name="con_pass" placeholder="Enter confirm  Password" value="<?php echo $conp; ?>" >
                <p style="color: red;"><?php echo $er;?></p>
                <button type="submit"name="reset">Reset Password</button>
            </form>
        </div>
    </div>
    
</body>
</html>
