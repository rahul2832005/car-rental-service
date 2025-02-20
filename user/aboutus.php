<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cleaning Services Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }
        .container {
            display: flex;
            background: white;
            max-width: 900px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .image-section {
            position: relative;
        }
        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .experience-badge {
            position: absolute;
            top: 50%;
            left: -40px;
            transform: rotate(-90deg);
            background: #f7941d;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
            max-width: 50%;
        }
        .content h2 {
            color: #222;
        }
        .content p {
            color: #555;
            line-height: 1.6;
        }
        .list {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        .list span {
            color: #007bff;
            font-size: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <!-- <span class="experience-badge">12+ years of experiences</span> -->
            <img src="image/about.png" alt="Car Cleaning">
        </div>
        <div class="content">
            <h2>Best Solution For Cleaning Services</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <div class="list">
                <span>&#10004;</span>
                <p>At vero et accusamus iusto dignissimos</p>
            </div>
            <div class="list">
                <span>&#10004;</span>
                <p>Nam libero tempore, cum soluta nobis</p>
            </div>
        </div>
    </div>
</body>
</html>
