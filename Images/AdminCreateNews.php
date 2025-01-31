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
    <title>Create News - Admin</title>
    <style>
       
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}


header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    height: 40px;
    margin-right: 10px;
}

.logo span {
    font-size: 1.5rem;
    font-weight: bold;
    color: black;
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links a {
    text-decoration: none;
    color: black;
    font-size: 1rem;
}

.nav-links a.active {
    color: red;
    font-weight: bold;
}


.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    width: 100%;
}

.login-box {
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 400px;
    text-align: center;
}

.login-box h2 {
    margin-bottom: 20px;
    font-size: 1.5rem;
}

.login-box input, .login-box textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.login-box textarea {
    height: 100px;
    resize: none;
}

.login-box button {
    width: 100%;
    padding: 10px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}

.login-box button:hover {
    background-color: darkred;
}


.error-message {
    color: red;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

    </style>
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