<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">

  <title>About Us</title>
  <style>
    /* styles.css */
    body {
      font-family: "Poppins", serif;
      margin: 0;
      padding: 0;
      color: #000;
    }

    .header {
      /* background-color: #f8f8f8; */
      text-align: center;
      padding: 20px;
      font-size: 2rem;
      font-weight: bold;
    }

    .hero {
      text-align: center;
      margin: 35px 0;
    }

    .hero-image {
      cursor: pointer;
      max-width: 100%;
      height: 470px;
    }

    .container {
     
      max-width: 800px;
      margin: 20px 10px;
      /* padding: 20px; */
    }

    .h1 {
      font-size: 35px;
      font-weight: bold;
      margin: 10px 0 20px;
      color: #000;
    }

    .section {
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
    }

    .icons {
      background-color: #ffe4e4;
      color: black;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 15px;
      margin-top: 6px;
      font-size: 25px;
      padding: 10px;
    }

    .icons img {
      width: 20px;
      height: 20px;
    }

    .content {
      max-width: 700px;
      line-height: 30px;
    }

    .content h3 {
      font-size: 25px;
      margin: 0;
      color: #000;
    }

    .content p {
      font-size: 16px;
      color: #666;
      margin: 5px 0 0;
    }

    .about {
      /* text-align: center; */
      padding: 20px;
    }

    .about h2 {
      font-size: 2.8rem;
      margin-bottom: 20px;
    }

    /* Section styling */
    .how-it-works {
      text-align: center;
      padding: 2rem 1rem;
      margin-bottom: 40px;
    }

    .header .tag {
      display: inline-block;
      padding: 0.3rem 0.6rem;
      font-size: 18px;
      background-color: #ffdddd;
      color: #ff4d4d;
      border-radius: 20px;
      margin-bottom: 0.5rem;
      text-transform: uppercase;
    }

    .header h1 {
      font-size: 3rem;
      font-weight: bold;
      margin: 0.5rem 0 2rem;
      color: #000;
    }

    /* Steps container */
    .steps {
      display: flex;
      justify-content: center;
      gap: 3rem;
      flex-wrap: wrap;
      
    }

    /* Individual step */
    .step {
      text-align: center;
      /* max-width: 150px; */
    }

    .step .icon {
      position: relative;
      width: 90px;
      height: 87px;
      margin: 0 auto;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #333;
    }

    .step .icon img {
      width: 45px;
      height: 45px;
      cursor: pointer;
    }

    .step .icon .number {
      position: absolute;
      top: -15px;
      left: -16px;
      width: 20px;
      height: 20px;
      /* background: #ff7755; */
      color: #fff;
      font-size: 26px;
      border-radius: 50%;
      display: flex;
      padding: 20px 17px;
      border: 3px solid white;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }

    .step .name {

      font-family: system-ui;
      margin-top: 1rem;
      font-size: 1.5rem;
      font-weight: 500;
      color: black;
    }

    #bg_img {
      width: 100%;
      margin-top: 5px;
    }

    .banner-text {
      position: absolute;
      top: 170px;
      color: #fff;
      padding: 10px;
      font-size: 45px;
      left: 29%;
    }
    .car 
    {
      display: flex;
    }
  </style>
</head>

<body>
  <?php
  @include "navbar.php";
  ?>
  <div class="banner-card">
    <img id="bg_img" src="image/our_team_bg1.png" alt="" srcset="">
    <div class="banner-text">
      <h1>About Us</h1>
    </div>
  </div>
  <div class="car">
    <section class="hero">
      <img src="image/about.png" alt="Red Car" class="hero-image">
    </section>
    <div class="container">
     
      <h1 class="h1" style="margin-top: 50px;">Planning A Trip Should Be Very <br>Exciting Adventure</h1>
      <div class="section">
        <div class="icons">
          <i class="fa-solid fa-earth-americas"></i>
        </div>
        <div class="content">
          <h3>All India Tours</h3>
          <p>Our team of travel professionals brings a wealth of knowledge and expertise to the
            table.</p>
        </div>
      </div>
      <div class="section">
        <div class="icons">
          <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="content">
          <h3>Multiple Options to Choose</h3>
          <p>Planning a trip should be an exciting adventure, not a stressful ordeal. Let us
            handle the logistics.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="how-it-works">
    <div class="header">
      <span class="tag">POPULAR CARS</span>
      <h1>How It Works</h1>
    </div>
    <div class="steps">
      <div class="step">
        <div class="icon" style="background-color:#F5A77E;">
          <span class="number" style="background-color:#F5A77E;">1</span>
          <img src="image/profile.svg" alt="User Icon">
        </div>
        <p class="name">Sign up Account</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color:#8462EF;">
          <span class="number" style="background-color:#8462EF;">2</span>
          <img src="image/search.svg" alt="Search Icon">
        </div>
        <p class="name">Search your Vehicle</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color: #84DDB1;">
          <span class="number" style="background-color: #84DDB1;">3</span>
          <img src="image/coin.svg" alt="Payment Icon">
        </div>
        <p class="name">Pay the Car Rent</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color:#F8CB76;">
          <span class="number" style="background-color:#F8CB76;">4</span>
          <img src="image/car.svg" alt="Car Icon">
        </div>
        <p class="name">Take Car to Road</p>
      </div>
    </div>
  </div>
</body>
<?php
@include "footer.php";
?>

</html>