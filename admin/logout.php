<?php
session_start();
session_destroy(); // Logout karne ke liye session destroy kar rahe hain

echo "<script>
    if(window.top !== window.self) { 
        window.top.location.href = 'admin_login.php'; // Parent page ko redirect karega
    } else {
        window.location.href = 'admin_login.php'; // Normal redirect karega agar iframe nahi hai
    }
</script>";
exit();
?>
