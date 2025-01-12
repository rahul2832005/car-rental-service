<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/all.min.css">
  
  <!-- fontAWESOM LINK -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
 <style>
    /* styles.css */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.navbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: white;
  padding: 10px 20px;
  border-bottom: 1px solid #e0e0e0;
}

.logo {
  display: flex;
  align-items: center;
}

.logo-icon {
  width: 30px;
  height: 30px;
  margin-right: 10px;
}

.logo-text {
  font-size: 32px;
  font-weight: bold;
  color: black;
}

.nav-links {
  display: flex;
  gap: 25px;
}

.nav-links a {
  text-decoration: none;
  color: black;
  font-size: 16px;
}

.login-btn a {
  text-decoration: none;
  color: red;
  border: 1px solid red;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 18px;
  font-weight: bold;
  margin-left: 20px;
}

.login-btn a:hover {
    transition: all 0.7s;
  background-color: red;
  color: white;
}
#search{
    font-size: 22px;
    color:black;
}
#search:hover{
    cursor: pointer;
}
 </style> 
 <!-- Font Awesome -->
 <link rel="stylesheet" href="css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Carola Navbar</title>
</head>
<body>
  <header class="navbar">
    <div class="logo">
      <!--<img src="car-icon.png" alt="Car Logo" class="logo-icon">-->
      <span class="logo-text">Car<span style="color: red;">ola</span></span>
    </div>
    <nav class="nav-links">
      <a href="dis_car.php" class="active">Home</a>
      <a href="#">Car Fleet</a>
      <a href="#">Pages</a>
      <a href="#">News</a>
      <a href="#">Contact</a>
    </nav>
   
    <div class="login-btn">
      
    <i id="search" class="fa-solid fa-magnifying-glass"></i>
    <?php  if(!$_SESSION["alogin"])
     { ?>
      <a id="btn" href="login.php">Login/Register</a>
      <?php } else { ?>

      <a href="p2.php"><i  class="fa fa-user-circle"></i></a>

      <a id="btn" href="logout.php">logout</a>
      <?php } ?>
      

    </div>
  </header>

</body>
</html>
