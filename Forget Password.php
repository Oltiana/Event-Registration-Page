<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "projekt"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Gabim me lidhjen e databazës: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM forgetpassword WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE forgetpassword SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);
            if ($stmt->execute()) {
                header("Location: home.php");
                exit();
            } else {
                echo "<script>alert('Gabim gjatë ndryshimit të fjalëkalimit.');</script>";
            }
        } else {
            echo "<script>alert('Email-i nuk ekziston.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/ForgetPassword.css">
    <title>Forget Password</title>
   
</head>
<body>
    <header>
        <div class="logo">
            <img src="pint-logo.png" alt="Logo">
            <span>PINT FESTIVAL</span>
        </div>
    </header>
    <div class="forget-password-form">
        <h2>Forgot Your Password?</h2>
        <p>Enter your email and password to reset your password.</p>
        <form action="" method="POST" id="passwordForm">
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <div class="error-message" id="emailError"></div>
            <input type="password" id="password" name="password" placeholder="New password" required>
            <div class="error-message" id="passwordError"></div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('passwordForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');

        form.addEventListener('submit', function (e) {
            let isValid = true;
            emailError.textContent = '';
            passwordError.textContent = '';
            if (!emailInput.value.includes('@')) {
                emailError.textContent = 'Futni një email të vlefshëm!';
                isValid = false;
            }
            const password = passwordInput.value;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasMinLength = password.length >= 6;

            if (!hasUppercase) {
                passwordError.textContent = 'Fjalëkalimi duhet të ketë të paktën një shkronjë të madhe!';
                isValid = false;
            } else if (!hasNumber) {
                passwordError.textContent = 'Fjalëkalimi duhet të ketë të paktën një numër!';
                isValid = false;
            } else if (!hasMinLength) {
                passwordError.textContent = 'Fjalëkalimi duhet të ketë të paktën 6 karaktere!';
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault(); 
            }
        });
    </script>
</body>
</html>
