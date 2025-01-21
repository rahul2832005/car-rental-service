<?php
$conn=mysqli_connect("localhost","root","","car_rent");
if (!$conn) {
    echo "not";
}

    if(isset($_POST['submit']))
    {
        $question=$_POST['question'];
        $answer=$_POST['answer'];

        $sql="insert into faq(question,answer) values('$question','$answer')";

        $run=mysqli_query($conn,$sql);

       
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

        .faq {
            display: inline-block;
            background-color: #fdeaea;
            color: #e96d6d;
            font-size: 17px;
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
        font-size: 18px;
        margin-bottom: -12px;
        margin-left: -347px;
       }
    </style>
</head>

<body>
    <div class="contact-form-container">
        <span class="faq">FAQs</span>
        <h1 class="form-title">Add A Faq</h1>
        <form class="contact-form" method="post">
            <p>enter question</p>
            <input type="text" name="question" placeholder="question" class="input-field" required>
            <p>enter answer</p>
            <textarea name="answer" placeholder="answer" class="input-field textarea"
                required></textarea>
                
            <button type="submit" class="submit-button" name="submit">Post Comment</button>
      
        </form>
    </div>
    
</body>

</html>
