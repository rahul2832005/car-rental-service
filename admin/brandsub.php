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
                <i class="icon"></i> Brands
                <span class="toggle-icon">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="createbrand.php" target="second">Create Brand</a></li>
                <li><a href="managebrand.php" target="second">Manage Brands</a></li>
            </ul>
        </li>
    </ul>
</div>

</body>
</html>