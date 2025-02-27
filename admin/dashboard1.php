<?php
session_start();

if (!$_SESSION['adlogin']) {
    header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Portal | Admin Panel</title>
    <link rel="stylesheet" href="css/dashstyle1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
                <li><a href="dashboard.php">Dashboard</a></li>
                <li>
                    <a href="#" id="br-drop">Brands <span class="down-icon">▶</span></a>
                    <ul class="dropdown" id="br-dropdown">
                        <li><a href="createbrand.php" target="second"><span class="ic"> <img src="icon/add12.png" alt="add brand"> </span> <span class="tx"> Add Brands </span></a></li>
                        <li><a href="managebrand.php" target="second"><span class="ic"> <img src="icon/manage.png" alt="Manage brand"> </span>  <span class="tx">Manage Brands</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="cr-drop">Cars <span class="down-icon2">▶</span></a>
                    <ul class="dropdown" id="cr-dropdown">
                        <li><a href="add_car.php" target="second"><span class="ic"> <img src="icon/addcar.png" alt="add car"> </span> <span class="tx"> Add Cars </span></a></li>
                        <!-- <li><a href="validationjs.php" target="second">Add Cars</a></li> -->
                        <li><a href="managecar.php" target="second"><span class="ic"> <img src="icon/managecar.png" alt="manage car"> </span> <span class="tx">Manage Cars </span> </a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" id="dr-drop">Driver <span class="down-icon4" style="margin-left:104px;">▶</span></a>
                    <ul class="dropdown" id="dr-dropdown">
                        <li><a href="add_driver.php" target="second"><span class="ic"> <img src="icon/adddriver.png" alt="add Driver"> </span> <span class="tx"> Add Driver </span> </a></li>
                        <!-- <li><a href="validationjs.php" target="second">Add Cars</a></li> -->
                        <li><a href="managedriver.php" target="second"><span class="ic"> <img src="icon/managedriver.png" alt="Manage Driver"> </span> <span class="tx"> Manage Drivers </span> </a></li>
                        <!-- <li><a href="managedriverbackup.php" target="second">Manage Drivers</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="#" id="bk-drop">Bookings <span class="down-icon3">▶</span></a>
                    <ul class="dropdown" id="bk-dropdown">
                        <li><a href="new-booking.php" target="second"><span class="ic"> <img src="icon/addred.png" alt="add"> </span> <span style="padding-left: 9px;">New Bookings</span></a></li>
                        <li><a href="confirmed-booking.php" target="second"><span class="ic"><img src="icon/checkgreen.png" alt=""></span> <span class="tx"> Confirmed Bookings</span></a></li>
                        <li><a href="canceled-booking.php" target="second"><span class="ic"><img src="icon/cross.png" alt=""></span> <span class="tx">Cancelled Bookings</span></a></li>
                        <li><a href="return-booking.php" target="second"><span class="ic"><img src="icon/undo.png" alt=""></span> <span style="padding-left: 12px;">Return Bookings</span></a></li>
                    </ul>
                    <!-- <ul class="dropdown" id="bk-dropdown">
                        <li><a href="new-booking.php" target="second">New Bookings</a></li>
                        <li><a href="confirmed-booking.php" target="second">Confirm Bookings</a></li>
                        <li><a href="canceled-booking.php" target="second">Cancelled Bookings</a></li>
                        <li><a href="return-booking.php" target="second">Return Bookings</a></li>
                    </ul> -->
                </li>
                <li><a href="brandsub.php" target="second">Manage Testimonials</a></li>
                <li><a href="manage_contactus_query.php" target="second">Manage Contact Us Query</a></li>
                <li><a href="reguser.php" target="second">Reg Users</a></li>
                <li><a href="#" target="second">Manage Pages</a></li>
                <li><a href="#" target="second">Update Contact Info</a></li>
                <li><a href="#" target="second">Manage Subscribers</a></li>
            </ul>


        </div>
    </div>
    <div>

        <iframe name="second" src="main.php" height="100%"></iframe>

    </div>

    <script>
        function toggleDropdown(triggerId, dropdownId) {
            const trigger = document.getElementById(triggerId);
            const dropdown = document.getElementById(dropdownId);

            trigger.addEventListener('click', () => {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            });
        }

        toggleDropdown('br-drop', 'br-dropdown');
        toggleDropdown('cr-drop', 'cr-dropdown');
        toggleDropdown('bk-drop', 'bk-dropdown');
        toggleDropdown('dr-drop', 'dr-dropdown');



        // for icon rotate brands
        document.getElementById("br-drop").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const icon = document.querySelector(".down-icon");
            icon.classList.toggle("rotate");
        });

        // for icon rotate cars
        document.getElementById("cr-drop").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const icon = document.querySelector(".down-icon2");
            icon.classList.toggle("rotate");
        });

        // for icon rotate bookings
        document.getElementById("bk-drop").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const icon = document.querySelector(".down-icon3");
            icon.classList.toggle("rotate");
        });

        document.getElementById("dr-drop").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the default anchor behavior
            const icon = document.querySelector(".down-icon4");
            icon.classList.toggle("rotate");
        });
    </script>

</body>

</html>