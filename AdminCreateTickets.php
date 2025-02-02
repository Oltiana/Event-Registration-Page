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
    $ticketType = mysqli_real_escape_string($connection, $_POST['ticket_type']);
    $price = mysqli_real_escape_string($connection, $_POST['Price']);
    $quantity = mysqli_real_escape_string($connection, $_POST['Quantity']);

    if (empty($ticketType) || empty($price) || empty($quantity)) {
        $errorMessage = "All fields are required!";
    } elseif (!is_numeric($price) || !is_numeric($quantity) || $price <= 0 || $quantity <= 0) {
        $errorMessage = "Price and Quantity must be positive numbers!";
    } else {
        $sql = "INSERT INTO tickets (ticket_type, Price, Quantity) VALUES ('$ticketType', '$price', '$quantity')";
        if ($connection->query($sql) === TRUE) {
            header("Location: ShowTickets.php");
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
    <link rel="stylesheet" href="CSS/AdminCreateTickets.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tickets - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateTickets.php" class="active">Create Tickets</a></li>
            <li><a href="ShowTickets.php">Show Tickets</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create Tickets</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <input type="text" name="ticket_type" placeholder="Ticket Type" required>
                <input type="text" name="Price" placeholder="Price" required>
                <input type="text" name="Quantity" placeholder="Quantity" required>
                <button type="submit">Create Ticket</button>
            </form>
        </div>
    </div>
</body>
</html>
