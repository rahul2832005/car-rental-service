<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Image Gallery</title>
    <style>
        /* General Reset */
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}
body {
font-family: Arial, sans-serif;
background-color: #f8f8f8;
display: flex;
/*justify-content: center;*/
/*align-items: center;*/
min-height: 100vh;
}
.gallery {
width: 90%;
max-width: 900px;
margin-left: 25px;
margin-top: 25px;
/*text-align: center;*/
}
/* Main Image Styling */
.main-image img {
width: 64%;
height: 455px;
border: 2px solid #ddd;
border-radius: 10px;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}
/* Thumbnail Images Styling */
.thumbnails {
display: flex;
/*justify-content: center;*/
margin-top: 20px;
gap: 10px;
}
.thumb img {
width: 185px;
height: 165px;
border: 2px solid #ddd;
border-radius: 5px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
cursor: pointer;
transition: transform 0.3s ease-in-out, border 0.3s ease;
}
/*.thumb img:hover {
transform: scale(1.1);
border: 2px solid #ff0000;
}*/
    </style>
</head>

<body>
    <div class="gallery">
        <!-- Main Image -->
        <div class="main-image">
            <img src="image/wp10875074.jpg" alt="Red Classic Car">
        </div>
        <!-- Thumbnail Images -->
        <div class="thumbnails">
            <div class="thumb">
                <img src="image/wp10875074.jpg" alt="Rear View">
            </div>
            <div class="thumb">
                <img src="image/wp10875074.jpg" alt="Side View">
            </div>
            <div class="thumb">
                <img src="image/wp10875074.jpg" alt="Back View">
            </div>
        </div>
    </div>
    <div class="content">
        <h1>welcome</h1>
    </div>
    
</body>

</html>