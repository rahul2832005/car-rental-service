<?php
include "include/config.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $new_start_date = $_POST['new_start_date'];
    $new_end_date = $_POST['new_end_date'];

    // Fetch old booking details with JOIN
    $query = "SELECT b.vid, 
                     DATEDIFF(b.ToDate, b.FromDate) AS booking_days, 
                     c.price 
              FROM booking b
              INNER JOIN car_list c ON b.vid = c.vid
              WHERE b.id = $booking_id";

    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);
    $vid = $booking['vid'];
    $old_booking_days = $booking['booking_days']; // Total days of old booking
    $price = $booking['price']; // Price per day
    // Calculate new booking duration
    $new_booking_days = (strtotime($new_end_date) - strtotime($new_start_date)) / (60 * 60 * 24); // Convert seconds to days

    // Extra days calculation
    $extra_days = $new_booking_days - $old_booking_days;
    $extra_amount = $extra_days * $price;

    // Check if the car is already booked on new dates
    $check_query = "SELECT * FROM booking 
                    WHERE vid = $vid 
                    AND id != $booking_id  /* Exclude current booking */
                    AND (
                        (FromDate <= '$new_end_date' AND ToDate >= '$new_start_date') /* Overlapping condition */
                    )";

    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('The selected car is already booked for the given dates. Please choose different dates.');
        window.location.href='my_booking.php';</script>";
        exit();
    }

    // If user is extending the booking, redirect to Razorpay for payment
    if ($extra_days > 0) {
        echo "<script>
            if (confirm('You have extended your booking by $extra_days days. Extra charges: ₹$extra_amount. Proceed to payment?')) {
                window.location.href='razorpay_payment.php?amount=$extra_amount&booking_id=$booking_id&new_start_date=$new_start_date&new_end_date=$new_end_date';
            } else {
                window.location.href='my_booking.php';
            }
        </script>";
        exit();
    }

    // If no extra days, proceed with modification request
    $update_query = "UPDATE booking SET 
                    new_start_date = '$new_start_date', 
                    new_end_date = '$new_end_date',
                    modification_status = 'pending'
                    WHERE id = $booking_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Your modification request has been sent!');
        window.location.href='my_booking.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
