<?php
@include "include/config.php";
session_start();
if (!isset($_SESSION["alogin"])) {
    header("location:login.php");
    exit;
}
$email = $_SESSION['alogin'];
$query = "SELECT * FROM reguser WHERE email='$email'";
$exquery = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($exquery);

$userEmail = $_SESSION['alogin'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $addressType = mysqli_real_escape_string($conn, $_POST['address_type']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $query = "UPDATE reguser SET name='$firstName', mnumber='$phone', dob='$dob', gender='$gender', state='$state', address_type='$addressType', pincode='$pincode', address='$address' WHERE email='$userEmail'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success_message'] = 'Information updated successfully!';
        header('Location: info.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Personal Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p2.css">
    <script>
        function enableEditing() {
    const inputs = document.querySelectorAll('.form-group input, .form-group select');
    inputs.forEach(input => {
        if (input.id !== 'email') { // Skip enabling email input
            input.removeAttribute('disabled');
        }
    });
    document.getElementById('save-btn').style.display = 'block';
    document.getElementById('edit-btn').style.display = 'none';
}

    </script>
</head>

<body style="background-color:#fff;">
    <div class="form-container">
        <h2>Personal Details</h2>
        <form action="process_form.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name*</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $result['name']; ?>" disabled required>
            </div>

            <div class="form-group">
                <label for="phone">Phone No.*</label>
                <input type="text" id="phone" name="phone" value="<?php echo $result['mnumber']; ?>" disabled required>
            </div>

            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>" disabled required>
            </div>

            <div class="form-group">
                <label for="dob">DOB*</label>
                <input type="date" id="dob" name="dob" value="<?php echo $result['dob'] ?? ''; ?>" disabled required>
            </div>

            <div class="form-group">
                <label for="gender">Gender*</label>
                <select id="gender" name="gender" disabled required>
                    <option value="">Select Gender</option>
                    <option value="male" <?php if ($result['gender'] === 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if ($result['gender'] === 'female') echo 'selected'; ?>>Female</option>
                    <option value="other" <?php if ($result['gender'] === 'other') echo 'selected'; ?>>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="state">State*</label>
                <select id="state" name="state" disabled required>
                    <option value="">Select State</option>
                    <option value="state1" <?php if ($result['state'] === 'state1') echo 'selected'; ?>>State 1</option>
                    <option value="state2" <?php if ($result['state'] === 'state2') echo 'selected'; ?>>State 2</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address_type">Address Type*</label>
                <select id="address_type" name="address_type" disabled required>
                    <option value="">Select Address Type</option>
                    <option value="home" <?php if ($result['address_type'] === 'home') echo 'selected'; ?>>Home</option>
                    <option value="office" <?php if ($result['address_type'] === 'office') echo 'selected'; ?>>Office</option>
                </select>
            </div>

            <div class="form-group">
                <label for="pincode">Pincode*</label>
                <input type="text" id="pincode" name="pincode" value="<?php echo $result['pincode'] ?? ''; ?>" disabled required>
            </div>

            <div class="form-group">
                <label for="address">Address*</label>
                <input type="text" id="address" name="address" value="<?php echo $result['address'] ?? ''; ?>" disabled required>
            </div>

            <button type="button" id="edit-btn" onclick="enableEditing()" class="submit-btn">Edit Information</button>
            <button type="submit" id="save-btn" class="submit-btn" style="display:none;">Save</button>
        </form>
    </div>
</body>

</html>
