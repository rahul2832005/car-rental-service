<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #fff;
        }
        .img_container{
            margin: 100px 0 0 150px;
            width: 70%;
            height: 450px;
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 50px;
            margin-left: 20px
        }
        .img_container #img{
            width: 20%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all ease-in-out 0.5s;
        }
        .img_container #img:hover{
            width: 45%;

        }
    </style>
</head>

<body>
    <div class="img_container">
        <img id="img" src="image/slider5.jpg" alt="" srcset="">
        <img id="img" src="image/slider2.jpg" alt="" srcset="">
        <img id="img" src="image/slider3.jpg" alt="" srcset="">
        <img id="img" src="image/slider4.jpg" alt="" srcset="">
        <img id="img" src="image/slider5.jpg" alt="" srcset="">
    </div>
</body>

</html>
