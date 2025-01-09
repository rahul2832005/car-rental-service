
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* styles.css */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
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

        .about {
            /* text-align: center; */
            padding: 20px;
        }

        .about h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            /* justify-content: center; */
             /* gap: 30px;  */
            margin-top: 20px;
        }

        .feature {
            /* width: 300px; */
            text-align: left;
        }

        .feature h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
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
    <section class="about">
        <h2>Planning A Trip Should Be Very <br>Exciting Adventure</h2>
        <div class="features">
            <div class="feature">
                <h3>International Tours</h3>
                <p>Our team of travel professionals brings a wealth of knowledge and expertise to
                    the table.</p>
            </div>
            <!-- <div class="feature">
                <h3>Multiple Options to Choose</h3>
                <p>Planning a trip should be an exciting adventure, not a stressful ordeal. Let us
                    handle the logistics.</p>
            </div> -->
        </div>
    </section>
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