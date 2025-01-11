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
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .header {
            background-color: #f8f8f8;
            text-align: center;
            padding: 20px;
            font-size: 2rem;
            font-weight: bold;
        }

        .hero {
            text-align: center;
            margin: 50px 0;
        }

        .hero-image {
            cursor: pointer;
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 800px;
            margin: 20px 10px;
            /* padding: 20px; */
        }

        .brand-tag {
            display: inline-block;
            background-color: #ffe4e4;
            color: #f24b4b;
            font-size: 18px;
            font-weight: bold;
            padding: 4px 10px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .h1 {
            font-size: 40px;
            font-weight: bold;
            margin: 10px 0 20px;
            color: #000;
        }

        .section {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .icon {
            background-color: #ffe4e4;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            margin-top: 6px;
            font-size: 25px;
        }

        .icon img {
            width: 20px;
            height: 20px;
        }

        .content {
            max-width: 700px;
            line-height: 30px;
        }

        .content h3 {
            font-size: 20px;
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

        .how-it-works {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
        }

        .how-it-works h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .steps {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .step {
            text-align: center;
            width: 100px;
        }

        .step-number {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: #ff6f61;
            color: white;
            border-radius: 50%;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .step p {
            font-size: 0.9rem;
        }

        #bg_img {
            width: 100%;
            margin-top: 5px;
        }

        .banner-text {
            position: absolute;
            top: 70px;
            color: #fff;
            padding: 10px;
            font-size: 45px;
            left: 28%;

        }
    </style>
</head>

<body>
    <div class="banner-card">
        <img id="bg_img" src="image/our_team_bg1.png" alt="" srcset="">
        <div class="banner-text">
            <h1>About Us</h1>
        </div>
        <section class="hero">
            <img src="image/about.png" alt="Red Car" class="hero-image">
        </section>
        <div class="container">
            <div class="brand-tag">BRANDS</div>
            <h1 class="h1">Planning A Trip Should Be Very <br>Exciting Adventure</h1>
            <div class="section">
                <div class="icon">
                    <i class="fa-solid fa-earth-americas"></i>
                </div>
                <div class="content">
                    <h3>All India Tours</h3>
                    <p>Our team of travel professionals brings a wealth of knowledge and expertise to the
                        table.</p>
                </div>
            </div>
            <div class="section">
                <div class="icon">
                <i class="fa-solid fa-layer-group"></i>
                </div>
                <div class="content">
                    <h3>Multiple Options to Choose</h3>
                    <p>Planning a trip should be an exciting adventure, not a stressful ordeal. Let us
                        handle the logistics.</p>
                </div>
            </div>
        </div>

        <section class="how-it-works">
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <span class="step-number">1</span>
                    <p>Sign up Account</p>
                </div>
                <div class="step">
                    <span class="step-number">2</span>
                    <p>Search your Vehicle</p>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <p>Pay the Car Rent</p>
                </div>
                <div class="step">
                    <span class="step-number">4</span>
                    <p>Take Car to Road</p>
                </div>
            </div>
        </section>
</body>

</html>