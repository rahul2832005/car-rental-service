<?php 
@include "include/config.php";
session_start();
$id="";

$email=$_SESSION['alogin'];
$query="select * from reguser where email='$email'";
$exquery=mysqli_query($conn,$query);

$result=mysqli_fetch_assoc($exquery);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="p2.css">
</head>
<body>
 
    <header>
        <div>
            <?php  include('navbar.php'); ?>
            
        </div>
    </header>
    <main class="main-content">
        <div class="user-banner">
            <div class="profile-pic">
                <img src="image/p2.jpg" alt="Profile Picture">
            </div>
            <div class="profile-info">
            <h2><?php echo $result['name']; ?></h2>
            </div>
            <div class="user-info">
                <div class="a1">
                <p ><strong>Phone:</strong><br> +917359509387</p>
                </div>
                <div class="a2"> 
                <p><strong>Email:</strong><br><?php echo $result['email']; ?></p>
                </div>
            </div>
        </div>

        <div class="tabs">
            <button class="tab active">Update Profile</button>
            <button class="tab active">Documents</button>
            <button class="tab active">Bookings</button>
        </div>

        <div class="form-container">
        <h2>Personal Details</h2>
        <form action="process_form.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name*</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $result['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name*</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $result['name']; ?>" required>
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
    </main>
    <footer>
        <div>
            <?php  include('footer.php');?>
        </div>
    </footer>
</body>
</html>