<?php
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

// Krijimi i lidhjes me databazën
$connection = new mysqli($serverName, $dbUser, $password, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM payinfo ORDER BY created_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>ShowPayInfo</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    font-size: 16px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
    background-color: white;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    height: 40px;
    margin-right: 10px;
}

.logo span {
    font-size: 1.5rem;
    font-weight: bold;
    color: black;
}

.nav-links {
    list-style: none;
    display: flex;
}

.nav-links li {
    margin-inline: 62px;
}

.nav-links a {
    text-decoration: none;
    color: black;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.nav-links a.active {
    color: red;
    font-weight: bold;
}

.nav-links a:hover {
    color: red;
    font-weight: bold;
}

h2 {
    text-align: center;
    font-size: 2rem;
    margin-top: 20px;
    color: #333;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    border: 1px solid #ddd;
    padding: 12px 20px;
    text-align: left;
    font-size: 1rem;
}

th {
    background-color: #f4f4f4;
    color: #333;
    font-weight: bold;
}

td {
    background-color: #fff;
    color: #666;
}

tr:hover {
    background-color: #f9f9f9;
}

footer {
    background-color: #333;
    color: white;
    padding: 20px 40px;
    font-size: 14px;
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.footer-section.left ul {
    list-style: none;
    padding: 0;
}

.footer-section.left ul li {
    margin-bottom: 10px;
}

.social-icons a {
    margin: 0 10px;
    text-decoration: none;
    color: white;
}

.social-icons a:hover {
    transform: scale(1.1);
}

.footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #555;
    padding-top: 10px;
    margin-top: 20px;
}

    </style>
</head>
<body>
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
