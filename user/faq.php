<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Section</title>
    <style>
        body {
            /* font-family: poppins,sans-serif; */
            font-family: Corbel;
            margin: 0;
            padding: 0;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .faq-container {
            margin-left: 40px;
            max-width: 92%;
            /* max-width: 600px; */
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 50px;
            margin-top: 50px;
        }

        .faq-container h1 {
            color: black;
            font-size: 34px;
            margin-bottom: 20px;
            text-align: center;
        }

        .faq-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .faq-item button {
            font-family: Sitka Small;
            width: 100%;
            background: #fff;
            border: none;
            padding: 15px;
            text-align: left;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-item button:hover {
            background-color: #f3f3f3;
        }

        .faq-item button .plus {

            color: #ff4d4d;
            font-weight: bold;
            font-size: 25px;
        }


        .faq-item .faq-answer {
            display: none;
            padding: 15px;
            font-size: 18px;
            color: #555;
            background-color: #f9f9f9;
            margin-left: 22px;

        }

        #bg_img {
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
            margin-top: 5px;
        }

        .banner-text {
            position: absolute;
            top: 180px;
            color: #fff;
            padding: 10px;
            font-size: 45px;
            left: 35%;
        }
    </style>
</head>

<body>
    <?php
    @include "navbar.php";
    ?>
    <div class="banner">
        <img id="bg_img" src="image/contact_bg.jpg" alt="" srcset="">
        <div class="banner-text">
            <h1>FAQs</h1>
        </div>
    </div>
    <div class="faq-container">
        <h1>Frequently Asked Questions</h1>
      
                <div class="faq-item">
                    <button>Q.Who uses car rentals?<span class="plus">+</span></button>
                    <div class="faq-answer">People who don't own a car,travelers,or People with damaged vehicles.</div>
                </div>

                <div class="faq-item">
                    <button>Q.what does car rental offer?<span class="plus">+</span></button>
                    <div class="faq-answer">A Flexible and economical alernative to car ownership.</div>
                </div>

                <div class="faq-item">
                    <button>Q.can my friends/relative come to pick up the car?<span class="plus">+</span></button>
                    <div class="faq-answer">No,only the person whose name has been mantioned in the reservation. </div>
                </div>

                <div class="faq-item">
                    <button>Q.do I need to register on your site to book car?<span class="plus">+</span></button>
                    <div class="faq-answer">Yes,you need to register in our site to book any of the car.</div>
                </div>

                <div class="faq-item">
                    <button>Q.are car rental available for self-drive?<span class="plus">+</span></button>
                    <div class="faq-answer">Yes,we can provide car for self-drive and also provide driver if you need them.</div>
                </div>

                <div class="faq-item">
                    <button>Q.Does Carola owns vehicles?<span class="plus">+</span></button>
                    <div class="faq-answer">Carola does not own vehicles,vehicles offered thorugh our rental platform belong to our business partners</div>
                </div>
               
       
        ?>
    </div>
    <?php
    @include "footer.php";
    ?>
    <script>
        document.querySelectorAll('.faq-item button').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const isVisible = answer.style.display === 'block';

                // Reset all answers
                document.querySelectorAll('.faq-answer').forEach(ans => ans.style.display = 'none');
                document.querySelectorAll('.faq-item .plus').forEach(plus => plus.textContent = '+');

                // Toggle current answer
                if (!isVisible) {
                    answer.style.display = 'block';
                    button.querySelector('.plus').textContent = '-';
                }
            });
        });
    </script>
</body>

</html>