<?php
    $pageTitle = "News";
    $festivalName = "PINT FESTIVAL";
    $contactEmail = "INFO@PINTFESTIVAL";
    $address = "TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE";
    $newsItems = [
        "Exclusive: MC Kresha talks about PINT's newest album. \"United State of Albania\".",
        "\"Amore\" by Lyrical Son, Lav'da and MC Kresha is released.",
        "MC Kresha, Lyrical Son, Semiautomvtic, Kreshnique and NS release the song \"Beirut\" on YouTube.",
        "\"Dilêm jasht\", the new musical project by Lyrical Son and MC Kresha, is launched."
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="CSS/News.css">
    <script src="JS/script.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Images/pintlogo.webp" alt="<?php echo $festivalName; ?> Logo">
                <span><?php echo $festivalName; ?></span>
            </div>
            <ul class="nav-links">
                <li><a href="Home.php">Home</a></li>
                <li><a href="#">About Festival</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="Tickets.php">Tickets</a></li>
                <li><a href="#">Merchandise</a></li>
                <li><a href="#">Faq</a></li>
                <li><a href="#" class="active">News</a></li>
                <li><a href="Login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="news-section">
        <div class="news-header">
            <h1>NEWS</h1>
        </div>
        <div class="news-items">
            <?php foreach ($newsItems as $news) : ?>
                <div class="news-item">
                    <p><strong><?php echo $news; ?></strong></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-section left">
                <ul>
                    <li><a href="#">VOLUNTEER</a></li>
                    <li><a href="#">SUSTAINABILITY</a></li>
                    <li><a href="#">PRIVACY POLICY</a></li>
                    <li><a href="#">TERMS OF USE</a></li>
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
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            console.log("News page loaded");
        });
    </script>
</body>
</html>


    
 
    
 

  