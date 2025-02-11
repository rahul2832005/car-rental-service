<?php
@include "include/config.php";

$bid=$_GET['bid'];

$sql="select * from brands where bid=$bid";
$exsql=mysqli_query($conn,$sql);

$result=mysqli_fetch_assoc($exsql);
if(isset($_POST['add']))
{
    
    $bname=$_POST['brand-name'];
    if($bname!="")
    {
    $query="update brands set  bname='$bname' where  bid=$bid";
    $exquery=mysqli_query($conn,$query);
    if($exquery)
    {
        echo "<script>alert('Update Brand')</script>";
        header("Location:managebrand.php");
    }
    else
    {
        echo "<script>alert(' not Update  BBrand')</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brand</title>
    <link rel="stylesheet" href="css/createbrand.css">
</head>
<body>
    <div class="container">
        <h1>Update Brand</h1>
        <div class="card">
            <div class="card-header">
            Update BRAND
            </div>
            <div class="card-body">
                <?php if (isset($_POST['add']) && !empty($_POST['brand-name'])): ?>
                    <div class="alert success">
                        <strong>SUCCESS:</strong> Brand Update successfully
                    </div>
                
                    
                <?php  endif; ?>
                <?php if (isset($_POST['add']) && empty($_POST['brand-name'])): ?>
                    <div class="danger">
                        <strong>FAIL:</strong> Brand not Update successfully
                    </div>
                <?php  endif; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="brand-name">Brand Name</label>
                        <input type="text" id="brand-name" name="brand-name" placeholder="Enter brand name" value="<?php echo $result['bname'];  ?>" >
                    </div>
                    <button type="submit" class="btn" name="add">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>