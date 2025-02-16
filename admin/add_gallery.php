<?php
$conn = mysqli_connect("localhost", "root", "", "car_rent");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add'])) {
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $category = $_POST['category'];

    // Ensure the 'gallery' folder exists
    $upload_dir = "gallery/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create the directory if it doesn't exist
    }

    $destination = $upload_dir . basename($image);

    $sql = "INSERT INTO gallery (image, category) VALUES ('$image', '$category')";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        if (move_uploaded_file($tmp, $destination)) {
            echo "<script>alert('Image Uploaded Successfully');</script>";
        } else {
            echo "<script>alert('Failed to move image to gallery folder.');</script>";
            
        }
    } else {
        echo "<script>alert('Database insertion failed.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery Image</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .contact-form-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }


        .textarea {
            resize: none;
            height: 100px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            color: #000;
        }

        .submit-button {
            background-color: #000;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #444;
        }
       p{
        margin-top: -12px;
        margin-left: -343px;
        font-size: 20px;
       }
       .category
       {
        height: 40px;
        font-size: 20px;
       }
       input[type="file"]
       {
        font-size: 18px;
        margin-bottom: 20px;
       }
    </style>
</head>

<body>
    <div class="contact-form-container">
        <h1 class="form-title">Add a Gallery</h1>
        <form class="contact-form" method="post" enctype="multipart/form-data">
            <p>select image:</p>
            <input type="file" name="image" id="">

            <select name="category" id="" class="category">
                <option value="">select category</option>
                <option value="truck">truck</option>
                <option value="luxury_sedan">luxury sedan</option>
                <option value="sedan">sedan</option>
                <option value="sport_car">sport car</option>
                <option value="hatchback">hatchback</option>
            </select>
            <button type="submit" class="submit-button" name="add">Add Image</button>
        </form>
    </div>
</body>

</html>
