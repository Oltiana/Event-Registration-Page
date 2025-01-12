<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assume you have a function to check if the email exists and send the reset instructions
    $email = $_POST['email'];
    
    // Your logic to check if the email exists in the database
    $userExists = true; // For demonstration purposes, set to true (you should query the database)
    
    if ($userExists) {
        // Logic to send a password reset email
        // Example: mail($email, "Password Reset", "Click this link to reset your password...");
        echo "<p>An email has been sent with instructions to reset your password.</p>";
    } else {
        echo "<p>This email address is not registered.</p>";
    }
}
?>

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
        <form action="" method="POST">
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <a href="Login.html" class="back-login">Back to login</a>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
