<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanguard CX2 Convertible</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .product-images {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .main-image {
            width: 100%;
            height: 450px;
            border-radius: 10px;
        }

        .thumbnail-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .thumbnail {
            width: 100%;
            height: 147px;
            border-radius: 8px;
            cursor: pointer;
        }

        .product-info {
            padding: 20px 0;
        }

        .product-title {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.8em;
            color: #333;
            margin: 20px 0;
        }

        .description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 50%;
            background: none;
            cursor: pointer;
            font-size: 20px;
        }

        .book-now {
            background: #ff4444;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .book-now:hover {
            background: #ff2222;
        }

        .specifications {
            margin-top: 40px;
        }

        .specs-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .spec-item {
            display: flex;
            align-items: center;

        }

        #icon {
            width: 10%;
            height: 80%;
            font-size: 20px;
        }

        span {
            font-size: 20px;
        }

        #button {
            
            bottom: 90px;
            color: black;
            line-height: 40px;
            border-radius: 5px;
            border: 1px solid black;
            background: white;
            margin-left: 10px;
            width: 300px;
            justify-content: center;
            align-items: center;
            margin-top: 35px;
            font-size: 30px;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="product-images">
            <img src="image/wp10875074.jpg" alt="Vanguard CX2 Convertible" class="main-image">
            <div class="thumbnail-container">
                <img src="image/wp10875074.jpg" alt="Side view" class="thumbnail">
                <img src="image/wp10875074.jpg" alt="Front view" class="thumbnail">
                <img src="image/wp10875074.jpg" alt="Rear view" class="thumbnail">
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title">Vanguard CX2 Convertible</h1>
            <div class="price">
                <span>STARTING AT</span><br>
                $ 59/day
            </div>

            <p class="description">Elevate your journey with the Ford Mustang Convertible, the epitome of American muscle and open-air excitement.',
                'specs</p>

            <div class="specifications">
                <h1>SPECIFICATIONS</h1>
                <div class="specs-grid">

                    <div class="spec-item">
                        <i class="fa-solid fa-car" id="icon"></i>
                        <span>4 people</span>

                    </div>

                    <div class="spec-item">
                        <i class="fa-solid fa-car" id="icon"></i>
                        <span>4 people</span>

                    </div>

                    <div class="spec-item">
                        <i class="fa-solid fa-car" id="icon"></i>
                        <span>4 people</span>

                    </div>

                    <div class="spec-item">
                        <i class="fa-solid fa-car" id="icon"></i>
                        <span>4 people</span>

                    </div>

                    <div class="spec-item">
                        <i class="fa-solid fa-car" id="icon"></i>
                        <span>4 people</span>

                    </div>

                </div>
            </div>
            <button type="button" id="button">Rent Now</button>


        </div>
    </div>
</body>

</html>