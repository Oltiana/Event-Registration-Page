<?php
    $pageTitle = "Home";
    $festivalName = "PINT FESTIVAL";
    $eventDates = "8,9,10 FEBRUARY";
    $contactEmail = "INFO@PINTFESTIVAL";
    $address = "TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <script src="JS/script.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar">
    <?php session_start(); ?>

            <div class="logo">
                <img src="Images/pintlogo.webp" alt="<?php echo $festivalName; ?> Logo">
                <?php echo $festivalName; ?>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="aboutfestival.php">About Festival</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="Tickets.php">Tickets</a></li>
                <li><a href="merchandise.php">Merchandise</a></li>
                <li><a href="faq.php">Faq</a></li>
                <li><a href="News.php">News</a></li>            
            </ul>
        </nav>
    </header>

    <main class="hero-section">
        <img src="Images/kresha-lyrical-son.jpg.jpg" alt="<?php echo $festivalName; ?>" class="background-image">
        <div class="hero-text">
            <h1>PËR INATI T'NJONIT TJETRIT</h1>
            <p><?php echo $eventDates; ?></p>
        </div>
    </main>
    
    <div class="section-divider"></div>
    
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
                <p>EMAIL: <?php echo $contactEmail; ?></p>
                <p>REPUBLIKA.TV</p>
                <p><?php echo $festivalName; ?></p>
                <p><?php echo $address; ?></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> <?php echo $festivalName; ?>. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank">
                    <img src="Images/icon-facebook.png" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="Images/icon-instagram.png" alt="Instagram">
                </a>
                <a href="https://youtube.com" target="_blank">
                    <img src="Images/icon-youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>

