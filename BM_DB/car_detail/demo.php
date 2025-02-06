<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Booking</title>
    <link rel="stylesheet" href="h4.css">
    <link rel="stylesheet" href="all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
    font-family: sans-serif;
    margin: 0;
    background-color: #f0f0f0; /* Light gray background */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow-x: hidden;
}

.page-container {
    display: flex;
    justify-content: center;
    align-items: flex-start; 
    position: sticky;
    /* Align to top for tall content */
    /* width: 100%; */
    overflow-y: auto;
}

.container {
            display: flex;
            width: 1000px; /* Increased max-width */
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 20px; /* Add margin for spacing */
        }
.car-image {
            width: 520px;
            flex: 1;
            position: relative;
            margin: 10px 10px;
            max-height: 600px; /* Set a max height */
            overflow-y: auto; /* Enable vertical scrolling */
            overflow-x: hidden; /* Hide horizontal scrollbar if any */
        }


.car-image img {
    border-radius: 5px;
    width: 100%;
    height: 450px;
    display: block;
}

.image-slider {
    margin-top: 10px;
    /* position: absolute; */
    bottom: 20px;
    left: 20px;
    display: flex;
    margin-right: -10px;
}

.image-slider img {
    width: 140px;
    height: 115px;
    margin-right: 10px;
    border-radius: 6px;
    cursor: pointer;
    border: 2px solid white;
}

/* .image-slider img:hover {
    border-color: gold;
} */

.form-container {
            max-width: 315px;
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            background-color: wheat;
            position: relative;
            max-height: 600px; /* Match car-image max-height */
            overflow-y: auto; /* Enable vertical scrolling */
        }

.pricing-details {
    margin-bottom: -20px;
}

.booking-form {
    
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-gap: 10px;
}

.form-group, .insurance-options, .deposit-option {
    margin-bottom: 20px;
}


input, select {
    width: calc(100% - 15px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 7px;
    box-sizing: border-box;
}
.pay{
    width: 10%;
    padding: 0px;
    margin-bottom:10px ;
}
.pay p{
    display: flex;
}
/* Basic button styles */
button {
    padding: 10px 20px; /* Adjust padding as needed */
    border: none;
    border-radius: 5px; /* Rounded corners */
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    font-family: sans-serif; /* Use a suitable font */
}

/* Booking button styles */
.booking-button {
    background-color: #FFA500; /* Orange color */
    color: white;
}

.booking-button:hover {
    background-color: #FF8C00; /* Darker orange on hover */
}

/* Enquiry button styles */
.enquiry-button {
    background-color: #008080; /* Teal color */
    color: white;
}

.enquiry-button:hover {
    background-color: #006A6A; /* Darker teal on hover */
}

/* Optional: Add some margin between buttons */
button {
    margin: 5px;
}

.price-item {
    display: flex
;
    display: -webkit-flex;
    align-items: center;
    -webkit-align-items: center;
    justify-content: space-between;
    -webkit-justify-content: space-between;
    -ms-flex-pack: space-between;
    background: #f2f7f6;
    border-radius: 5px;
    margin: 0 0 15px;
    padding: 15px;
}

/* Responsive Styles */
@media (max-width: 1024px) {
    .container {
        max-width: 90%;
    }
    .image-slider img {
        width: 160px;
        height: 130px;
    }
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    .car-image {
        width: 100%;
    }
    .booking-form {
        grid-template-columns: 1fr;
    }
    .image-slider img {
        width: 100px;
        height: 75px;
    }
}

@media (max-width: 480px) {
    .container {
        width: 100%;
        margin: 10px;
    }
    .form-container {
        padding: 15px;
    }
    button {
        width: 100%;
        padding: 12px;
    }
    .image-slider img {
        width: 80px;
        height: 60px;
    }
}
    </style>
</head>
<body>
    <div class="page-container">
        <div class="container">
            <div class="car-image">
                <img src="../../admin/img/thar2.jpg" alt="Car Image" id="mainImg">
                <div class="image-slider">
                     <img src="../../admin/img/thar2.jpg" alt="Car 1" id="thumb1">
                    <img src="../../admin/img/thar2.jpg" alt="Car 2" id="thumb2">
                    <img src="../../admin/img/thar3.jpg" alt="Car 3" id="thumb3">
                    <img src="../../admin/img/thar4.jpg" alt="Car 4" id="thumb4">
                </div>
                <div class="section">
            <h2>Extra Service</h2>
            <div class="content">
                <p>Late Per Hour - $10</p>
                <p>Late Per Day - $100</p>
            </div>
        </div>
        <div class="section">
            <h2>Specifications</h2>
            <div class="content">
                <div class="spec-item">
                    <i class="fas fa-cog"></i>
                    <p>Gear Type</p>
                    <p>Manual</p>
                </div>
                <div class="spec-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>Mileage</p>
                    <p>14 KM</p>
                </div>
                <div class="spec-item">
                    <i class="fas fa-gas-pump"></i>
                    <p>Fuel</p>
                    <p>Diesel</p>
                </div>
                <div class="spec-item">
                <img src="streeing.jpeg" alt="" style="height: 30px;width:35px;">
                    <p>Steering</p>
                    <p>Basic</p>
                </div>
                <div class="spec-item">
                    <i class="far fa-calendar-alt"></i>
                    <p>Model</p>
                    <p>2022</p>
                </div>
                <div class="spec-item">
                    <i class="fas fa-user-friends"></i>
                    <p>Capacity</p>
                    <p>5 Persons</p>
                </div>
                <div class="spec-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>Break Type</p>
                    <p>Hydrolic</p>
                </div>
                <div class="spec-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>Mileage</p>
                    <p>14 KM</p>
                </div>
                
            </div>
        </div>
        <div class="feature-container">
        <div class="features">
            <h2>Car Features</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Multi-zone A/C</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Heated front seats</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Android Auto</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Navigation system</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Premium sound system</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Bluetooth</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Keyless Start</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Memory seat</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>6 Cylinders</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Adaptive Cruise Control</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>Intermittent wipers</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <p>4 power windows</p>
                </div>
            </div>
        </div>
    </div>
            </div>
            
           
            <div class="form-container">
                <div class="pricing-details">
                    
                    <h2>Pricing Details</h2>
                    <p class="price-item">Per hour (1 Hour) <span>$10</span></p>
                   
                </div>
                <div class="booking-form">
                    <h2>Booking Form</h2>
                    <div class="form-group">
                        <label for="rental-type">Rental Type</label>
                        <select id="rental-type">
                            <option value="hour">Hour</option>
                            <option value="Day">Day</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pickup-location">Pickup Location</label>
                        <select id="pickup-location">
                            <option value="">Select Location</option>
                            <option value="Botad">Botad</option>
                            <option value="Bhavnagar">Bhavnagar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dropoff-location">Dropoff Location</label>
                        <select id="dropoff-location">
                            <option value="">Select Location</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pickup-date">Pickup Date</label>
                        <input type="date" id="pickup-date" placeholder="dd-mm-yyyy">
                        <input type="time" placeholder="hh:mm">
                    </div>
                    <div class="form-group">
                        <label for="dropoff-date">Drop-off Date</label>
                        <input type="date" id="dropoff-date" placeholder="dd-mm-yyyy">
                        <input type="time" placeholder="hh:mm">
                    </div>
                    <button class="booking-button">Booking</button>
                    <button class="enquiry-button">Enquiry Us</button>
                    </div>
                </div>
                
                </div>
        </div>
    </div>
    <script>
        mainImg = document.getElementById('mainImg');

        thumb1 = document.getElementById('thumb1');
        thumb1src = document.getElementById('thumb1').src;
        thumb2 = document.getElementById('thumb2');
        thumb2src = document.getElementById('thumb2').src;
        thumb3 = document.getElementById('thumb3');
        thumb3src = document.getElementById('thumb3').src;
        thumb4 = document.getElementById('thumb4');
        thumb4src = document.getElementById('thumb4').src;

        thumb1.addEventListener("click", function() {
            mainImg.src = thumb1src;
        })

        thumb2.addEventListener("click", function() {
            mainImg.src = thumb2src;
        })

        thumb3.addEventListener("click", function() {
            mainImg.src = thumb3src;
        })
         thumb4.addEventListener("click", function() {
             mainImg.src = thumb4src;
         })
    </script>
</body>
</html>