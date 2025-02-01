<?php
$pageTitle = "Checkout";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <title><?php echo $pageTitle; ?></title>
    
    <script>
        function validateForm() {
            const firstName = document.getElementById('first-name').value.trim();
            const lastName = document.getElementById('last-name').value.trim();
            const email = document.getElementById('email').value.trim();
            const confirmEmail = document.getElementById('confirm-email').value.trim();
            const phone = document.getElementById('contact-phone').value.trim();
            const address = document.getElementById('address').value.trim();
            const city = document.getElementById('city').value.trim();
            const country = document.getElementById('country').value;

            if (!firstName || !lastName || !email || !confirmEmail || !phone || !address || !city || !country) {
                alert("Please fill in all the required fields!");
                return false;
            }

            if (email !== confirmEmail) {
                alert("Email addresses do not match!");
                return false;
            }

            const checkbox1 = document.getElementById('checkbox1').checked;
            const checkbox2 = document.getElementById('checkbox2').checked;

            if (!checkbox1 || !checkbox2) {
                alert("You must agree to the privacy policy and confirm your information.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>

    <div class="content">
        <div class="form-container">
            <h2>PAYMENT INFORMATION</h2>
            <form method="post" action="process_payment.php" onsubmit="return validateForm()">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first_name" required>

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last_name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="confirm-email">Confirm Email:</label>
                <input type="email" id="confirm-email" name="confirm-email" required>

                <label for="contact-phone">Contact Phone:</label>
                <input type="tel" id="contact-phone" name="phone" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="country">Country:</label>
                <select id="country" name="country" required>
                    <option value="" disabled selected>Select country</option>
                    <option value="kosovo">Kosovo</option>
                    <option value="albania">Albania</option>
                    <option value="usa">USA</option>
                    <option value="other">Other</option>
                </select>

                <div class="section-divider"></div>

                <h2>CONFIRM</h2>
                <div>
                    <input type="checkbox" id="checkbox1" class="custom-checkbox">
                    <label for="checkbox1" class="custom-checkbox-label">* I read and I agree with the privacy policy regulation.</label>

                    <input type="checkbox" id="checkbox2" class="custom-checkbox">
                    <label for="checkbox2" class="custom-checkbox-label">*I reviewed the information on this page and I confirm its validity.</label>
                </div><br>

                <button type="submit" style="background-color: red; color: white; font-size: 18px; padding: 10px 20px; border: none; cursor: pointer;">
                    PAY HERE
                </button>
            </form>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section left">
                <ul>
                    <li>VOLUNTEER</li>
                    <li>SUSTAINABILITY</li>
                    <li>PRIVACY POLICY</li>
                    <li>TERMS OF USE</li>
                </ul>
            </div>
            <div class="footer-section right">
                <p>EMAIL: INFO@PINTFESTIVAL</p>
                <p>REPUBLIKA.TV</p>
                <p>PINT FESTIVAL</p>
                <p>TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Pint Festival. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank">
                    <img src="images/icon-facebook.png" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="images/icon-instagram.png" alt="Instagram">
                </a>
                <a href="https://youtube.com" target="_blank">
                    <img src="images/icon-youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
