<?php
include 'db_connect.php';

$message = $error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zone = $_POST['zone'];
    $ticket_count = $_POST['ticket_count'];
    $total_price = $_POST['total_price'];

    $stmt = $conn->prepare("INSERT INTO buyTickets (zone, ticket_count, total_price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $zone, $ticket_count, $total_price);

    if ($stmt->execute()) {
        
        header("Location: checkout.php");
        exit();
    } else {
        echo "Gabim gjatë ruajtjes: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

    
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}


$result = $conn->query("SELECT * FROM buyTickets ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Purchase</title>

</head>
<body>

<div class="container">
    <h1>Ticket Purchase</h1>

    <?php
    if (!empty($message)) {
        echo "<div class='message'>$message</div>";
    }

    if (!empty($error)) {
        echo "<div class='error'>$error</div>";
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Zone</th>
                <th>Ticket Count</th>
                <th>Price per Ticket (EUR)</th>
                <th>Total Price (EUR)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['zone']}</td>
                            <td>{$row['ticket_count']}</td>
                            <td>-</td>
                            <td>{$row['total_price']} EUR</td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
