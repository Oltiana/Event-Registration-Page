<?php
session_start();


$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM news ORDER BY created_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/ShowNews.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateNews.php">Create News</a></li>
            <li><a href="CSS/ShowNews.php" class="active">Show News</a></li>
        </ul>
    </header>

    <div class="news-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='news-item'>";
                echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                echo "<small>Published on: " . htmlspecialchars($row['created_at']) . "</small>";
                echo "<a href='Edit.php?id=" . urlencode($row['id']) . "&type=news' class='edit-button'>Edit</a>";
                echo "<a href='Delete.php?id=" . urlencode($row['id']) . "&type=news' class='delete-button' onclick=\"return confirm('Are you sure you want to delete this ticket?');\">Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No news records found.</p>";
        }
        ?>
    </div>
</body>
</html>