<?php
session_start();

$errorMessage = "";
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "olta";

$connection = new mysqli($serverName, $username, $password, $dbName);

if ($connection->connect_error){
    die("Connection failed??" . $connection->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM festival_users WHERE username = '$username'";
    $result = $connection->query($sql);

    if (empty($username) || empty($password)) {
        $errorMessage = "Both username and password are required!";
    } else {
        if ($username == "admin" && $password == "Admin123") {
            $_SESSION['username'] = $username;
            header("Location: Tickets.php"); 
            exit();
        } else {
            $errorMessage = "Invalid username or password!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars("Login - Pint Festival"); ?></title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="#" class="active">Login</a></li>
        </ul>
    </header>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form id="loginForm" method="post" action="">
                <input type="text" name="username" id="username" placeholder="Username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="remember-me">
                    <label><input type="checkbox">Remember me</label>
                    <a href="Forget Password.html">Forget password</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="divider">Or sign in with</div>
            <a href="signin.php" class="google-btn">
                <img src="images/google.logo.jpg" alt="Google Logo">Google
            </a>
            <div class="register">New user? <a href="Register.php">Register</a></div>
        </div>
    </div>
</body>
</html>