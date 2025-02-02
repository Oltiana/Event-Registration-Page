<?php
$pageTitle = "Festival Merchandise";

session_start();

$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM merchandise ORDER BY id ASC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINT Festival - Merchandise btf</title>
    <link rel="stylesheet" href="CSS/merchandise.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="aboutfestival.php">About Festival</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="Tickets.php">Tickets</a></li>
            <li><a href="#" class="active">Merchandise</a></li>
            <li><a href="Faq.php">Faq</a></li>
            <li><a href="News.php">News</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>
    <main>
        <section class="product-section">
            <h2>Festival Merchandise</h2>
            <div class="product-grid">
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product-card">';
                        echo '<img src="Images/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                        echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                        echo '<p class="description">' . htmlspecialchars($row['description']) . '</p>';
                        echo '<p class="price">€' . htmlspecialchars(number_format($row['price'], 2)) . '</p>';
                        echo '<form method="post" action="view-cart.php">';
                        echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">';
                        echo '<input type="hidden" name="title" value="' . htmlspecialchars($row['title']) . '">';
                        echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                        echo '<input type="hidden" name="image" value="' . htmlspecialchars($row['image']) . '">';
                        echo '<input type="hidden" name="quantity" value="1">';
                        echo '<button type="submit" class="btn">Buy</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No merchandise available at the moment.</p>";
                }
                ?>
            </div>
        </section>
    </main>
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
        </div>
    </footer>
</body>
</html>
