<?php
@include "include/config.php";
    if(isset($_POST["submit"]))
    {
       
        $image=$_FILES['image']['name'];

        $category=$_POST['category'];


            if(!empty($image))
            {
                $tmp=$_FILES['image']['tmp_name'];
                $des="gallery/".$_FILES['image']['name'];

                move_uploaded_file($tmp,$des);
            }

            $sql="insert into gallery(image,category)values('$image','$category')";

            $run=mysqli_query($conn,$sql);

            if($run==true)
            {
                echo "success";
            }
            else
            {
                echo "not";
            }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
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

        .get-in-touch {
            display: inline-block;
            background-color: #fdeaea;
            color: #e96d6d;
            font-size: 14px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
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
            font-size: 17px;
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

        font-size: 19px;
        margin-bottom: -10px;
        margin-top: -12px;
        margin-left: -350px;
       }
       #category{
        font-size: 24px;
        height: 36px;
        width: 200px;
       }
    </style>
</head>

<body>
    <div class="contact-form-container">
        <span class="get-in-touch">GET IN TOUCH</span>
        <h1 class="form-title">Send A Message</h1>
        <form class="contact-form" method="post" enctype="multipart/form-data">
        <p>select image</p>
            <input type="file" name="image" placeholder="select image" class="input-field" required style="margin-bottom:20px ;">
            <p style="margin-left: -330px;">select category</p>
          <select name="category" id="category" required>
          <option>select category</option>
            <option value="truck">truck</option>
            <option value="sedan">sedan</option>
            <option value="luxury sedan">luxury sedan</option>
            <option value="sport car">sport car</option>
            <option value="hatchback">hatchback</option>
          </select>  

            <button type="submit" class="submit-button" name="submit">Post Gallery Image</button>
        </form>
    </div>
</body>

</html>
