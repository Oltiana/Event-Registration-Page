<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$connection = new mysqli($serverName, $dbUser, $password, $dbName);


if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $newsTitle = trim($_POST['news_title']);
    $createdAt = date("Y-m-d H:i:s");

   
    if (empty($newsTitle)) {
        $errorMessage = "All fields are required!";
    }else {
        
        $sql = "INSERT INTO news (title, created_at) VALUES (?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $newsTitle, $createdAt);

        if ($stmt->execute()) {
            $stmt->close();
            $connection->close();
            header("Location: ShowNews.php");
            exit();
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/AdminCreateNews.css">
    <title>Create News - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateNews.php" class="active">Create News</a></li>
            <li><a href="ShowNews.php">Show News</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create News</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <input type="text" name="news_title" placeholder="Add News" required>
                <button type="submit">Add News</button>
            </form>
        </div>
    </div>
</body>
</html>