
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Landing Page</title>
    <link href="aos.css" rel="stylesheet">
    <style>
        /* styles.css */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            width: 100%;
        }

        .hero-section {
            margin-top: 2px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
            background: linear-gradient(to top, #e6f0f8, #ffffff);
            background-image: url('image/ad_bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .content1 {
            max-width: 50%;
        }

        .tagline {
            font-size: 14px;
            font-weight: bold;
            color: #ff6b6b;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            display: inline-block;
            background:rgb(208, 176, 176);
            padding: 5px 10px;
            border-radius: 5px;
            animation-name:tag;
            animation-duration: 2s;
            
        }

        #h1 {
            font-size: 3rem;
            line-height: 1.2;
            color: #000;
            margin: 0 0 20px;
            
            
        }

        #p1 {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 30px;
            
           
        }

        #cta-button {
            display: inline-block;
            background-color: #000;
            color: #fff;
            padding: 10px 25px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        #cta-button:hover {
            background-color: #333;
        }

        .car-image {
            max-width: 50%;
            /* border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); */
        }

        .car-image img {
            height: 75%;
            margin-top: 70px;
            width: 115%;
            margin-left: -40px;
            animation-name: car;
            animation-duration: 2s;
        }
        .border{
            background-color: #e6f0f8;
            width: 386px;
            height: 476px;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                padding: 30px;
            }

            .content {
                max-width: 100%;
                margin-bottom: 20px;
            }

            .car-image {
                max-width: 100%;
            }
        }
       
    </style>
</head>

<body>
    <div class="hero-section">
        <div class="content1">
        <div data-aos="fade-down" data-aos-duration="2000">
            <span class="tagline">CAR RENTAL</span>
            </div>
            <div data-aos="fade-up" data-aos-duration="2000">
            <h1 id="h1">Find Affordable  Dream Cars for Rental</h1>
            <p id="p1">
                Fulfill your automotive fantasies without breaking the bank. Check our affordable car
                rentals for an opulent yet economical ride.
            </p>
            <a href="#" id="cta-button">Get in Touch</a>
            </div>
        </div>
        <div data-aos="fade-left" data-aos-duration="2500">
        <div class="car-image">
           <div class="border">
            <img src="image/ad_car.png" alt="Luxury car"></div>
        </div>
        </div>
    </div>
</body>
<script src="aos.js"></script>
<script>
  AOS.init();
</script>
</html>