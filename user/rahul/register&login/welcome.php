<?php
session_start();
?>
<html>
    <body>
        <form method="post">
        <h1>welcome  <?php echo $_SESSION["email"];?></h1>
</form>
</body>
    </html>