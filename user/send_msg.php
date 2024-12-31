
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
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 12px;
            margin-bottom: 15px;
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
        margin-top: -12px;
        margin-left: -370px;
       }
    </style>
</head>

<body>
    <div class="contact-form-container">
        <span class="get-in-touch">GET IN TOUCH</span>
        <h1 class="form-title">Send A Message</h1>
        <form class="contact-form">
            <input type="text" name="name" placeholder="Your Name" class="input-field" required>
            <p>enter name</p>
            <input type="email" name="email" placeholder="Your email" class="input-field" required>
            <p>enter name</p>
            <textarea name="message" placeholder="Type message" class="input-field textarea"
                required></textarea>
                <p>enter name</p>
            <div class="checkbox-container">
                <input type="checkbox" id="save-info">
                <label for="save-info">Save my name, email, and website in this browser for the next
                    time I comment.</label>
            </div>
            <button type="submit" class="submit-button" name="submit">Post Comment</button>
        </form>
    </div>
</body>

</html>
