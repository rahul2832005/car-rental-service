<?php 
     session_start();
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Understanding Insurance Terms</title>
    <style>
         @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }
        body {
            font-family: 'pop-regular';
            margin: 0;
            padding: 0;
            background-color: #f5f8fc;
            color: #333;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .h1 {
            font-size: 35px;
            margin-bottom: 20px;
            color: #000;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            text-align: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card .no {
            margin: 0;
            font-size: 30px;
            color: #ff4d4d;
        }

        .card .tc {
            font-size: 25px;
            color: #000;
            margin-top: 10px;
            margin-bottom: -3px;
        }

        .card .rule {
            font-size: 1rem;
            color: #2a2424;
            margin-top: 10px;
            line-height: 1.5;
        }

        .url {
            color: #2a2424;
            margin-top: 20px;
            font-size: 0.9rem;
            
        }
        #bg_img {
      width: 100%;
      margin-top: 5px;
    }

    .banner-text {
      position: absolute;
      top: 160px;
      color: #fff;
      padding: 10px;
      font-size: 45px;
      left: 35%;

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
      <h1>Terms</h1>
    </div>
  </div>
    <div class="container">
        <h1 class="h1">Terms & Condition</h1>
        <div class="grid">
            <div class="card">
                <h2 class="no">01</h2>
                <h3 class="tc">Eligibility Requirement</h3>
                <p class="rule">renter must be at least 18 years old.</p>
                <p class="rule">a valid driver's licience must be presented at the time of rental.</p>
            </div>
            <div class="card">
                <h2 class="no">02</h2>
                <h3 class="tc">Rental Period</h3>
                <p class="rule">the rental period begins at the time of vehicle pickup and ends when the vehicle is returned.</p>
                <p class="rule">late return may incur additional charges(calculated on a hourly basis).</p>
            </div>
            <div class="card">
                <h2 class="no">03</h2>
                <h3 class="tc">Payment and Deposits</h3>
                <p class="rule">a rental fee and a refundable security deposit are required at the time of booking/pickup.</p>
            </div>
            <div class="card">
                <h2 class="no">04</h2>
                <h3 class="tc">Vehicle Condition</h3>
                <p class="rule">the vehicle will be provided in good working condition and must be returned in the same condition.</p>
                <p class="rule">any damages will result in additional charges.</p>
            </div>
            <div class="card">
                <h2 class="no">05</h2>
                <h3 class="tc">Fual Policy</h3>
                <p class="rule">the vehicle will be provided with full tank of fuel and must be  returned with a full tank.</p>
            </div>
            <div class="card">
                <h2 class="no">06</h2>
                <h3 class="tc">Usage Restriction</h3>
                <p class="rule">the vehicle must only be used for lawful purposes.</p>
                <p class="rule">sub-renting,towing,racing or driving off-road is staticlly prohibitd.</p>
            </div>
            <div class="card">
                <h2 class="no">07</h2>
                <h3 class="tc">Cancellation and Refunds</h3>
                <p class="rule">Cancellation must be made at least 2 day prior to the rental period for a full refund.</p>
                <p class="rule">late Cancellation or no-shows may result in partial or no refund.</p>
            </div>
            <div class="card">
                <h2 class="no">08</h2>
                <h3 class="tc">Governing Law</h3>
                <p class="rule">these terms and condition are governed by the laws of <b><u>SAC 9966</u></b>.</p>
            </div>
        </div>
        
            <p class="url">www.carola.com</p>
    </div>
</body>
<?php
@include "footer.php";
?>
</html>