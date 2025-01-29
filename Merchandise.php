<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "pint_festival";

$exchangeRateToEuro = 0.91;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $conn->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category VARCHAR(50) NOT NULL,
            image VARCHAR(255) NOT NULL,
            title VARCHAR(100) NOT NULL,
            description TEXT NOT NULL,
            price DECIMAL(10,2) NOT NULL
        )
    ");

    $stmt = $conn->query("SELECT COUNT(*) FROM products");
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $sql = "INSERT INTO products (category, image, title, description, price) VALUES
            ('hoodies', 'duksi1.png', 'Pint Festival Hoodie', 'Get your official festival hoodie in black or white.', 35),
            ('hoodies', 'duksi2.png', 'Pint Festival Hoodie', 'Get your official festival hoodie in black or white.', 40),
            ('hoodies', 'duksi3.png', 'Pint Festival Hoodie', 'Get your official festival hoodie in black or white.', 30),
            ('cases', 'case1.png', 'Pint Festival Phone Case', 'Protect your phone with these stylish Pint Festival cases!', 15),
            ('cases', 'case21.png', 'Pint Festival Phone Case', 'Protect your phone with these stylish Pint Festival cases!', 13),
            ('cases', 'case31.png', 'Pint Festival Phone Case', 'Protect your phone with these stylish Pint Festival cases!', 20),
            ('tshirts', 'maica1.png', 'Pint Festival T-Shirt', 'Lightweight and comfy, available in multiple colors!', 25),
            ('tshirts', 'maica22.png', 'Pint Festival T-Shirt', 'Lightweight and comfy, available in multiple colors!', 30),
            ('tshirts', 'maica31.png', 'Pint Festival T-Shirt', 'Lightweight and comfy, available in multiple colors!', 20)";
        $conn->exec($sql);
    }
} catch (PDOException $e) {
    die("Lidhja me databazën dështoi: " . $e->getMessage());
}

try {
    $stmt = $conn->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gabim gjatë marrjes së të dhënave: " . $e->getMessage());
}
?>

<?php
session_start();
if (isset($_POST['buy_now'])) {
    $product = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $product;

    header("Location: view-cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PINT Festival - Merchandise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Merchandise.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="pint-logo.png" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="Home.php">Home</a></li>
            <li><a href="aboutfestival.php">About Festival</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="Tickets.php">Tickets</a></li>
            <li><a href="#" class="active">Merchandise</a></li>
            <li><a href="faq.php">Faq</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>
    <main>
        <section class="product-section">
            <h2>Pint Festival Hoodies</h2>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php if ($product['category'] === 'hoodies'): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Hoodie">
                            <p><strong><?php echo htmlspecialchars($product['title']); ?></strong></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <p><strong>€<?php echo htmlspecialchars(number_format($product['price'] * $exchangeRateToEuro, 2)); ?></strong></p>
                            <form method="post" action="">
                                <input type="hidden" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
                                <input type="hidden" name="description" value="<?php echo htmlspecialchars($product['description']); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                                <button type="submit" name="buy_now" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="product-section">
            <h2>Pint Festival Phone Cases</h2>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php if ($product['category'] === 'cases'): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="Phone Case">
                            <p><strong><?php echo htmlspecialchars($product['title']); ?></strong></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <p><strong>€<?php echo htmlspecialchars(number_format($product['price'] * $exchangeRateToEuro, 2)); ?></strong></p>
                            <form method="post" action="">
                                <input type="hidden" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
                                <input type="hidden" name="description" value="<?php echo htmlspecialchars($product['description']); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                                <button type="submit" name="buy_now" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="product-section">
            <h2>Pint Festival T-Shirts</h2>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <?php if ($product['category'] === 'tshirts'): ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="T-Shirt">
                            <p><strong><?php echo htmlspecialchars($product['title']); ?></strong></p>
                            <p><?php echo htmlspecialchars($product['description']); ?></p>
                            <p><strong>€<?php echo htmlspecialchars(number_format($product['price'] * $exchangeRateToEuro, 2)); ?></strong></p>
                            <form method="post" action="">
                                <input type="hidden" name="title" value="<?php echo htmlspecialchars($product['title']); ?>">
                                <input type="hidden" name="description" value="<?php echo htmlspecialchars($product['description']); ?>">
                                <input type="hidden" name="price" value="<?php echo htmlspecialchars($product['price']); ?>">
                                <input type="hidden" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                                <button type="submit" name="buy_now" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
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
