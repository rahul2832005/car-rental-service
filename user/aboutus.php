<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container1 {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

p {
    font-size: 1.2em;
    color: #666;
    margin-bottom: 40px;
}

.steps {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.step {
    flex: 1;
    max-width: 300px;
    margin: 10px;
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.icon img {
    width: 80px;
    height: 80px;
    
    border-style: dotted;


}

.step h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.step p {
    font-size: 1em;
    color: #666;
}
.i1{
    background: red;
    border-radius: 50px;
}
.i2{
    background: orange;
    border-radius: 50px;
}


.i3{
    background: black;
    border-radius: 50px;
}
.container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .feature {
            flex: 1;
            min-width: 250px;
            max-width: 350px;
            margin: 10px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .feature:hover {
            background-color: black;
            color: white;
        }

        .feature:hover .icon1 {
            background-color: white;
        }
        .feature:hover .icon1 img {
            background-color: black;
        }
        .feature:hover p {
            color: white;
        }
        .icon1 {
            background-color: black;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .icon img {
            width: 40px;
            height: 40px;
        }

        .feature h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 1em;
            color: #666;
        }

    </style>
</head>
<body>
    <div class="container1">
        <h1>How It Works</h1>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <div class="steps">
            <div class="step">
                <div class="icon">
                    <img class="i1" src="image/services-icon-01.svg" alt="Choose Locations">
                </div>
                <h2>1. Choose Locations</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="step">
                <div class="icon">
                    <img  class="i2" src="image/services-icon-02.svg" alt="Pick-Up Locations">
                </div>
                <h2>2. Pick-Up Locations</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <div class="step">
                <div class="icon">
                    <img  class="i3" src="image/services-icon-03.svg" alt="Book your Car">
                </div>
                <h2>3. Book your Car</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Why Choose Us</h1>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <div class="features">
            <div class="feature">
                <div class="icon1">
                    <img src="image/bx-selection.svg" alt="Easy & Fast Booking">
                </div>
                <h2>Easy & Fast Booking</h2>
                <p>Completely carinate e business testing process whereas fully researched customer service. Globally extensive content with quality.</p>
            </div>
            <div class="feature">
                <div class="icon1">
                    <img src="image/bx-crown.svg" alt="Many Pickup Location">
                </div>
                <h2>Many Pickup Location</h2>
                <p>Enthusiastically magnetic initiatives with cross-platform sources. Dynamically target testing procedures through effective.</p>
            </div>
            <div class="feature">
                <div class="icon1">
                    <img src="image/bx-user-check.svg" alt="Customer Satisfaction">
                </div>
                <h2>Customer Satisfaction</h2>
                <p>Globally user centric method interactive. Seamlessly revolutionize unique portals corporate collaboration.</p>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script>
        document.querySelectorAll('.step').forEach(step => {
    step.addEventListener('click', () => {
        step.classList.toggle('active');
    });
});
    </script>
</body>
</html>