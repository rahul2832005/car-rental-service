<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>How It Works</title>
  <link rel="stylesheet" href="styles.css">


  <style>
    /* General resets */
body {
  margin: 0;
  font-family: 'Arial', sans-serif;
  background-color: #fff;
  color: #333;
}

/* Section styling */
.how-it-works {
  text-align: center;
  padding: 2rem 1rem;
}

.header .tag {
  display: inline-block;
  padding: 0.3rem 0.6rem;
  font-size: 0.8rem;
  color: #fff;
  background-color: #FFC5D2;
  border-radius: 20px;
  margin-bottom: 0.5rem;
  text-transform: uppercase;
}

.header h1 {
  font-size: 2rem;
  font-weight: bold;
  margin: 0.5rem 0 2rem;
  color: #333;
}

/* Steps container */
.steps {
  display: flex;
  justify-content: center;
  gap: 2rem;
  flex-wrap: wrap;
}

/* Individual step */
.step {
  text-align: center;
  max-width: 150px;
}

.step .icon {
  position: relative;
  width: 80px;
  height: 80px;
  margin: 0 auto;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #333;
}

.step .icon img {
  width: 40px;
  height: 40px;
}

.step .icon .number {
  position: absolute;
    top: -15px;
    left: -16px;
    width: 20px;
    height: 20px;
    background: #ff7755;
    color: #fff;
    font-size: 26px;
    border-radius: 50%;
    display: flex;
    padding: 10px 10px;
    border: 3px solid white;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.step p {
  margin-top: 0.5rem;
  font-size: 1rem;
  font-weight: 500;
}
  </style>
</head>
<body>
  <div class="how-it-works">
    <div class="header">
      <span class="tag">POPULAR CARS</span>
      <h1>How It Works</h1>
    </div>
    <div class="steps">
      <div class="step">
        <div class="icon" style="background-color: #F9C9B6;">
          <span class="number">1</span>
          <img src="image/profile.svg" alt="User Icon">
        </div>
        <p>Sign up Account</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color: #B8A8F1;">
          <span class="number">2</span>
          <img src="image/download (1).svg" alt="Search Icon">
        </div>
        <p>Search your Vehicle</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color: #9CE5C8;">
          <span class="number">3</span>
          <img src="image/download (2).png" alt="Payment Icon">
        </div>
        <p>Pay the Car Rent</p>
      </div>
      <div class="step">
        <div class="icon" style="background-color: #FBE3A5;">
          <span class="number">4</span>
          <img src="image/download.png" alt="Car Icon">
        </div>
        <p>Take Car to Road</p>
      </div>
    </div>
  </div>
</body>
</html>