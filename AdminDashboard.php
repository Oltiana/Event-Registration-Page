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
    <link rel="stylesheet" href="CSS/AdminDashboard.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/pintlogo.webp" alt="PINT FESTIVAL Logo">
            PINT FESTIVAL
        </div>
        
        <ul class="nav-links">
            <li class="user-dropdown">
                <?php if(isset($_SESSION['username'])): ?>
                    <button class="dropdown-btn">
                        <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                    </button>
                    <div class="dropdown-content">
                        <a href="logout.php">Sign Out</a>
                    </div>
                <?php endif; ?>
            </li>
        </ul>
    </nav>

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


    <script>
    document.querySelector('.dropdown-btn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.user-dropdown').classList.toggle('active');
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-dropdown')) {
            document.querySelector('.user-dropdown').classList.remove('active');
        }
    });
    </script>
</body>
</html>