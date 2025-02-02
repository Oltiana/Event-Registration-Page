<?php
require_once 'session_check.php';
checkLogin();
$currentPage = 'Home';

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

$pageTitle = "Home";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $serverName = "localhost"; 
    $dbUser = "root"; 
    $password = ""; 
    $dbName = "projekt";
    $conn = new mysqli($serverName, $dbUser, $password, $dbName); 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM home"; // Përdorni këtë query për të marrë të dhënat nga tabela "home"
    $result = $conn->query($sql);
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <title>Home - PINT Festival</title>
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main class="hero-section">
        <?php 
        if ($result->num_rows > 0) {
            // Merrni të dhënat e imazhit dhe titullit nga baza e të dhënave
            while($row = $result->fetch_assoc()) {
                $image = $row['image'];
                
                // Shfaqni imazhin dhe titullin
                echo '<img src="' . $image . '" alt="' . $title . '" class="Home Image">';
                echo '<div class="hero-text">';
                echo '<h1>' . $title . '</h1>';
                echo '<p>NOVEMBER 8-11</p>'; // Mund ta ndryshoni nëse dëshironi
                echo '</div>';
            }
        } else {
            echo '<p>No home content available.</p>';
        }
        ?>
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
