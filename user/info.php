<?php
session_start();
$id = "";
$conn = mysqli_connect("localhost", "root", "", "car_rent");

if (!$conn) {
    echo "not";
}

$email = $_SESSION['alogin'];
$query = "select * from reguser where email='$email'";
$exquery = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($exquery);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width= <div class=" form-container">
    <link rel="stylesheet" href="p2.css">
</head>
<body style="background-color:#fff;">
<div class="form-container">
    <h2>Personal Details</h2>
    <form action="process_form.php" method="post">
        <div class="form-group">
            <label for="first_name">First Name*</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $result['name']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone No.*</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="dob">DOB*</label>
            <input type="date" id="dob" name="dob" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender*</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="state">State*</label>
            <select id="state" name="state" required>
                <option value="">Select State</option>
                <option value="state1">State 1</option>
                <option value="state2">State 2</option>
                <!-- Add more states as needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="address_type">Address Type*</label>
            <select id="address_type" name="address_type" required>
                <option value="">Select Address Type</option>
                <option value="home">Home</option>
                <option value="office">Office</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pincode">Pincode*</label>
            <input type="text" id="pincode" name="pincode" required>
        </div>
        <div class="form-group">
            <label for="address">Address*</label>
            <input type="text" id="address" name="address" required>
        </div>
        <button type="submit" class="submit-btn">Save</button>
    </form>
</div>
</body>

</html>