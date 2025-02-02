<?php
session_start();
$errorMessage = "";
$successMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$connection = new mysqli($serverName, $dbUser, $password, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$tableCheck = $connection->query("SHOW TABLES LIKE 'merchandise'");
if ($tableCheck->num_rows == 0) {
    die("Tabela `merchandise` nuk ekziston në databazë!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = trim($_POST['category']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    if (empty($category) || empty($title) || empty($description) || empty($price) || empty($_FILES['image']['name'])) {
        $errorMessage = "All fields are required!";
    } elseif (!is_numeric($price) || $price <= 0) {
        $errorMessage = "Price must be a positive number!";
    } else {
        $targetDir = "Images/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        $imageName = basename($_FILES["image"]["name"]);
        $imageName = str_replace(" ", "_", $imageName); 
        $targetFilePath = $targetDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            $errorMessage = "Only JPG, JPEG, PNG, and GIF files are allowed!";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $stmt = $connection->prepare("INSERT INTO merchandise (category, image, title, description, price) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssd", $category, $imageName, $title, $description, $price);

                if ($stmt->execute()) {
                    $successMessage = "Product added successfully!";
                } else {
                    $errorMessage = "Error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $errorMessage = "There was an error uploading the file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/AdminCreateMerchandise.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Merchandise - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateMerchandise.php" class="active">Create Merchandise</a></li>
            <li><a href="ShowMerchandise.php">Show Merchandise</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create Merchandise</h2>

            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($successMessage)): ?>
                <div class="success-message">
                    <?php echo htmlspecialchars($successMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="category" placeholder="Category (hoodies, cases, tshirts)" required>
                <input type="file" name="image" required>
                <input type="text" name="title" placeholder="Title" required>
                <input type="text" name="description" placeholder="Description" required>
                <input type="number" step="0.01" name="price" placeholder="Price (€)" required>
                <button type="submit">Create Merchandise</button>
            </form>
        </div>
    </div>
</body>
</html>
