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
    <link rel="stylesheet" href="css/add_car_style.css">
</head>
<body>

<div class="sidebar1">
    <ul>
        <li>
            <a href="#" onclick="toggleMenu(this)">
                <i class="icon"></i> Cars
                <span class="toggle-icon">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="add_car.php" target="second">Add Car</a></li>
                <li><a href="managecar.php" target="second">Manage Cars</a></li>
            </ul>
        </li>
    </ul>
</div>

</body>
</html>