<?php
//session_start();
require_once 'session_check.php';
checkAlreadyLoggedIn();
if(isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error){
    die("Connection failed??" . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);


    if (empty($email) || empty($password)) {
        $errorMessage = "Both email and password are required!";
        
    } else {
        $sql = "SELECT * FROM festival_users WHERE email = '$email'";
        $result = $connection->query($sql);

        if($result->num_rows > 0){

            $user = $result->fetch_assoc();

        if ($password === $user['password']) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if(trim($user['role']) === "admin"){
                header("Location: AdminDashboard.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            $errorMessage = "Invalid email or password!";
        }
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
                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="remember-me">
                    <label><input type="checkbox">Remember me</label>
                    <a href="Forget Password.php">Forget password</a>
                </div>
                <a href="home.php"><button type="submit">Sign In</button>
            </form>
            <div class="signup">New user? <a href="SignUp.php">Register</a></div>
        </div>
    </div>  
</body>
</html>
