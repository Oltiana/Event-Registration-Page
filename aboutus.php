<?php
$pageTitle = "About Us";
$menuItems = [
    ["Home", "home.php"],
    ["About Festival", "aboutfestival.php"],
    ["About Us", "#", true],
    ["Tickets", "tickets.php"],
    ["Merchandise", "Merchandise.php"],
    ["Faq", "Faq.php"],
    ["News", "News.php"],
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
    ["https://facebook.com", "icon-facebook.png", "Facebook"],
    ["https://instagram.com", "icon-instagram.png", "Instagram"],
    ["https://youtube.com", "icon-youtube.png", "YouTube"]
];

// Database Connection
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch About Us Data
$aboutUsQuery = "SELECT * FROM aboutus";
$aboutUsResult = $connection->query($aboutUsQuery);

$slides = [];
while ($row = $aboutUsResult->fetch_assoc()) {
    $slides[] = $row;
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/aboutus.css">
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

    <div class="container">
        <div class="slider-container">
            <button class="prev">&lt;</button>
            <div class="slides">
                <?php foreach ($slides as $slide): ?>
                    <div class="slide">
                        <img src="<?php echo htmlspecialchars($slide['image']); ?>" alt="About Us Image">
                        <div class="text-content">
                            <p><?php echo htmlspecialchars($slide['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="next">&gt;</button>
        </div>
    </div>

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

    <script>
        const slides = document.querySelectorAll('.slide');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');

        let currentIndex = 0;

        function updateSlider() {
            const slideWidth = slides[0].clientWidth;
            document.querySelector('.slides').style.transform = `translateX(${-currentIndex * slideWidth}px)`;
        }

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        });

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        });

        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }, 5000); // Auto-slide every 5 seconds
    </script>
</body>
</html>
