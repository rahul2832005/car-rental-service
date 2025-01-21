
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Image Showcase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .image-showcase {
            display: flex;
            gap: 5px;
            
            background-color: red;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            align-items: center;
        }

        .main-image img {
            width: 600px;
            height: auto;
            border-radius: 10px;
            
        }

        .side-images {
            display: flex;
            flex-direction: column;
            gap: 10px;
           
        }

        .side-images img {
            width: 290px;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
        }
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}


.car-details {
    background-color:red;
    border-radius: 8px;
    width: 100%;
    padding: 20px;
    margin-top: 25px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.car-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.car-country {
    font-size: 14px;
    color: #555;
}

.car-rating {
    font-size: 16px;
    color: #FFD700;
}

.car-title {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

.car-info {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 20px;
}

.car-info-item {
  
    
    align-items: center;
    display: flex;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
}

.car-info-item img {
    width: 40px;
    height: 40px;
    margin-bottom: 8px;
    background-color: #f4f4f4;
}

.car-info-item span {
    font-size: 14px;
    color: #555;
    display: flex;
    flex-direction: column;
}
.container{
    max-width: 950px;
    margin: 0 auto;
    padding: 20px;
    
   
    
    color: black;
    background-color: red;
}

    </style>
</head>
<body>
    <div class="container">
    <div class="image-showcase">
        <div class="main-image">
            <img src="a.jpeg" alt="Red Sports Car">
        </div>
        <div class="side-images">
            <img src="b.jpeg" alt="Car Interior Front">
            <img src="c.jpeg" alt="Car Interior Back">
        </div>
    </div>
    <div class="car-details">
       
       <h1 class="car-title">Tesla Model 3 Roadstar</h1>
       <div class="car-info">
           <div class="car-info-item">
               <img src="capacity.png" alt="Seat Capacity Icon">
               <span>Total People</span>
               <span>4 People</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Doors Icon">
               <span>4 Doors</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Fuel Tank Icon">
               <span>450 Liters</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Fuel Type Icon">
               <span>Petrol</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Mileage Icon">
               <span>12 Kmpl</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Engine Type Icon">
               <span>Automatic</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Brake Type Icon">
               <span>Hydraulic</span>
           </div>
           <div class="car-info-item">
               <img src="capacity.png" alt="Engine Power Icon">
               <span>400 HP</span>
           </div>
       </div>
   </div>
   </div>
</body>
</html>
