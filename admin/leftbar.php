    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/dashstyle.css">
    </head>
    <body>
            <!-- Sidebar -->
            <aside class="sidebar">
            <h2>Car Rental Portal</h2>
            <ul class="menu">
                <li><a href="main.php" target="second">Dashboard</a></li>
                <?php include ('brandsub.php') ?>
                <?php include ('vehiclesub.php') ?>
                <?php include ('bookingsub.php') ?>
                <li><a href="#">Manage Testimonials</a></li>
                <li><a href="#">Manage Contactus Query</a></li>
                <li><a href="#">Reg Users</a></li>
                <li><a href="#">Manage Pages</a></li>
                <li><a href="#">Update Contact Info</a></li>
                <li><a href="#">Manage Subscribers</a></li>
            </ul>
        </aside>

    </body>
    </html>
       
      