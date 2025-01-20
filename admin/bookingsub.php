<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    
    <script>
        // Function to toggle submenu visibility
        function toggleMenu(element) {
            const parentLi = element.closest('li');
            parentLi.classList.toggle('active');

        }
        
        
    </script>
    <link rel="stylesheet" href="css/dropdown.css">
</head>
<body>

<div class="sidebar1">
    <ul>
        <li>
            <a href="#" onclick="toggleMenu(this)">
                <i class="icon"></i> Booking
                <span class="toggle-icon">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="new_booking.php" target="second">New Booking</a></li>
                <li><a href="confirmed-bookings.php" target="second">Confirm Booking</a></li>
                <li><a href="canceled-bookings.php" target="second">Cancelled Booking</a></li>
            </ul>
        </li>
    </ul>
</div>

</body>
</html>