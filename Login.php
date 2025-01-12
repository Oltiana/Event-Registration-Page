<?php
// Start the session to manage user login
session_start();

// Simulate a database query to check user credentials (replace with actual database logic)
$valid_username = "user"; // Example username
$valid_password = "password123"; // Example password (use hashed passwords in production)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate user credentials (replace this with actual database query and password hashing)
    if ($username == $valid_username && $password == $valid_password) {
        // Successful login
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to a protected page
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tickets</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="pint-logo.png" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="#" class="active">Login</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <!-- Display error message if credentials are incorrect -->
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <div class="remember-me">
                    <label><input type="checkbox" name="remember">Remember me</label>
                    <a href="Forget Password.html">Forget password</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <div class="divider">Or sign in with</div>
            <a href="signin.html" class="google-btn">
                <img src="google.logo.jpg" alt="Google Logo">Google
            </a>
            <div class="register">New user? <a href="Register.html">Register</a></div>
        </div>
    </div>

    <script>
        // Frontend validation
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            if (!username || !password) {
                alert('Both username and password are required!');
                event.preventDefault(); 
            }
        });
    </script>
</body>
</html>

