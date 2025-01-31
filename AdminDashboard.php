<?php
session_start();

// Kontrollo nëse admin është i kyçur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    </head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Admin!</h1>
        <a href="AdminCreateLineup.php">Create Lineup</a>
        <a href="AdminCreateTickets.php">Create Tickets</a>
        <a href="AdminCreateAboutUs.php">About Us</a>
        <a href="ShowPayInfo.php">Payment Info</a>
    </div>
</body>
</html>