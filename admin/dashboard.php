<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Portal | Admin Panel</title>
    <link rel="stylesheet" href="css/dashstyle.css">
    <style>
      
    </style>
</head>

<body>
    <header>
<iframe name="navbar" src="navbar.php"  height="20%" width="100%"></iframe>
</header>  
<!-- Sidebar -->
         <aside class="sidebar">
            <h2>Car Rental Portal</h2>
            <ul class="menu">
                <li><a href="main.php" target="second">Dashboard</a></li>
                <?php include ('brandsub.php') ?>
                <?php include ('vehiclesub.php') ?>
                <?php include ('bookingsub.php') ?>
                <li><a href="brandsub.php" target="second">Manage Testimonials</a></li>
                <li><a href="#" target="second">Manage Contactus Query</a></li>
                <li><a href="#" target="second">Reg Users</a></li>
                <li><a href="#" target="second">Manage Pages</a></li>
                <li><a href="#" target="second">Update Contact Info</a></li>
                <li><a href="#" target="second">Manage Subscribers</a></li>
            </ul>
        </aside>
    <div>
      
      <iframe name="second" src="main.php"  height="100%" width="100%"></iframe>
   
    </div>            
</body>
</html>