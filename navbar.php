<nav class="navbar">
    <div class="logo">
        <img src="images/pintlogo.webp" alt="PINT FESTIVAL Logo">
        PINT FESTIVAL
    </div>
    
    <ul class="nav-links">
        <li><a href="home.php" <?php echo ($currentPage == 'home') ? 'class="active"' : ''; ?>>Home</a></li>
        <li><a href="aboutfestival.php" <?php echo ($currentPage == 'aboutfestival') ? 'class="active"' : ''; ?>>About Festival</a></li>
        <li><a href="aboutus.php" <?php echo ($currentPage == 'aboutus') ? 'class="active"' : ''; ?>>About Us</a></li>
        <li><a href="tickets.php" <?php echo ($currentPage == 'tickets') ? 'class="active"' : ''; ?>>Tickets</a></li>
        <li><a href="merchandise.php" <?php echo ($currentPage == 'merchandise') ? 'class="active"' : ''; ?>>Merchandise</a></li>
        <li><a href="faq.php" <?php echo ($currentPage == 'faq') ? 'class="active"' : ''; ?>>Faq</a></li>
        <li><a href="news.php" <?php echo ($currentPage == 'news') ? 'class="active"' : ''; ?>>News</a></li>
        <li><a href="logout.php" <?php echo ($currentPage == "logout") ? 'class = "active"' : '';?>>Sign Out</a></li>
    </ul>
</nav>