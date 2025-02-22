<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider with Pagination</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .slider-container {
            position: relative;
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
        }

        .slide img {
            width: 100%;
            display: block;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .pagination {
            text-align: center;
            margin-top: 10px;
        }

        .active {
            background-color: #717171;
        }
    </style>
</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="image/ahemdabad.jpg" alt="Slide 1"></div>
            <div class="slide"><img src="image/ahemdabad.jpg" alt="Slide 2"></div>
            <div class="slide"><img src="image/ahemdabad.jpg" alt="Slide 3"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');

        function updateSlider() {
            document.querySelector('.slider').style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        function moveSlide(step) {
            currentIndex = (currentIndex + step + slides.length) % slides.length;
            updateSlider();
        }

        function currentSlide(index) {
            currentIndex = index;
            updateSlider();
        }

        updateSlider();
    </script>
</body>

</html>