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
        $days = $interval->days;
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


            $amount_in_paise = $amount * 100; // Razorpay accepts amount in paise



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
                'amount' =>  $amount_in_paise / 100,

            ];
            $user_verified = false;
            $userverify = "select * from reguser where  uid=$uid";
            $exuserverify = mysqli_query($conn, $userverify);
            $userresult = mysqli_fetch_assoc($exuserverify);

            if (!($userresult['aadhar_number']) && !($userresult['aadhar_file']) && !($userresult['license_number']) && !($userresult['license_file'])) {
                header("Location:document_verify_error.php");
            } else {
                header("Location: booking_confirmation.php");
            }
            exit();

?>

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
            width: 67%;
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
            background-color: #fff;
            color: #e63946;
            border: 1px solid #cc2f39;
            padding: 5px 15px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 20px;
        }

        .close-driver-form:hover {
            color: #fff;
            background-color: #cc2f39;
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

        .card {
            background-color: #fff;
            width: 309px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            transition: transform 0.3s;
            text-align: center;
            color: #333;
        }

        /* .card:hover {
            transform: scale(1.05);
        } */

        .card img {
            width: 296px;
            height: 285px;
            /* object-fit: cover; */
            border-radius: 10px;
            margin-top: -15px;
            margin-left: -13px;
        }

        .card-title {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .description {
            font-size: 14px;
            color: #666;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .order-button {
            background-color: #fff;
            color: #000;
            padding: 5px 15px;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            width: 100%;
            text-decoration: none;
            font-size: 24px;
            transition: background 0.3s;
        }

        .order-button:hover {
            background-color: #cc2f39;
            color: #fff;
        }

        #header {
            margin-top: 10px;
            /* background-color: #b1d7d6; */
            width: 100%;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header h1 {
            font-size: 35px;
            margin-bottom: 15px;
            color: black;
        }

        /* for reecommandation */
        .fleet {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: rgb(237, 245, 244);
        }

        .detail {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            background-color: rgb(237, 245, 244);
        }

        .fleet .card {
            width: 300px;
            /* Adjust width as needed */
            flex: 0 0 auto;
            /* Prevent cards from growing or shrinking */
        }

        .fleet .card img {
            width: 100%;
            /* Make images responsive within their cards */
            height: auto;
            object-fit: cover;
            /* Maintain aspect ratio and cover container */
        }


        /* for feedback */
        .feedback-container {
            /* max-width: 1000px; */
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .avatar {
            width: 70px;
            height: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .name-and-stars {
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .name {
            color: black;
            margin: 0;
            font-size: 23px;
            font-weight: bold;
        }

        .role {
            margin: 0;
            color: #777;
            font-size: 18px;
            line-height: 29px;
        }

        .testimonial-card {
            width: 40%;
            background: #fff;
            margin: 20px 20px;
            padding: 20px 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            /* max-width: 900px; Increased width */
            text-align: left;
        }

        .testimonial-header {
            display: flex;
            margin-bottom: 15px;
        }

        .testimonial-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
            word-wrap: break-word;
            /* Ensures long words break */
            overflow-wrap: break-word;
            /* Alternative for word breaking */
            white-space: normal;
            /* Ensures text wraps */

        }

        .stars {
            color: #f5c518;
            font-size: 27px;
        }

        .date {

            color: black;
            font-weight: bold;

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
                        <img class="slide" src="../admin/img/<?php echo $image[0]; ?>" alt="Car Interior Front" id="thumb1">
                        <img class="slide" src="../admin/img/<?php echo $image[1]; ?>" alt="Car Interior Back" id="thumb2">
                        <img class="slide" src="../admin/img/<?php echo $image[2]; ?>" alt="Car Interior Back" id="thumb3">
                        <!-- <img src="../admin/img/<?php /*echo $image[3];*/ ?>" alt="Car Interior Back" id="thumb4"> -->
                        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                        <button class="next" onclick="moveSlide(1)">&#10095;</button>


                    </div>
                    <div class="section">
                        <h2><?php echo $row['cname']; ?></h2>
                        <!-- <div class="content1">
                            <p>Per/Hour</p>
                            <span style="color: red; margin-left:-6px;"> <b>₹<?php echo  $row['chprice']; ?></b></span>
                            <p style="margin-left: 35px;">Per/Day</p>
                            <span style="color: red;"> <b>₹<?php echo  $row['price']; ?></b></span>

                        </div> -->
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
                        <p class="price-item">Per hour (1 Hour) <span>₹<?php echo $row['chprice']; ?>/-</span></p>
                        <p class="price-item">Per Day (1 Day) <span>₹<?php echo $row['price']; ?>/-</span></p>

                    </div>
                    <div class="booking-form">
                        <form action="" method="post">
                            <h2 style="margin-top: 14px;">Booking Form</h2>
                            <div class="form-group">
                                <label for="rental-type">Rental Type</label>
                                <select id="rental-type" name="rent_type">
                                    <option value="">type</option>
                                    <option value="hour" <?php if ($rent_type == 'hour') echo 'selected'; ?>>Hour</option>
                                    <option value="Day" <?php if ($rent_type == 'Day') echo 'selected'; ?>>Day</option>
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
                    <button class="enquiry-button" style=" margin-right: 6px; margin-left: 5px;" onclick="openForm()">Enquiry Us</button>


                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- code for  car  recommandation -->
    <div class="fleet" id="fleet-container">
        <?php
        $car_id = $_GET['vid'];
        $car_sql = "SELECT * FROM car_list WHERE vid = $car_id";
        $car_result = mysqli_query($conn, $car_sql);
        $car_data = mysqli_fetch_assoc($car_result);

        $brand = $car_data['brand'];
        // $category = $car_data['modal'];

        $sql = "SELECT * FROM car_list WHERE brand = '$brand' AND vid != $car_id LIMIT 4";
        $recommend_result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($recommend_result) > 0) {
            while ($rowroc = mysqli_fetch_array($recommend_result)) {
                $image1 = explode(",", $rowroc['image']);
        ?>
                <div class="card" data-name="<?php echo strtolower($rowroc['cname']); ?>">
                    <img src="../admin/img/<?php echo $image1[0] ?>" alt="Car Image">
                    <h2 class="card-title"> <?php echo $rowroc['cname']; ?> </h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <h3 class="price">Per Day- <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $rowroc['price']; ?>/-</h3>
                    <h3 class="price">Per Hour- <i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $rowroc['chprice']; ?>/-</h3>
                    <h3 class="capacity"><i class="fa-solid fa-car"></i> Capacity: <?php echo $rowroc['seat']; ?></h3>
                    <h3 class="fual"><i class="fa-solid fa-gas-pump"></i> Fuel: <?php echo $rowroc['fual']; ?></h3>
                    <div>
                        <?php if ($_SESSION["alogin"]) { ?>
                            <a href="car_detail.php?vid=<?php echo $rowroc['vid']; ?>" class="order-button">Rent Now</a>
                        <?php } else { ?>
                            <a href="login.php" class="order-button">Login For Book</a>
                        <?php } ?>
                    </div>
                </div>
        <?php }
        } ?>
    </div>

    <!-- code for feedback show -->
    <div class="feedback-container">
        <div class="detail">
            <?php
            $sqlfeed = "SELECT f.rating, f.comment, f.created_at, c.cname, u.name, u.profile_picture 
                        FROM feedback f 
                        JOIN car_list c ON f.vid = c.vid 
                        JOIN reguser u ON f.uid = u.uid 
                        WHERE f.vid = '$vid'
                        ORDER BY f.created_at DESC";

            $resultfeed = mysqli_query($conn, $sqlfeed);
            if (mysqli_num_rows($resultfeed) > 0) {
                while ($rowfeed = mysqli_fetch_assoc($resultfeed)) {
            ?>
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <img src="<?php echo $rowfeed['profile_picture']; ?>" alt="<?php echo $rowfeed['name']; ?>" class="avatar">
                            <div>
                                <h3 class="name"><?php echo $rowfeed['name']; ?></h3>
                                <span class="stars"><?php echo str_repeat("⭐", $rowfeed['rating']); ?></span>
                                <p class="role">For <?php echo $rowfeed['cname']; ?></p>
                            </div>
                        </div>
                        <p class="testimonial-text">“<?php echo $rowfeed['comment']; ?>”</p>
                        <p class="date">Submitted on: <?php echo date("d M Y", strtotime($rowfeed['created_at'])); ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- code for enquiry form -->
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
                            <th>id</th>

                            <th>Name</th>
                            <th>Rate/(Hour)</th>
                            <th>Rate/(day)</th>
                            <th>City</th>
                            <th>Book</th>

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

        <?php include('footer.php'); ?>

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