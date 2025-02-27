<?php
session_start();
include "include/config.php"; // Database connection

$user_id = $_SESSION['userid']; // Ensure session is set

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhar_number = $_POST['aadhar_number'];
    $license_number = $_POST['license_number'];

    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Upload Aadhar File
    $aadhar_target = "";
    if (isset($_FILES["aadhar_file"]) && $_FILES["aadhar_file"]["error"] == 0) {
        $aadhar_file_name = time() . "_aadhar_" . basename($_FILES["aadhar_file"]["name"]);
        $aadhar_target = $upload_dir . $aadhar_file_name;
        move_uploaded_file($_FILES["aadhar_file"]["tmp_name"], $aadhar_target);
    }

    // Upload License File
    $license_target = "";
    if (isset($_FILES["license_file"]) && $_FILES["license_file"]["error"] == 0) {
        $license_file_name = time() . "_license_" . basename($_FILES["license_file"]["name"]);
        $license_target = $upload_dir . $license_file_name;
        move_uploaded_file($_FILES["license_file"]["tmp_name"], $license_target);
    }

    // Update database
    $query = "UPDATE reguser SET aadhar_number = '$aadhar_number'";
    if (!empty($aadhar_target)) {
        $query .= ", aadhar_file = '$aadhar_target'";
    }
    $query .= ", license_number = '$license_number'";
    if (!empty($license_target)) {
        $query .= ", license_file = '$license_target'";
    }
    $query .= " WHERE uid = '$user_id'";

    mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
    $msg = "Documents uploaded successfully!";
}

// Fetch uploaded documents
$query = "SELECT * FROM reguser WHERE uid = '$user_id'";
$result = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
$documents = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Documents</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }
        h2 {
            text-align: center;
            color: #631579;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #631579;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }
        button:hover {
            background-color: #4b0e5f;
        }
        .preview-box {
            margin-top: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #fff;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #631579;
            color: white;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            input, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Your Documents</h2>
    <?php if (isset($msg)) echo "<p style='color: green;'>$msg</p>"; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Aadhar Number:</label>
            <input type="text" name="aadhar_number" value="<?php echo $documents['aadhar_number'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Upload Aadhar Card (PDF/Image):</label>
            <input type="file" name="aadhar_file" accept="image/*,application/pdf">
        </div>
        <div class="form-group">
            <label>License Number:</label>
            <input type="text" name="license_number" value="<?php echo $documents['license_number'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Upload Driving License (PDF/Image):</label>
            <input type="file" name="license_file" accept="image/*,application/pdf">
        </div>
        <button type="submit">Upload Documents</button>
    </form>

    <h3>Uploaded Documents</h3>
    <table>
        <tr>
            <th>Aadhar Number</th>
            <th>Aadhar File</th>
            <th>License Number</th>
            <th>License File</th>
        </tr>
        <tr>
            <td><?php echo $documents['aadhar_number'] ?? 'N/A'; ?></td>
            <td>
                <?php if (!empty($documents['aadhar_file'])): ?>
                    <a href="<?php echo $documents['aadhar_file']; ?>" target="_blank">View</a>
                <?php else: ?> No File Uploaded <?php endif; ?>
            </td>
            <td><?php echo $documents['license_number'] ?? 'N/A'; ?></td>
            <td>
                <?php if (!empty($documents['license_file'])): ?>
                    <a href="<?php echo $documents['license_file']; ?>" target="_blank">View</a>
                <?php else: ?> No File Uploaded <?php endif; ?>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
