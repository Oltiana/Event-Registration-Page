<?php
// PHP logic to handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    
    // Example email validation (in a real scenario, you'd check the email against the database)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Ju lutem shkruani një email të vlefshëm.";
    } else {
        // Here you can send a password reset email (this is just a placeholder)
        // Example: mail($email, "Password Reset", "Click the link to reset your password.");
        $success_message = "Udhëzimet për rivendosjen e fjalëkalimit u dërguan me sukses!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Forget Password.css">
    <title>Forget Password</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="PINT Festival Logo">
            <p class="festival-name">PINT FESTIVAL</p>
        </div>
    </header>
    <div class="forget-password-form">
        <h2>Forgot Your Password?</h2>
        <p>Enter your email address and we will send you instructions on how to reset your password.</p>

        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php elseif (isset($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <form id="forgetPasswordForm" action="" method="POST">
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <a href="Login.html" class="back-login">Back to login</a>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        // Frontend form validation
        document.getElementById('forgetPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission to handle validation
            
            const email = document.getElementById('email').value.trim();

            if (!email) {
                alert('Ju lutem shkruani email-in tuaj.');
                return;
            }

            const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
            if (!emailPattern.test(email)) {
                alert('Ju lutem shkruani një email të vlefshëm.');
                return;
            }

            // If email is valid, submit the form
            alert('Udhëzimet për rivendosjen e fjalëkalimit u dërguan me sukses!');
            this.submit(); // Submit the form
        });
    </script>
</body>
</html>
