<?php
session_start();
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }       ====================qito qitu te duhetn per session, nese e kupa mire ne secilen faqe==========

$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM aboutus";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/showa.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateAboutUs.php">Create About Us</a></li>
            <li><a href="ShowAboutUs.php" class="active">Show About Us</a></li>
        </ul>
    </header>

    <div class="about-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='about-item'>";
                echo "<img src='" . htmlspecialchars($row['image']) .  "' alt='About Us Image'>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<a href='Edit.php?id=" . urlencode($row['id']) . "&type=aboutus' class='edit-button'>Edit</a>";
                echo "<a href='Delete.php?id=" . urlencode($row['id']) . "&type=aboutus' class='delete-button' onclick=\"return confirm('Are you sure you want to delete this about us image?');\">Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No About Us records found.</p>";
        }
        ?>
    </div>
</body>
</html>
