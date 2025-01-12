<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Forget Password.css">
    <title>Forget Password</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="pint-logo.png" alt="PINT Festival Logo">
            <p class="festival-name">PINT FESTIVAL</p>
        </div>
    </header>
    <div class="forget-password-form">
        <h2>Forgot Your Password?</h2>
        <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        <form action="forget-password.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <a href="Login.html" class="back-login">Back to login</a>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>