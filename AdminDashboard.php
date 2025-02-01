<?php
session_start();

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
    <link rel="stylesheet" href="CSS/AdminDashboard.css">
    <title>Admin Dashboard</title>
    </head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Admin!</h1>
        <a href="AdminCreateLineup.php">Create Lineup</a>
        <a href="AdminCreateTickets.php">Create Tickets</a>
        <a href="AdminCreateAboutUs.php">About Us</a>
        <a href="ShowTransactions.php">Payment Info</a>
        <a href="AdminCreateMerchandise.php">Create Merchandise</a>
        <a href="AdminCreateNews.php">Create News</a>
        <a href="admin_faq.php">Create Faq</a>
    </div>
</body>
</html>