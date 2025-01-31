<?php
$pageTitle = "Festival Line-Up";

session_start();

$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM line_up";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/aboutfestival.css">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="#" class="active">About Festival</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li><a href="Merchandise.php">Merchandise</a></li>
            <li><a href="Faq.php">Faq</a></li>
            <li><a href="News.php">News</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>

    <section class="line-up">
        <h2>LINE-UP</h2>
        <div class="artists">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="artist">';
                    echo '<img src="' . htmlspecialchars($row['image_path']) .'">';
                    echo '<p>' . htmlspecialchars($row['name']) .'</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No lineup records found.</p>";
            }
            ?>
        </div>
    </section>

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
                    <img src="icon-facebook.png" alt="Facebook">
                </a>
                <a href="https://instagram.com" target="_blank">
                    <img src="icon-instagram.png" alt="Instagram">
                </a>
                <a href="https://youtube.com" target="_blank">
                    <img src="icon-youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </footer>
</body>
</html>