<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
       /* margin: 0;
        padding: 0;*/
        background-color: #f4f4f4;
        justify-content: center;
        align-items: center;
    }
    img{
        width: 1110px;
        margin-top: -100px;
    }
    .banner-text{
        position: absolute;
        top: 18%;
        color: #fff;
        padding: 10px;
        font-size: 45px;
        left: 37%;
    }
    .banner-card{
        margin-bottom: 100px;
    }

    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        min-width: 100vh;
        margin-bottom: 30px;
    }
    .card{
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin: 20px;
        text-align: center;
        width: 220px;
    }
    .icon{
        display: inline-block;
        background-color: #ff4d4d;
        color: #fff;
        border-radius: 10px;
        padding: 15px;
        font-size: 65px;
        position: relative;
        top: 0;
        left: 80px; 
        transform: translate(-75%,-75%);
        margin-bottom: -25px;
    }
    .title{
        margin-top: -25px;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .details{
        font-size: 1rem;
        color: #666;
    }
    i{
        margin: 9px;
    }
    .header{
        margin-bottom: 100px;
        text-align: center;
    }
    .header button {
            background-color: #e0e0e0;
            border: none;
            border-radius: 50px;
            padding: 8px 16px;
            margin-top: 10px;
            cursor: pointer;
            color: red;
            font-size: 17px;
        }
</style>

<body>
    <div class="banner-card">
        <img src="image/tesla_roadster_01.jpg" alt="" srcset="">
        <div class="banner-text">
            <h1>Contact</h1>
        </div>
    </div>
<div class="header">
        <button>CONTACT DETAILS</button>
        <h1>Contact Informations</h1>

    </div>

    <div class="container">
        <div class="card">
            <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
            <h2 class="title">Our Location</h2>
            <p class="details">bhambhan road,botad-36410</p>
        </div>

        <div class="card">
            <div class="icon"><i class="fa-regular fa-envelope-open"></i></div>
            <h2 class="title">Email Address</h2>
            <p class="details">rahulbavaliya153@gmail.com</p>
        </div>

        <div class="card">
            <div class="icon"><i class="fa-solid fa-phone"></i></div>
            <h2 class="title">Contact No</h2>
            <p class="details">+91 9824930580</p>
        </div>
    </div>
</body>

</html>