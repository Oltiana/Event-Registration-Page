<?php
$pageTitle = "Tickets";

session_start();

$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM tickets";
$result = $connection->query($sql);

$menuItems = [
    ["Home", "Home.php"],
    ["About Festival", "aboutfestival.php"],
    ["About Us", "aboutus.php"],
    ["Tickets", "#", true],
    ["Merchandise", "#"],
    ["Faq", "#"],
    ["News", "#"],
    ["Login", "login.php"]
];

$footerLinks = [
    "VOLUNTEER",
    "SUSTAINABILITY",
    "PRIVACY POLICY",
    "TERMS OF USE"
];

$contactInfo = [
    "EMAIL: INFO@PINTFESTIVAL",
    "REPUBLIKA.TV",
    "PINT FESTIVAL",
    "TAHIR ZAJMI, KOSOVATEX, PRISHTINE 10000 KOSOVE"
];

$socialLinks = [
    ["https://facebook.com", "images/icon-facebook.png", "Facebook"],
    ["https://instagram.com", "images/icon-instagram.png", "Instagram"],
    ["https://youtube.com", "images/icon-youtube.png", "YouTube"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/tickets.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($item[1]); ?>" <?php echo !empty($item[2]) && $item[2] ? 'class="active"' : ''; ?>>
                        <?php echo htmlspecialchars($item[0]); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </header>

    <section class="tickets-section">
        <div class="tickets-header">TICKETS</div>
        <div class="ticket-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="ticket">
                        <div class="ticket-title"> <?php echo htmlspecialchars($row['ticket_type']); ?> </div>
                        <div class="ticket-price"> <?php echo "<p> €" . $row['Price'] . "</p>"?> </div>
                        <a href="buyTickets.php" class="buy-button">BUY NOW</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No tickets available.</p>
            <?php endif; ?>
        </div>
        <div class="section-divider"></div>
        <footer>
            <div class="footer-container">
                <div class="footer-section left">
                    <ul>
                        <?php foreach ($footerLinks as $link): ?>
                            <li><?php echo htmlspecialchars($link); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="footer-section right">
                    <?php foreach ($contactInfo as $info): ?>
                        <p><?php echo htmlspecialchars($info); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Pint Festival. All rights reserved.</p>
                <div class="social-icons">
                    <?php foreach ($socialLinks as $social): ?>
                        <a href="<?php echo htmlspecialchars($social[0]); ?>" target="_blank">
                            <img src="<?php echo htmlspecialchars($social[1]); ?>" alt="<?php echo htmlspecialchars($social[2]); ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </footer>
    </section>
</body>
</html>
