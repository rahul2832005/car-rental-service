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
       <div>
        <?php include('navbar.php');?>
       </div>
    <div class="sidebar">


        <!-- Profile Section -->
        <div class="profile">
            <h2>Car Rental Portal</h2>

        </div>

        <!-- Menu Section -->
        <div class="sidebar">
            <ul class="menu">
                <li><a href="main.php" target="second">Dashboard</a></li>
                <li>
                <a href="#" id="br-drop">Brands ▼</a>
                <ul class="dropdown" id="br-dropdown">
                    <li><a href="createbrand.php" target="second">Add Brands</a></li>
                    <li><a href="managebrand.php" target="second">Manage Brands</a></li>
                </ul>
            </li>
            <li>
                <a href="#" id="cr-drop">Cars ▼</a>
                <ul class="dropdown" id="cr-dropdown">
                    <li><a href="add_car.php" target="second">Add Cars</a></li>
                    <li><a href="managecar.php" target="second">Manage Cars</a></li>
                </ul>
            </li>
            <li>
                <a href="#" id="bk-drop">Bookings ▼</a>
                <ul class="dropdown" id="bk-dropdown">
                    <li><a href="new_booking.php" target="second">New Bookings</a></li>
                    <li><a href="confirmed-bookings.php" target="second">Confirm Bookings</a></li>
                    <li><a href="canceled-bookings.php" target="second">Cancelled Bookings</a></li>
                </ul>
            </li>
                <li><a href="brandsub.php" target="second">Manage Testimonials</a></li>
                <li><a href="#" target="second">Manage Contactus Query</a></li>
                <li><a href="reguser.php" target="second">Reg Users</a></li>
                <li><a href="#" target="second">Manage Pages</a></li>
                <li><a href="#" target="second">Update Contact Info</a></li>
                <li><a href="#" target="second">Manage Subscribers</a></li>
            </ul>


        </div>
    </div>
    <div>

        <iframe name="second" src="main.php" height="100%" 
        
        ></iframe>

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
    </script>
    
</body>

</html>