<?php
session_start();

$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt"; 

$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("❌ Connection failed: " . $connection->connect_error);
}

$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    $role = "user";

    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errorMessage = "⚠️ All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "⚠️ Invalid email format!";
    } elseif ($password !== $confirm_password) {
        $errorMessage = "⚠️ Passwords do not match!";
    } else {
        $checkUserSql = "SELECT * FROM singup WHERE email = '$email' OR username = '$username'";
        $result = $connection->query($checkUserSql);

        if ($result->num_rows > 0) {
            $errorMessage = "⚠️ Email or username already exists!";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO singup (Name, username, email, password, create_at, role) 
                    VALUES ('$name', '$username', '$email', '$hashedPassword', NOW(), '$role')";

            if ($connection->query($sql) === TRUE) {
                header("Location: Home.php");
                exit();
            } else {
                $errorMessage = "⚠️ Error inserting data: " . $connection->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="CSS/Register.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="Images/pint-logo.png" alt="PINT Festival Logo">
        <p class="festival-name">PINT FESTIVAL</p>
    </div>
</header>

<div class="register-form">
    <h2>Sing Up</h2>

    <?php if (!empty($errorMessage)): ?>
        <p class="error-message" style="color: red; background: #ffdddd; padding: 10px; border-radius: 5px;">
            <?php echo $errorMessage; ?>
        </p>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <p class="success-message" style="color: green; background: #ddffdd; padding: 10px; border-radius: 5px;">
            <?php echo $successMessage; ?>
        </p>
    <?php endif; ?>

    <form id="registerForm" method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
        <input type="email" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
