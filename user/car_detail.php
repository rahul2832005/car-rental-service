<?php
//@include "./connection.php";
@include "include/config.php";
session_start();
error_reporting(0);
$sdate=date('Y-m-d');
$fdate = $tdate = $message = $er = $ms = $td = $fd = "";

$vid = $_GET['vid'];
$uid = $_SESSION['userid'];
$useremail = $_SESSION['alogin'];




if (isset($_POST['Book'])) {
    $count = 0;
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    $message = $_POST['message'];
    
    
    $status = 0;
    $bookingno = mt_rand(1000, 9999);
    if ($fdate == "") {
        $fd = "Select From Date";
        $count++;
    }
    if ($tdate == "") {
        $td = "Select To Date";
        $count++;
    }
    if ($message == "") {
        $ms = "Write Message";
        $count++;
    }
    
        $avlquery =  "SELECT * FROM booking 
        WHERE vid=$vid
        AND status!=2
        AND ('$fdate' BETWEEN DATE(FromDate) AND DATE(ToDate) 
             OR '$tdate' BETWEEN DATE(FromDate) AND DATE(ToDate) 
             OR (FromDate BETWEEN '$fdate' AND '$tdate') 
             OR (ToDate BETWEEN '$fdate' AND '$tdate'))";
        $exavlquery = mysqli_query($conn, $avlquery);

        
     
       
        $row = mysqli_num_rows($exavlquery);
        if ($row > 0) {
            echo "<script>alert('Car Already Booked for the selected dates');</script>";
            echo "<script type='text/javascript'> document.location = 'dis_car.php'; </script>";
        } else {
            // Proceed with booking
            $sql = "insert INTO booking (bookingno, userEmail, vid, FromDate, ToDate, message, status) 
                    VALUES ($bookingno, '$useremail', $vid, '$fdate', '$tdate', '$message', $status)";
            $ex = mysqli_query($conn, $sql);
            
            if ($ex) {   
                echo "<script>alert('Booking Done');</script>";
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
        }
       
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanguard CX2 Convertible</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/car_details.css">
    <style>
         @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            color: black;
            display: flex;
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .car-image {
            flex: 1;
            text-align: center;
        }

        .car-image img {
            width: 100%;
            border-radius: 10px;
            height: 363px;
        }

        .thumbnail-gallery {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .thumbnail-gallery img {
            width: 140px;
            height: 120px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .car-info {
            flex: 1;
            padding-left: 20px;
        }

        h1 {
            margin-top: 0px;
            font-size: 29px;
            margin-bottom: -20px;
        }

        .price {
            font-size: 20px;
            margin-bottom: -10px;
        }

        .price span {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
        }

        .description {
            font-size: 15px;
            margin-bottom: 20px;
        }

        /* ul {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
        } */

        .specifications
        {
            margin-top: -50px;
        }
        .specifications h3,
        .color-options h3 {
            margin-top: 30px;
            font-size: 22px;
            margin-bottom: 10px;
        }

        /* .specifications ul {
            list-style: none;
            padding: 0;
        } */

        /* .specifications li {
            font-size: 18px;
            margin-bottom: 5px;
        } */

        .button {
            /* margin-top: 40px; */
            color: black;
            background: white;
            border: 2px solid black;
            font-size: 28px;
            height: 47px;
            width: 390px;
            border-radius: 6px;
            position: sticky;
        }

        tbody {
            display: grid;
            gap: 20px;
        }
        #col2{
            padding-left: 45px;
        }
    </style>
    
</head>
<script>
    if(window.history.replaceState)
{
    window.history.replaceState(null,null,window.location.href);
}
</script>
<body>

    <div>
        <?php include('navbar.php'); ?>
    </div>
    <?php   
    $query = "SELECT * from car_list where vid=$vid";
   
    // $query = "select * from car_list where vid=$vid";

    $exquery = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($exquery)) {
        $image = explode(",", $row['image']);

    ?>
    <div class="container">
        <div class="car-image">
            <img src="../admin/img/<?php echo $image[0]; ?>" alt="Not " id="mainImg">
            <div class="thumbnail-gallery">
                <img  src="../admin/img/<?php echo $image[0]; ?>" alt="Car Interior Front" id="thumb1">
                <img src="../admin/img/<?php echo $image[1]; ?>" alt="Car Interior Back" id="thumb2">
                <img src="../admin/img/<?php echo $image[2]; ?>" alt="Car Interior Back" id="thumb3">
            </div>
        </div>

        <div class="car-info">
            <h1><?php echo $row['name']; ?></h1>
            <p class="price">Starting at <span>₹<?php echo $row['price']; ?>/day</span></p>
            <p class="description">
                Elevate your journey with the Ford Mustang Convertible, the epitome of American
                muscle and open-air excitement.
            </p>

            <div class="specifications">
                <h3>Specifications</h3>
                <table>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>
                    <tr>
                        <td id="col1"><i class="fa-solid fa-car"></i> Convertible</td>
                        <td id="col2"><i class="fa-solid fa-car"></i> Convertible</td>
                    </tr>

                </table>
                <!-- <ul style="display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            list-style: none;
            padding: 0;">
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> Convertible</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> Automatic</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 5.0-liter V8</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 4 Passengers</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 4 Passengers</li>
                    <li style="font-size: 18px;margin-bottom: 5px;"><i class="fa-solid fa-car"></i> 450 HP</li>
                </ul> -->
            </div>
            <?php if($row['status']==0 || $row['status']=="") {?>
                <button type="submit" id="button" class="button">Rent Now</button>
            <?php  } else {?>
                <button type="submit" id="button1" class="button">Booked</button>
            <?php  }?>
        </div>
    </div>
    <?php  
    }
    ?>

    <div class="pop-up">
        <div class="book-container">
            <img src="image/c.png" alt="not-found" class="close">
            <h2>Book Now</h2>
            <form method="post">
                From Date :<br>
                <input type="date" id="from-date" placeholder="dd-mm-yyyy" name="fdate" value="<?php echo $fdate; ?>" min="<?php  echo $sdate; ?>"; required>
                <p style="color: red;"><?php echo $fd; ?></p>
                To Date:<br>
                <input type="date" id="to-date" placeholder="dd-mm-yyyy" name="tdate" value="<?php echo $tdate; ?>"  required>
                <p style="color: red;"><?php echo $td; ?></p>
                Message :<br>
                <textarea id="message" name="message" value="<?php echo $message; ?>" required></textarea>
                <p style="color: red;"><?php echo $ms; ?></p>
                <button type="submit" name="Book">Book</button>
            </form>
        </div>
    </div>
 

    <div>

        <?php include('footer.php'); ?>

    </div>

    <script>
        document.getElementById("button").addEventListener('click', function() {
            document.querySelector(".pop-up").style.display = "flex";
        })

        document.querySelector(".close").addEventListener('click', function() {
            document.querySelector(".pop-up").style.display = "none";
        })



     // JavaScript to dynamically update "To Date" based on "From Date"
     const fromDateInput = document.getElementById('from-date');
    const toDateInput = document.getElementById('to-date');

    fromDateInput.addEventListener('change', function () {
        const fromDate = this.value; // Get selected "From Date"
        toDateInput.min = fromDate; // Set "To Date" minimum value
    });
    </script>
     <script>
        mainImg = document.getElementById('mainImg');

        thumb1 = document.getElementById('thumb1');
        thumb1src = document.getElementById('thumb1').src;
        thumb2 = document.getElementById('thumb2');
        thumb2src = document.getElementById('thumb2').src;
        thumb3 = document.getElementById('thumb3');
        thumb3src = document.getElementById('thumb3').src;

        thumb1.addEventListener("click", function() {
            mainImg.src = thumb1src;
        })

        thumb2.addEventListener("click", function() {
            mainImg.src = thumb2src;
        })

        thumb3.addEventListener("click", function() {
            mainImg.src = thumb3src;
        })
    </script>


</body>

</html>