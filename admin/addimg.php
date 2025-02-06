<?php
@include "include/config.php";
$allimages = [];

if (isset($_POST['submit'])) {
    // Loop through each input field (image1[], image2[], image3[]) and process files
    foreach ($_FILES as $inputName => $file) {
        // Check if files are uploaded for this field
        if (isset($file['name']) && is_array($file['name'])) {
            $fileNames = $file['name'];
            $location = "img/";

            // Loop through each file uploaded for this input
            foreach ($fileNames as $key => $val) {
                $target = $location . $val;
                // Move the file to the target directory
                if (move_uploaded_file($file['tmp_name'][$key], $target)) {
                    // Add the file path to the allimages array
                    $allimages[] = $target;
                } else {
                    echo "<script>alert('Error uploading file: $val');</script>";
                }
            }
        }
    }

    // Insert image paths into the database
    if (count($allimages) > 0) {
        // Join the image paths into a comma-separated string
        $imagePaths = implode(",", $allimages);
        $imagePathsWithoutPrefix = str_replace("img/", "", $imagePaths);
        
        $insert = "INSERT INTO car_img (img) VALUES ('$imagePathsWithoutPrefix')";
        $run = mysqli_query($conn, $insert);

        if ($run) {
            echo "<script>alert('Car Added Successfully');</script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    } else {
        echo "<script>alert('Please select files to upload');</script>";
    }
}

// Print the array of all uploaded images for debugging
print_r($allimages);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_car_style.css">
    <title>Add Car</title>
    <script>
        function previewImages(input, id) {
            const fileList = input.files;
            const previewContainer = document.getElementById(id);
            previewContainer.innerHTML = ""; // Clear previous previews

            if (fileList) {
                for (let i = 0; i < fileList.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.style.maxWidth = "100px";
                        img.style.margin = "10px";
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(fileList[i]);
                }
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="title">Add Car</div>
            <div class="car_details">
                <!-- Input for multiple images for the first input -->
                <div class="up-img">
                    Upload Images<span style="color: red;">*</span>
                    <input type="file" name="image1[]" multiple onchange="previewImages(this, 'imagePreview1')"><br>
                    <label for="file">Upload Image</label>
                        <div id="imagePreview1"></div> <!-- Preview container for image1 -->
                </div>

                <!-- Input for multiple images for the second input -->
                <div class="up-img">
                    Upload Images<span style="color: red;">*</span>
                    <input type="file" name="image2[]" multiple onchange="previewImages(this, 'imagePreview2')"><br>
                    <label for="file">Upload Image</label>
                    <div id="imagePreview2"></div> <!-- Preview container for image2 -->
                </div>

                <!-- Input for multiple images for the third input -->
                <div class="up-img">
                    Upload Images<span style="color: red;">*</span>
                    <input type="file" name="image3[]" multiple onchange="previewImages(this, 'imagePreview3')"><br>
                    <label for="file">Upload Image</label>
                    <div id="imagePreview3"></div> <!-- Preview container for image3 -->
                </div>
            </div>

            <div class="button">
                <button type="submit" name="submit" class="button">Add Car</button>
            </div>
        </form>
    </div>
</body>

</html>