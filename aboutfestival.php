<?php
$pageTitle = "About Festival";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/aboutfestival.css">
    <title><?php echo $pageTitle?></title>
</head>
<body>
    <header> 
        <div class = "logo">
            <img src = "images/pintlogo.webp" alt= "Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class = "nav-links">
            <li><a href= "Home.php">Home</a></li>
            <li><a href= "#" class = "active">About Festival</a></li>
            <li><a href= "aboutus.php">About Us</a></li>
            <li><a href= "tickets.php">Tickets</a></li>
            <li><a href= "#">Merchandise</a></li>
            <li><a href= "#">Faq</a></li>
            <li><a href= "#">News</a></li>
            <li><a href= "login.php">Login</a></li>
        </ul>
    </header>

    <section class="line-up">
        <h2>LINE-UP</h2>
        <div class="artists">
            <?php
            $artists = [
                ['name' => 'Mc Kresha', 'image' => '<images/mc_kresha.jpg'],
                ['name' => 'Lyrical Son', 'image' => 'images/lyrical_son.jpg'],
                ['name' => 'Lluni', 'image' => 'images/Lluni.jpg'],
                ['name' => 'Dua Lipa', 'image' => 'images/dua_lipa.jpg'],
                ['name' => 'Lumi B', 'image' => 'images/LumiB.jpg'],
                ['name' => 'Ledri', 'image' => 'images/ledri.jpg'],
                ['name' => 'Dafina Zeqiri', 'image' => 'images/Dafina_Zeqiri.jpg'],
                ['name' => 'Tayna', 'image' => 'images/Tayna.jpg'],
                ['name' => 'Era Istrefi', 'image' => 'images/Era_Istrefi.jpg'],
                ['name' => 'Elinel', 'image' => 'images/Elinel.jpg'],
                ['name' => 'Gjiko', 'image' => 'images/gjiko.jpg'],
                ['name' => 'Singullar', 'image' => 'images/singullari.jpg'],
                ['name' => 'Kida', 'image' => 'images/Kida.jpg'],
                ['name' => 'DJ PM & DAGZ', 'image' => 'images/dj pm & dj dagz.jpg'],
                ['name' => 'Dhurata Dora', 'image' => 'images/dhurata-dora.jpg'],
                ['name' => 'Fifi', 'image' => 'images/fifi.jpg'],
                ['name' => 'Majk', 'image' => 'images/Majk.jpg'],
                ['name' => 'Capital T', 'image' => 'images/Capital_t.jpg'],
            ];

            foreach ($artists as $artist) {
                echo '<div class="artist">';
                echo '<img src="' . $artist['image'] . '" alt="' . $artist['name'] . '">';
                echo '<h3>' . $artist['name'] . '</h3>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <div class = "section-divider"></div>

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