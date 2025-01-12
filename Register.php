<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/Register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/pint-logo.png" alt="PINT Festival Logo">
            <p class="festival-name">PINT FESTIVAL</p>
        </div>
        <ul class="nav-links"></ul>
    </header>
    <div class="register-form">
        <h2>Register</h2>
        <form id="registerForm">
            <input type="text" id="fullName" placeholder="Full name" required>
            <input type="email" id="email" placeholder="E-mail" required>
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <input type="password" id="confirmPassword" placeholder="Confirm password" required>
            <a href="login.html" class="back-login">Back to login</a>
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); 

            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!fullName || !email || !username || !password || !confirmPassword) {
                alert('Të gjitha fushat janë të detyrueshme.');
                return;
            }
n
            if (password !== confirmPassword) {
                alert('Fjalëkalimet nuk përputhen.');
                return;
            }

            if (password.length < 6) {
                alert('Fjalëkalimi duhet të ketë të paktën 6 karaktere.');
                return;
            }

            alert('Regjistrimi u krye me sukses!');
            this.submit(); 
        });
    </script>
</body>
</html>