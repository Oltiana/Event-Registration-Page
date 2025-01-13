<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "Guest User"; 
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In with Google</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/pintlogo.webp" alt="PINT FESTIVAL Logo">
        </div>
        <div class="title">
            <?php
                $appName = "PINT FESTIVAL";
                echo "Choose an account<p>to continue to <b>$appName</b></p>";
            ?>
        </div>
        <div class="account">
            <img src="images/user-icon.jpg" alt="User Icon">
            <div class="account-info">
                <?php
                    echo "<span>" . htmlspecialchars($_SESSION['username']) . "</span>";
                ?>
            </div>
        </div>
        <div class="account">
            <div class="account-info">
                <span>Use another account</span>
            </div>
        </div>
        <div class="link">
            <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a>
        </div>
        <div class="footer">
            <form method="post">
                <select name="language">
                    <?php
                        $languages = [
                            "English (United States)",
                            "Afrikaans",
                            "Bosanski",
                            "Dansk",
                            "Deutsch",
                            "English (United Kingdom)",
                            "Español",
                            "Français (Canada)",
                            "Français (France)",
                            "Italiano"
                        ];
                        foreach ($languages as $language) {
                            echo "<option>$language</option>";
                        }
                    ?>
                </select>
            </form>
        </div>
    </div>
</body>
</html>