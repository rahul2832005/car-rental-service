<?php
include "include/config.php"; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $new_start_date = $_POST['new_start_date'];
    $new_end_date = $_POST['new_end_date'];

    // Fetch old booking details
    $query = "SELECT vid, DATEDIFF(ToDate, FromDate) AS booking_days FROM booking WHERE id = $booking_id";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);
    $vid = $booking['vid'];
    $old_booking_days = $booking['booking_days']; // Total days of old booking

    // Calculate new booking duration
    $new_booking_days = (strtotime($new_end_date) - strtotime($new_start_date)) / (60 * 60 * 24); // Convert seconds to days

    // Check if new booking duration matches old booking duration
    if ($new_booking_days != $old_booking_days) {
        echo "<script>alert('You can only modify the booking for the same number of days as your original booking ($old_booking_days days).');
        window.history.back();</script>";
        exit();
    }

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
        window.history.back();</script>";
    } else {
        // Update booking with modification request
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
}
?>
