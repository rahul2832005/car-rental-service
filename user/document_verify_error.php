
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents Not Verified</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 40px;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .error-code {
            font-size: 80px;
            font-weight: bold;
            color: #ff4757;
        }
        .error-message {
            font-size: 22px;
            color: #333;
            margin: 20px 0;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            color: white;
            background: #ff4757;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s;
        }
        .back-button:hover {
            background: #e84118;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">403</div>
        <div class="error-message">Your Documents Are Not Verified!</div>
        <p>Please upload valid documents or contact support.</p>
        <a href="#" class="back-button" onclick="goBack()">Go Back</a>
    </div>
    <script>
            function goBack() {
                window.history.back();
            }
        </script>
</body>
</html>
