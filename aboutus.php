<?php
$pageTitle = "About Us";

$menuItems = [
    ["Home", "home.php"],
    ["About Festival", "aboutfestival.php"],
    ["About Us", "#", true],
    ["Tickets", "Tickets.php"],
    ["Merchandise", "Merchandise.php"],
    ["Faq", "Faq.php"],
    ["News", "news.php"],
    ["Login", "login.php"]
];
$sliderImages = [
    ["images/mckresha.jpeg", "Mc Kresha"],
    ["images/lyricalson.jpeg", "Lyrical Son"],
    ["images/singullari.jpg", "Singullar"],
    ["images/llun.jpg", "Lluni"]
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
        <div class="box">
            <div class="slider-container">
                <div class="slides">
                    <?php foreach ($sliderImages as $slide): ?>
                        <div class="slide">
                            <img src="<?php echo htmlspecialchars($slide[0]); ?>" alt="<?php echo htmlspecialchars($slide[1]); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prev">&lt;</button>
                <button class="next">&gt;</button>
            </div>
        </div>

        <div class="text">
            <p id="txt">
                <span>PINT</span> aka Për Inati t'Njoni Tjetrit, është grup i krijuar në vitin 2010 si shtëpi e artistëve të ndryshëm; prej atyre që sot janë ikona muzikore e deri te ata që do të jenë ikonat e së ardhmes. Për herë të parë u zyrtarizua më 16 Gusht 2011, duke lançuar albumin e <em>“Mc Kresha & Lyrical Son - Për inati t'njoni tjetrit”</em>. Përgjegjësitë dhe drejtimi i punës së PINT është cilësia e lartë e produkteve muzikore, që do të lançohen në tregun mbarë Shqiptarë dhe Internacional.
            </p>
        </div>
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
    <script>
        const slides = document.querySelector('.slides');
        const slideCount = document.querySelectorAll('.slide').length;
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');

        let currentIndex = 0;

        function updateSlider() {
            slides.style.transform = `translateX(${-currentIndex * 100}%)`;
        }

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slideCount; 
            updateSlider();
        });

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slideCount) % slideCount; 
            updateSlider();
        });
    </script>
</body>
</html>