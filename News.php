<?php
$pageTitle = "News";
$festivalName = "PINT FESTIVAL";
$contactEmail = "INFO@PINTFESTIVAL";
$address = "TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE";


$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$sql = "SELECT title, created_at FROM news ORDER BY created_at DESC";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    $newsItems = [];
    while ($row = $result->fetch_assoc()) {
        $newsItems[] = $row;
    }
} else {
    $newsItems = [];
}

$connection->close();
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
                <li><a href="aboutfestival.php">About Festival</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="Tickets.php">Tickets</a></li>
                <li><a href="Merchandise.php">Merchandise</a></li>
                <li><a href="Faq.php">Faq</a></li>
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
            <?php if (!empty($newsItems)): ?>
                <?php foreach ($newsItems as $news): ?>
                    <div class="news-item">
                        <h3><?php echo htmlspecialchars($news['title']); ?></h3>
                        <p><em><?php echo date("F j, Y, g:i a", strtotime($news['created_at'])); ?></em></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No news available at the moment.</p>
            <?php endif; ?>
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