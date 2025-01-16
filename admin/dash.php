<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
      display: flex;
        
      }
      .f1{
        width:800px;
      }
    </style>
</head>
<body>
<div class="container">
        
        <div>
            <?php include("leftbar.php"); ?>
        </div> 
        <div class="main">
            <!-- Main Content -->
            <iframe src="main.php"  name="second" width="100%" height="600px" class="f1">  </iframe>
        </div>
        </div>  
        
</body>
</html>