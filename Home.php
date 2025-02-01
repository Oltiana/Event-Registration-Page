<?php
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$conn = new mysqli($serverName, $dbUser, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, image FROM home";
$result = $conn->query($sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINT Festival</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="Images/pintlogo.webp" alt="PINT Festival Logo">
                PINT FESTIVAL
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="aboutfestival.php">About Festival</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="Tickets.php">Tickets</a></li>
                <li><a href="Merchandise.php">Merchandise</a></li>
                <li><a href="Faq.php">Faq</a></li>
                <li><a href="News.php">News</a></li>
                <li><a href="Login.php">Sign in</a></li>
            </ul>
        </nav>
    </header>
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
            <p>&copy; <?php echo date("Y"); ?> PINT FESTIVAL. All rights reserved.</p>
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