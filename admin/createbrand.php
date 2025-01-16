<?php
$conn=mysqli_connect("localhost","root","","car_rent");

if(!$conn)
{
	echo "not connect";

}

if(isset($_POST['add']))
{
    
    $bname=$_POST['brand-name'];
    if($bname!="")
    {
    $query="insert into brands(bname)values('$bname');";
    $exquery=mysqli_query($conn,$query);
    if($exquery)
    {
        echo "<script>alert('inserted')</script>";
    }
    else
    {
        echo "<script>alert(' not inserted')</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Brand</title>
    <link rel="stylesheet" href="css/createbrand.css">
</head>
<body>
    <div class="container">
        <h1>Create Brand</h1>
        <div class="card">
            <div class="card-header">
                CREATE BRAND
            </div>
            <div class="card-body">
                <?php if (isset($_POST['add']) && !empty($_POST['brand-name'])): ?>
                    <div class="alert success">
                        <strong>SUCCESS:</strong> Brand Created successfully
                    </div>
                
                    
                <?php  endif; ?>
                <?php if (isset($_POST['add']) && empty($_POST['brand-name'])): ?>
                    <div class="danger">
                        <strong>FAIL:</strong> Brand not Created successfully
                    </div>
                <?php  endif; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="brand-name">Brand Name</label>
                        <input type="text" id="brand-name" name="brand-name" placeholder="Enter brand name" >
                    </div>
                    <button type="submit" class="btn" name="add">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>