<?php
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

$connection = new mysqli($serverName, $dbUser, $password, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sqlTickets = "SELECT * FROM buyTickets ORDER BY created_at DESC";
$resultTickets = $connection->query($sqlTickets);

$sql = "SELECT * FROM payinfo ORDER BY created_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Information</title>
    <link rel="stylesheet" href="CSS/showTransactions.css">

</head>
<body>

<div class="section">
        <h2>Lista e Biletave të Blera</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Zone</th>
                <th>Numbers of Tickets</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $resultTickets->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['zone']; ?></td>
                    <td><?php echo $row['ticket_count']; ?></td>
                    <td><?php echo number_format($row['total_price'], 2); ?> EUR</td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <h2>Payment Transactions</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Country ID</th>
            <th>Payment status</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['city']; ?></td>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo ucfirst($row['payment_status']); ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $connection->close(); ?>
