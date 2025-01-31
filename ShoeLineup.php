<?php
session_start();
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM line_up";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/showl.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lineup - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateLineup.php">Create Lineup</a></li>
            <li><a href="ShowLineup.php" class="active">Show Lineup</a></li>
        </ul>
    </header>

    <div class="lineup-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='lineup-item'>";
                echo "<img src='" . htmlspecialchars($row['image_path']) .  "'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<a href='Edit.php?id=" . urlencode($row['ID']) . "&type=lineup' class='edit-button'>Edit</a>";
                echo "<a href='Delete.php?id=" . urlencode($row['ID']) . "&type=lineup' class='delete-button' onclick=\"return confirm('Are you sure you want to delete this lineup item?');\">Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No lineup records found.</p>";
        }
        ?>
    </div>
</body>
</html>