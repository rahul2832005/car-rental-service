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
    <div class="sidebar">


        <!-- Profile Section -->
        <div class="profile">
            <h2>Car Rental Portal</h2>

        </div>

        <!-- Menu Section -->
        <div class="sidebar">
            <ul class="menu">
                <li><a href="main.php" target="second">Dashboard</a></li>
                <li id="br-drop">
                    <a href="#">Brands<span class="sub-icon">▼</span></a>
                    <ul class="dropdown">
                        <li><a href="createbrand.php" target="second">Add Brands</a></li>
                        <li><a href="managebrand.php" target="second">Manage Brands</a></li>

                    </ul>

                </li>
                <li id="cr-drop">
                    <a href="#">Cars<span class="sub-icon">▼</span></a>
                    <ul class="dropdown-cr">
                        <li><a href="add_car.php" target="second">Add Cars</a></li>
                        <li><a href="managecar.php" target="second">Manage Cars</a></li>

                    </ul>

                </li>
                <li id="bk-drop">
                    <a href="#">Bookings<span class="sub-icon">▼</span></a>
                    <ul class="dropdown-bk">
                        <li><a href="new-booking.php" target="second">New Bookings</a></li>
                        <li><a href="confirmed-booking.php" target="second"> Confirm Bookings</a></li>
                        <li><a href="canceled-booking.php" target="second">Cancelled Bookings </a></li>

                    </ul>

                </li>
                <li><a href="#" target="second">Manage Testimonials</a></li>
                <li><a href="#" target="second">Manage Contactus Query</a></li>
                <li><a href="reguser.php" target="second">Reg Users</a></li>
                <li><a href="#" target="second">Manage Pages</a></li>
                <li><a href="#" target="second">Update Contact Info</a></li>
                <li><a href="#" target="second">Manage Subscribers</a></li>
            </ul>


        </div>
    </div>
    <div>

        <iframe name="second" src="main.php" height="100%" width="100%"></iframe>

    </div>
    <script>
        document.getElementById("br-drop").addEventListener('click', function() {
            document.querySelector(".dropdown").style.display = "block";
        })
        document.getElementById("br-drop").addEventListener('dblclick', function() {
            document.querySelector(".dropdown").style.display = "none";
        })


        document.getElementById("cr-drop").addEventListener('click', function() {
            document.querySelector(".dropdown-cr").style.display = "block";
        })


        document.getElementById("cr-drop").addEventListener('dblclick', function() {
            document.querySelector(".dropdown-cr").style.display = "none";
        })

        document.getElementById("bk-drop").addEventListener('click', function() {
            document.querySelector(".dropdown-bk").style.display = "block";
        })


        document.getElementById("bk-drop").addEventListener('dblclick', function() {
            document.querySelector(".dropdown-bk").style.display = "none";
        })
    </script>
</body>

</html>