<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider with Animations</title>
    <style>
        /* Slider Container */
        .slider {
            position: relative;
            width: 100%;
            max-width: 800px;
            height: 400px;
            margin: auto;
            overflow: hidden;
        }

        /* Slide Wrapper */
        .slides {
            display: flex;
            width: 500%;
            animation: slide-animation 20s infinite;
        }

        /* Each Slide */
        .slide {
            width: 100%;
            flex-shrink: 0;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Animations */
        .slide:nth-child(1) {
            animation: fade-in 5s infinite;
        }

        .slide:nth-child(2) {
            animation: slide-up 5s infinite;
        }

        .slide:nth-child(3) {
            animation: zoom-in-out 5s infinite;
        }

        .slide:nth-child(4) {
            animation: rotate-in 5s infinite;
        }

        /* Animation Keyframes */
        @keyframes slide-animation {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-100%);
            }

            50% {
                transform: translateX(-200%);
            }

            75% {
                transform: translateX(-300%);
            }

            100% {
                transform: translateX(-400%);
            }
        }

        @keyframes fade-in {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes slide-up {
            0% {
                transform: translateY(100%);
            }

            50% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(100%);
            }
        }

        @keyframes zoom-in-out {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }
        }

        @keyframes rotate-in {
            0% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }
    </style>
</head>

<body>
    <div class="slider">
        <div class="slides">
            <div class="slide">
                <img src="image/ad_bg.jpg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="image/ad_bg.jpg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="image/ad_bg.jpg" alt="Slide 3">
            </div>
            <div class="slide">
                <img src="image/ad_bg.jpg" alt="Slide 4">
            </div>
        </div>
    </div>
</body>

</html>