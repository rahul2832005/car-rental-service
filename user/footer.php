<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            color: #fff;

        }

        /* Footer Styles */
        footer {
            background-image:url(image/footer.jpg);
            padding: 40px 0;
            bottom: 0; 
            width: 100%; 
            
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            padding: 0 10%;
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

        .h2,h3 {
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
            font-size: 16px;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: #e63946;
        }

        ul {
            list-style: none;
        }

        ul li {
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="email"] {
            margin-top: 10px;
            padding: 8px;
            border: none;
            border-radius: 5px;
            outline: none;
        }

        button {
    
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #cc2f39;
        }

        /* Footer Bottom */
        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #333;
            margin-top: 20px;
        }

        .bottom_text{
            font-size: 20px;
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
                <h2 class="h2"><span class="logo">Car</span><span class="highlight">ola</span></h2>
                <p>57 Heol Isaf Station Road, <br>Cardiff, UK</p>
                <p><a href="mailto:info@example.com">info@example.com</a></p>
                <p>029-2021-4012</p>
            </div>
            <!-- Community -->
            <div class="footer-section community">
                <h3 class="h3">Community</h3>
                <ul>
                    <li><a href="#">Area Details</a></li>
                    <li><a href="#">Blog Grid</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Service Areas</a></li>
                    <li><a href="#">Testimonials</a></li>
                </ul>
            </div>
            <!-- Resources -->
            <div class="footer-section resources">
                <h3 class="h3">Resources</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="extra.php">Contact</a></li>
                </ul>
            </div>
            <!-- Newsletter -->
            <div class="footer-section newsletter">
                <h3 class="h3">Subscribe Newsletter</h3>
                <p>Our estimated global carbon emissions by investing in green house</p>
                <form>
                    <input type="email" placeholder="Email Address" required>
                    <button type="submit">Subscribe</button>
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