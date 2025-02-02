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
$sql = "SELECT * FROM merchandise";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/ShowMerchandise.css">
    <title>Show Merchandise - PINT Festival</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="Pint Festival Logo">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateMerchandise.php">Create Merchandise</a></li>
            <li><a href="ShowMerchandise.php" class="active">Show Merchandise</a></li>
        </ul>
    </header>

    <main>
        <div class="merchandise-container">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='merchandise-item'>";
                    echo "<img src=' Images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['title']) . "'>";
                    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                    echo "<p>Category: <strong>" . htmlspecialchars($row['category']) . "</strong></p>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p class='price'>€" . htmlspecialchars(number_format($row['price'], 2)) . "</p>";
                    echo "<a href='Edit.php?id=" . urlencode($row['id']) . "&type=merchandise' class='edit-button'>Edit</a>";
                echo "<a href='Delete.php?id=" . urlencode($row['id']) . "&type=merchandise' class='delete-button' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No merchandise found.</p>";
            }
            $connection->close();
            ?>
        </div>
    </main>
</body>
</html>
