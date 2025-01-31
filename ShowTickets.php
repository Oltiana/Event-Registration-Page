<?php
session_start();
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM tickets";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/showt.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateTickets.php">Create Tickets</a></li>
            <li><a href="ShowTickets.php" class="active">Show Tickets</a></li>
        </ul>
    </header>

    <div class="tickets-container">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='ticket-item'>";
                echo "<h3>" . htmlspecialchars($row['ticket_type']) . "</h3>";
                echo "<p>Price: €" . $row['Price'] . "</p>";
                echo "<p>Quantity: " . $row['Quantity'] . "</p>";
                echo "<a href='Edit.php?id=" . urlencode($row['id']) . "&type=ticket' class='edit-button'>Edit</a>";
                echo "<a href='Delete.php?id=" . urlencode($row['id']) . "&type=ticket' class='delete-button' onclick=\"return confirm('Are you sure you want to delete this ticket?');\">Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No tickets found.</p>";
        }
        
        $connection->close();
        ?>
    </div>
</body>
</html>
