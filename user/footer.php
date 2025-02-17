
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        @font-face {
    font-family: 'pop-regular';
    src: url('../font/Poppins-Regular.ttf');
}

@font-face {
    font-family: 'pop-bold';
    src: url('../font/Poppins-Bold.ttf');
}

@font-face {
    font-family: 'pop-light';
    src: url('../font/Poppins-Light.ttf');
}
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'pop-regular';
        }

        body {
            background-color: #fff;
            color: #fff;
        }

        /* Footer Styles */
        footer {
            background:url(image/footer.jpg);
            padding: 40px 0;
            bottom: 0; 
            width: 100%;
            margin-bottom: 0px;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            padding: 0 3%;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            min-width: 220px;
            margin: 20px 0;
        }
        .h2{
            font-size: 35px;
        }

        .h2,
        h3 {
            margin-bottom: 15px;
        }
        .h3{
            font-size: 20px;
            color: #fff;
        }
        .logo {
            color: #fff;
            font-weight: bold;
        }

        .highlight {
            color: #e63946;
        }

        .footer-section p,
        a {
            color: #ccc;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            transition: all 0.5s;
            color: #e63946;
        }

        /* ul {
            list-style: none;
        }

        ul li {
            margin-bottom: 10px;
        }  */

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="email"] {
            padding: 8px;
            border: none;
            border-radius: 5px;
            outline: none;
            width: 200px;
            font-size: 18px;
        }

        .subscribe {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            width: 200px;
            font-size: 18px;
        }

        .subscribe:hover {
            background-color: #cc2f39;
        }

        /* Footer Bottom */
        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #333;
            margin-top: 5px;
            margin-bottom: -40px;
        }
        .bottom_text{
            font-size: 25px;
        }

        .social-icons a {
            color: #ccc;
            margin: 0 10px;
            font-size: 18px;
        }

        .social-icons a:hover {
            color: #e63946;
        }
    </style>
</head>

<body>
    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <!-- Company Info -->
            <div class="footer-section company-info">
                <h2 class="h2"><span>Car</span><span style="color: red;font-size: 35px; ;">ola</span></h2>
                <p>57,opp Hotel Lotus <br>Botad, Gujarat</p>
                <p><a href="#">www.carola.com</a></p>
                <p>+91-9824930580</p>
            </div>
            <!-- Community -->
            <div class="footer-section community">
                <h3 class="h3">Community</h3>
                <ul style=" list-style: none;">
                    <!-- <li style=" margin-bottom: 10px;"><a href="#">Area Details</a></li> -->
                    <li style=" margin-bottom: 10px;"><a href="faq.php">Faq</a></li>
                    <li style=" margin-bottom: 10px;"><a href="servece_area.php">Service Areas</a></li>
                    <li style=" margin-bottom: 10px;"><a href="gallery.php">Gallery</a></li>
                    <li style=" margin-bottom: 10px;"><a href="Testimonials.php">Testimonials</a></li>
                </ul>
            </div>
            <!-- Resources -->
            <div class="footer-section resources">
                <h3 class="h3">Resources</h3>
                <ul style=" list-style: none;">
                    <li style=" margin-bottom: 10px;"><a href="about_us.php">About Us</a></li>
                    <li style=" margin-bottom: 10px;"><a href="out_team.php">Our Team</a></li>
                    <li style=" margin-bottom: 10px;"><a href="t&c.php">T&C</a></li>
                    <li style=" margin-bottom: 10px;"><a href="privacy.php">Privacy Policy</a></li>
                    <li style=" margin-bottom: 10px;"><a href="contact_us.php">Contact</a></li>
                    
                </ul>
            </div>
            <!-- Newsletter -->
            <div class="footer-section newsletter">
                <h3 class="h3">Subscribe Newsletter</h3>
                <p>Our estimated global carbon emissions by investing in greenhouse</p>
                <form>
                    <input type="email" placeholder="Email Address" required>
                    <button class="subscribe" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="bottom_text">&copy; 2024 <span class="highlight">Carola</span>, Inc. All Rights
                Reserved</p>
            <div class="social-icons">
                <a href="#"><i>F</i></a>
                <a href="#"><i>T</i></a>
            </div>
        </div>
    </footer>
</body>

</html>