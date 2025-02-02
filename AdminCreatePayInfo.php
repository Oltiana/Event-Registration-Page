<?php
session_start();


$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = mysqli_real_escape_string($connection, $_POST['full_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $amount = mysqli_real_escape_string($connection, $_POST['amount']);
    $paymentMethod = mysqli_real_escape_string($connection, $_POST['payment_method']);
    $transactionId = mysqli_real_escape_string($connection, $_POST['transaction_id']);

    if (empty($fullName) || empty($email) || empty($phone) || empty($amount) || empty($paymentMethod) || empty($transactionId)) {
        $errorMessage = "All fields are required!";
    } elseif (!is_numeric($amount) || $amount <= 0) {
        $errorMessage = "Amount must be a positive number!";
    } else {
        $sql = "INSERT INTO payments (full_name, email, phone, amount, payment_method, transaction_id) 
                VALUES ('$fullName', '$email', '$phone', '$amount', '$paymentMethod', '$transactionId')";

        if ($connection->query($sql) === TRUE) {
            header("Location: ShowPayments.php");
            exit();
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/AdminCreatePayInfo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreatePayInfo.php" class="active">Create Payment</a></li>
            <li><a href="ShowPayments.php">Show Payments</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create Payment</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="amount" placeholder="Amount" required>
                <select name="payment_method" required>
                    <option value="" disabled selected>Select Payment Method</option>
                    <option value="VISA">VISA</option>
                    <option value="Mastercard">Mastercard</option>
                    <option value="PayPal">PayPal</option>
                </select>
                <input type="text" name="transaction_id" placeholder="Transaction ID" required>
                <button type="submit">Create Payment</button>
            </form>
        </div>
    </div>
</body>
</html>
