<?php
@include "include/config.php";
session_start();
error_reporting(0);

$sdate = date('Y-m-d');
$fdate = $tdate = $pick_up_loc = "";
$errors = [];

$vid = $_GET['vid'];
$uid = $_SESSION['userid'];
$useremail = $_SESSION['alogin'];

$amount = 0;

// Fetch car price details
$price_query = "SELECT price, chprice FROM car_list WHERE vid = $vid";
$price_result = mysqli_query($conn, $price_query);
$rowamount = mysqli_fetch_assoc($price_result);

// For driver rates, assuming you get driver details when selected.
$driver_price = 0;
$driver_chprice = 0;

// Handle Booking Form Submission
if (isset($_POST['Book'])) {
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    $pick_up_loc = $_POST['pick_up_loc'];
    $drop_of_loc = $_POST['drop_of_loc'];
    $rent_type = $_POST['rent_type'];
    $selected_driver = $_POST['selected_driver'];
    $driver_id = $_POST['selected_driver_id'];

    $datetime1 = new DateTime($fdate);
    $datetime2 = new DateTime($tdate);
    $interval = $datetime1->diff($datetime2);

    // Check if driver is selected, fetch driver pricing details
    if (!empty($driver_id)) {
        $driver_query = "SELECT dprice , hprice FROM driver WHERE did = $driver_id";
        $driver_result = mysqli_query($conn, $driver_query);
        $driver_row = mysqli_fetch_assoc($driver_result);
        $driver_price = $driver_row['dprice'];
        $driver_chprice = $driver_row['hprice'];
    }

    // Calculate amount based on rent type
    if ($rent_type === 'Day') {
        $days = $interval->days + 1;
        $amount = $days * $rowamount['price'];
        if (!empty($driver_id)) {
            $amount += $days * $driver_price;
        }
    } elseif ($rent_type === 'hour') {
        $hours = ($interval->days * 24) + ($interval->h);
        $amount = $hours * $rowamount['chprice'];
        if (!empty($driver_id)) {
            $amount += $hours * $driver_chprice;
        }
    }

    $status = 0;
    $bookingno = mt_rand(1000, 9999);

    // Validation checks
    if (empty($fdate)) {
        $errors['fdate'] = "Select a pickup date.";
    }
    if (empty($tdate)) {
        $errors['tdate'] = "Select a drop-off date.";
    }
    if (!empty($fdate) && !empty($tdate) && $fdate > $tdate) {
        $errors['date'] = "Pickup date cannot be after drop-off date.";
    }
    if (empty($pick_up_loc)) {
        $errors['pick_up_loc'] = "Select a pickup location.";
    }
    if (empty($drop_of_loc)) {
        $errors['drop_of_loc'] = "Select a drop-off location.";
    }

    if (empty($errors)) {
        // Check Driver Availability
        $driverAvailable = true;
        if (!empty($driver_id)) {
            $dravlquery = "SELECT * FROM booking WHERE did = $driver_id AND status != 2 AND status !=3 
                AND ('$fdate' BETWEEN DATE(FromDate) AND DATE(ToDate) OR '$tdate' BETWEEN DATE(FromDate) AND DATE(ToDate)
                OR (FromDate BETWEEN '$fdate' AND '$tdate') OR (ToDate BETWEEN '$fdate' AND '$tdate'))";

            $drexavlquery = mysqli_query($conn, $dravlquery);
            if (mysqli_num_rows($drexavlquery) > 0) {
                $driverAvailable = false;
                echo "<script>alert('Driver already booked for the selected dates');</script>";
            }
        }

        // Check Car Availability
        $carAvailable = true;
        $avlquery = "SELECT * FROM booking WHERE vid = $vid AND status != 2 AND status !=3  
            AND ('$fdate' BETWEEN DATE(FromDate) AND DATE(ToDate) OR '$tdate' BETWEEN DATE(FromDate) AND DATE(ToDate)
            OR (FromDate BETWEEN '$fdate' AND '$tdate') OR (ToDate BETWEEN '$fdate' AND '$tdate'))";

        $exavlquery = mysqli_query($conn, $avlquery);
        if (mysqli_num_rows($exavlquery) > 0) {
            $carAvailable = false;
            echo "<script>alert('Car already booked for the selected dates');</script>";
            echo "<script>document.location = 'dis_car.php';</script>";
        }

        // Proceed to Payment if available
        if ($driverAvailable && $carAvailable) {
            require('vendor/autoload.php');

            // Razorpay API Keys (test mode)
            $keyId = 'rzp_test_lFfdAvwRtocJ83';
            $keySecret = 'hzszbJxefW7Otvh7tsaarvf4';

            $api = new \Razorpay\Api\Api($keyId, $keySecret);

            $amount_in_paise = $amount * 100; // Razorpay accepts amount in paise

            $orderData = [
                'receipt' => strval(rand(1000, 9999)),
                'amount' => $amount_in_paise,
                'currency' => 'INR',
                'payment_capture' => 1,
            ];

            $order = $api->order->create($orderData);

            $_SESSION['booking_data'] = [
                'bookingno' => $bookingno,
                'useremail' => $useremail,
                'vid' => $vid,
                'fdate' => $fdate,
                'tdate' => $tdate,
                'pick_up_loc' => $pick_up_loc,
                'drop_of_loc' => $drop_of_loc,
                'status' => $status,
                'rent_type' => $rent_type,
                'did' => $driver_id,
                'dname' => $selected_driver,
                'amount' => $orderData['amount'] / 100,
                'order_id' => $order->id,
            ];
?>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                function pay(e) {
                    var options = {
                        "key": "<?= $keyId; ?>",
                        "amount": "<?= $amount_in_paise; ?>",
                        "currency": "INR",
                        "name": "Carola",
                        "description": "Payment for Booking Car",
                        "order_id": "<?= $order->id; ?>",
                        "handler": function(response) {
                            window.location.href = 'payment_success.php?payment_id=' + response.razorpay_payment_id + '&order_id=' + response.razorpay_order_id + '&signature=' + response.razorpay_signature;
                        },
                        "prefill": {
                            "name": "Bhupat",
                            "email": "<?= $_SESSION['userEmail']; ?>",
                            "contact": "9999999999"
                        },
                        "theme": {
                            "color": "#631549"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                    e.preventDefault();
                }
                pay();
            </script>
<?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Booking</title>
    <!-- <link rel="stylesheet" href="h4.css"> -->
    <link rel="stylesheet" href="all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/car_details.css">

    <style>
        #driver_form {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1001;
            display: none;
            width: 60%;
        }

        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }

        .close-driver-form {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <header>
        <?php include('navbar.php'); ?>
    </header>

    <?php

    $query = "SELECT * from car_list where vid=$vid";

    // $query = "select * from car_list where vid=$vid";

    $exquery = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($exquery)) {
        $image = explode(",", $row['image']);

    ?>

        <div class="page-container">
            <div class="container">
                <div class="car-image" id="carImage">

                    <img src="../admin/img/<?php echo $image[0]; ?>" alt="Not " id="mainImg">
                    <div class="image-slider">
                        <img class="slide" src="../admin/img/audi2.jpg" alt="Car Interior Front" id="thumb1">
                        <img class="slide" src="../admin/img/audi2.jpg" alt="Car Interior Back" id="thumb2">
                        <img class="slide" src="../admin/img/audi2.jpg" alt="Car Interior Back" id="thumb3">
                        <!-- <img src="../admin/img/<?php /*echo $image[3];*/ ?>" alt="Car Interior Back" id="thumb4"> -->
                        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                        <button class="next" onclick="moveSlide(1)">&#10095;</button>


                    </div>
                    <div class="section">
                        <h2><?php echo $row['cname']; ?></h2>
                        <div class="content">
                            <p>Per/Hour</p>
                            <span style="color: red;"> <b>₹<?php echo  $row['chprice']; ?></b></span>
                            <p>Per/Day</p>
                            <span style="color: red;"> <b>₹<?php echo  $row['price']; ?></b></span>

                        </div>
                    </div>
                    <div class="section">
                        <h2>Extra Service</h2>
                        <div class="content">
                            <p>Late Per Hour - ₹200 Based On Car</p>
                            <p>Late Per Day - ₹1000 Based On Car</p>
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
                                <p><?php echo $row['mileage']; ?>KM</p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-gas-pump"></i>
                                <p>Fuel</p>
                                <p><?php echo $row['fual']; ?></p>
                            </div>
                            <div class="spec-item">
                                <img src="streeing.jpeg" alt="" style="height: 30px;width:35px;">
                                <p>Steering</p>
                                <p>Basic</p>
                            </div>
                            <div class="spec-item">
                                <i class="far fa-calendar-alt"></i>
                                <p>Model</p>
                                <p><?php echo $row['modal']; ?></p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-user-friends"></i>
                                <p>Capacity</p>
                                <p><?php echo $row['seat']; ?> Persons</p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Break Type</p>
                                <p><?php echo $row['break_type']; ?></p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Door</p>
                                <p><?php echo $row['door']; ?> Doors</p>
                            </div>
                            <div class="spec-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Engine Power</p>
                                <p><?php echo $row['en_power']; ?> Doors</p>
                            </div>

                        </div>
                    </div>
                    <div class="feature-container">
                        <div class="features">
                            <h2>Car Features</h2>
                            <div class="feature-list">
                                <?php
                                $features = "SELECT accessories FROM car_list WHERE vid = $vid";
                                $exfeatures = mysqli_query($conn, $features);
                                $rowf = mysqli_fetch_assoc($exfeatures);

                                if ($rowf) {
                                    $accessories = explode(',', $rowf['accessories']); // Assuming accessories are comma-separated

                                    foreach ($accessories as $accessory) {
                                        $accessory = trim($accessory); // Trim spaces around each item
                                ?>
                                        <div class="feature-item">
                                            <i class="fas fa-check-circle"></i>
                                            <p><?php echo htmlspecialchars($accessory); ?></p>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<p>No accessories available for this car.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-container" id="formContainer">
                    <div class="pricing-details">

                        <h2>Pricing Details</h2>
                        <p class="price-item">Per hour (1 Hour) <span>₹100</span></p>

                    </div>
                    <div class="booking-form">
                        <form action="" method="post">
                            <h2>Booking Form</h2>
                            <div class="form-group">
                                <label for="rental-type">Rental Type</label>
                                <select id="rental-type" name="rent_type">
                                    <option value="">type</option>
                                    <option value="hour">Hour</option>
                                    <option value="Day">Day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pickup-location">Pickup Location</label>
                                <select id="pickup-location" name="pick_up_loc">
                                    <option value="">Select Location</option>
                                    <option value="Botad" <?php if ($pick_up_loc == 'Botad') echo 'selected'; ?>>Botad</option>
                                    <option value="Bhavnagar" <?php if ($pick_up_loc == 'Bhavnagar') echo 'selected'; ?>>Bhavnagar</option>
                                </select>
                                <span style="color: red;"> <?php echo $errors['pick_up_loc']; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="dropoff-location">Dropoff Location</label>
                                <select id="dropoff-location" name="drop_of_loc">
                                    <option value="">Select Location</option>
                                    <option value="Botad" <?php if ($drop_of_loc == 'Botad') echo 'selected'; ?>>Botad</option>
                                    <option value="Bhavnagar" <?php if ($drop_of_loc == 'Bhavnagar') echo 'selected'; ?>>Bhavnagar</option>
                                </select>
                                <span style="color: red;"> <?php echo $errors['drop_of_loc']; ?> </span>

                            </div>
                            <div class="form-group">
                                <p style="color: red;"><?php $fd; ?></p>
                                <label for="pickup-date">Pickup Date</label>
                                <input type="datetime-local" id="pickup-date" name="fdate" min="<?php echo date('Y-m-d\TH:i'); ?>" value="<?php echo ($fdate); ?>">
                                <span style="color: red;"> <?php echo $errors['fdate']; ?> </span>

                            </div>
                            <div class="form-group">
                                <p style="color: red;"><?php $td; ?></p>
                                <label for="dropoff-date">Drop-off Date</label>
                                <input type="datetime-local" id="dropoff-date" name="tdate" value="<?php echo ($tdate); ?>">
                                <span style="color: red;"> <?php echo $errors['tdate']; ?> </span>
                            </div>


                            <!-- Driver selection input  -->
                            <div class="form-group">
                                <label>Need A Driver?
                                    <input type="checkbox" name="need_driver" id="need_driver" onclick="toggleDriverForm()">
                                </label>
                                <div class="driver-name" id="driver_name" style="display: none;">
                                    <label>Driver Name
                                        <input type="text" id="selected_driver" name="selected_driver" placeholder="Selected Driver" readonly>
                                    </label>
                                    <input type="hidden" id="selected_driver_id" name="selected_driver_id" placeholder="id" readonly>

                                </div>
                            </div>

                            <!-- <button class="booking-button" name="Book">Booking</button> -->
                            <button type="submit" class="booking-button" name="Book">Rent Now</button>
                    </div>
                    </form>
                    <button class="enquiry-button" onclick="openForm()">Enquiry Us</button>


                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="enquiry-form" id="enquiryForm">
        <h2>Enquiry Form</h2>
        <div class="form-group">
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="full-name" required>
        </div>
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number</label>
            <input type="tel" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div class="btn-container">
            <button class="close-btn" onclick="closeForm()">Close</button>
            <button class="send-btn" onclick="sendMessage()">Send message</button>
        </div>
    </div>

    <!-- <div id="overlay"></div> -->
    <!-- Hide Form by Default -->
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'car_rent');


    $sql = "select * from driver where status=0 ";

    $result = mysqli_query($conn, $sql);


    ?>
    <div id="overlay" onclick="closeDriverForm()"></div>
    <div id="driver_form">
        <h4>Driver Details</h4>
        <div class="body">
            <div class="container1">
                <h2>🚗 Available Drivers</h2>

                <table>
                    <thead>
                        <tr>
                            <th>🆔 id</th>

                            <th>👤 Name</th>
                            <th>💰 Rate (per Hour)</th>
                            <th>💰 Rate (per day)</th>
                            <th>🏙️ City</th>
                            <th>🗓️ Book</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'car_rent');
                        $sql = "select * from driver";
                        $result = mysqli_query($conn, $sql);
                        $n = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $n; ?></td>

                                <td><?php echo $row['dfname']; ?></td>
                                <td><?php echo $row['hprice']; ?></td>
                                <td><?php echo $row['dprice']; ?></td>
                                <td><?php echo $row['city']; ?></td>

                                <td> <button type="button" onclick="selectDriver('<?php echo $row['dfname']; ?>','<?php echo $row['did']; ?>')"> Select</button> </td>
                                <!-- <a href="?did=<?php echo $row['did']; ?> &vid=<?php echo $vid; ?>"></a> -->
                            </tr>
                        <?php $n++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <button class="close-driver-form" onclick="closeDriverForm()">Close</button>
    </div>
    <div>

       

    </div>

    <!-- scroll script -->
    <script>
        const carImage = document.getElementById('carImage');
        const formContainer = document.getElementById('formContainer');

        carImage.addEventListener('scroll', () => {
            if (carImage.scrollTop + carImage.clientHeight >= carImage.scrollHeight) {
                // Car image scrolled to bottom, stop syncing form container
                return;
            }
            formContainer.scrollTop = carImage.scrollTop;
        });

        formContainer.addEventListener('scroll', () => {
            if (formContainer.scrollTop + formContainer.clientHeight >= formContainer.scrollHeight) {
                // Form container scrolled to bottom, stop syncing car image
                return;
            }
            carImage.scrollTop = formContainer.scrollTop;
        });
    </script>

    <!-- foto click to open script -->
    <script>
        mainImg = document.getElementById('mainImg');

        thumb1 = document.getElementById('thumb1');
        thumb1src = document.getElementById('thumb1').src;
        thumb2 = document.getElementById('thumb2');
        thumb2src = document.getElementById('thumb2').src;
        thumb3 = document.getElementById('thumb3');
        thumb3src = document.getElementById('thumb3').src;
        // thumb4 = document.getElementById('thumb4');
        // thumb4src = document.getElementById('thumb4').src;

        thumb1.addEventListener("click", function() {
            mainImg.src = thumb1src;
        })

        thumb2.addEventListener("click", function() {
            mainImg.src = thumb2src;
        })

        thumb3.addEventListener("click", function() {
            mainImg.src = thumb3src;
        })
        // thumb4.addEventListener("click", function() {
        //     mainImg.src = thumb4src;
        // })
    </script>



    <!-- Dynamic Date select  Script -->
    <script>
        // JavaScript to dynamically update "To Date" based on "From Date"
        const fromDateInput = document.getElementById('pickup-date');
        const toDateInput = document.getElementById('dropoff-date');

        fromDateInput.addEventListener('change', function() {
            const fromDate = this.value; // Get selected "From Date"
            toDateInput.min = fromDate; // Set "To Date" minimum value
        });
    </script>

    <!-- enquiry form script -->
    <script>
        let enquiryForm = document.getElementById("enquiryForm"); // Store a reference to the form
        let isOpen = false; // Keep track of the form's open/closed state

        function openForm() {
            if (!isOpen) { // Only open if it's currently closed
                enquiryForm.style.display = "block";
                isOpen = true; // Update the state
            }
        }

        function closeForm() {
            if (isOpen) { // Only close if it's currently open
                enquiryForm.style.display = "none";
                isOpen = false; // Update the state
            }
        }

        function sendMessage() {
            // Your message sending logic here...
            alert("Message sent (placeholder)");
            closeForm();
        }
    </script>






    <script>
        function toggleDriverForm() {
            const checkbox = document.getElementById('need_driver');
            const driverModal = document.getElementById('driver_form');
            const driverNameDiv = document.getElementById('driver_name');
            const overlay = document.getElementById('overlay');

            if (checkbox.checked) {
                driverModal.style.display = 'block';
                overlay.style.display = 'block';
                driverNameDiv.style.display = 'block';
            } else {
                driverModal.style.display = 'none';
                overlay.style.display = 'none';
                driverNameDiv.style.display = 'none';
            }
        }


        function selectDriver(driverName, driverId) {
            const driverModal = document.getElementById('driver_form');
            const overlay = document.getElementById('overlay');
            const selectedDriverInput = document.getElementById('selected_driver');
            const selectDriverId = document.getElementById('selected_driver_id');

            selectDriverId.value = driverId;
            selectedDriverInput.value = driverName;
            driverModal.style.display = 'none';
            overlay.style.display = 'none';
        }

        function closeDriverForm() {
            const driverModal = document.getElementById('driver_form');
            const overlay = document.getElementById('overlay');

            driverModal.style.display = 'none';
            overlay.style.display = 'none';
        }
    </script>


    <script>
        let images = [
            document.getElementById('thumb1').src,
            document.getElementById('thumb2').src,
            document.getElementById('thumb3').src
        ];
        let currentIndex = 0;
        let mainImg = document.getElementById('mainImg');

        function moveSlide(step) {
            currentIndex += step;
            if (currentIndex < 0) {
                currentIndex = images.length - 1; // Loop to last image
            } else if (currentIndex >= images.length) {
                currentIndex = 0; // Loop back to first image
            }
            mainImg.src = images[currentIndex];
        }
    </script>
</body>

</html>