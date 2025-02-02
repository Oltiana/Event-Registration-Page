<?php
session_start();
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// ... existing code ...

// Kontrollo nëse ID dhe type janë dërguar në URL
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];

    // Query për të marrë të dhënat nga tabela e duhur
    switch($type) {
        case "ticket":
            $sql = "SELECT * FROM tickets WHERE id = ?";
            break;
        case "lineup":
            $sql = "SELECT * FROM line_up WHERE id = ?";
            break;
        case "aboutus":
            $sql = "SELECT * FROM aboutus WHERE id = ?";
            break;
        case "news":
            $sql = "SELECT * FROM news WHERE id = ?";
            break;
        case "merchandise":
            $sql = "SELECT * FROM merchandise WHERE id = ?";
            break;
        case "faq":
            $sql = "SELECT * FROM faq WHERE id = ?";
            break;
        default:
            die("Invalid type specified.");
    }

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($type === "ticket") {
        $ticket_type = $_POST['ticket_type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $updateSql = "UPDATE tickets SET ticket_type='$ticket_type', Price='$price', Quantity='$quantity' WHERE id=$id";
    } elseif ($type === "lineup") {
        $name = $_POST['name'];
        $image_path = $_POST['image_path'];

        $updateSql = "UPDATE line_up SET name='$name', image_path='$image_path' WHERE id=$id";
    } elseif ($type === "aboutus") {
        $image_path = $_POST['image'];

        $updateSql = "UPDATE aboutus SET image='$image_path' WHERE id=$id";
    } elseif ($type === "news") {
        $title = $_POST['title'];
        $created_at = $_POST['created_at'];

        $updateSql = "UPDATE news SET title='$title', created_at='$created_at' WHERE id=$id";
    } elseif ($type === "merchandise") {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $updateSql = "UPDATE merchandise SET title='$title', category='$category', price='$price', description='$description', image='$image' WHERE id=$id";
    } elseif ($type === "faq") {
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $updateSql = "UPDATE faq SET question='$question', answer='$answer' WHERE id=$id";
    }

    if ($connection->query($updateSql) === TRUE) {
        echo "<p style='color: green;'>Updated successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error updating: " . $connection->error . "</p>";
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/edit.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <h2>Edit <?php echo htmlspecialchars(ucfirst($type)); ?></h2>
    <form method="POST">
        <?php 
        if (!isset($item)) {
            echo "<p>No item found!</p>";
            exit;
        }
        if ($type === "ticket"): ?>
            <label>Ticket Type:</label>
            <input type="text" name="ticket_type" value="<?php echo htmlspecialchars($item['ticket_type']); ?>" required>

            <label>Price (€):</label>
            <input type="number" name="price" value="<?php echo htmlspecialchars($item['Price']); ?>" required>

            <label>Quantity:</label>
            <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['Quantity']); ?>" required>

        <?php elseif ($type === "lineup"): ?>
            <label>Artist Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>

            <label>Image Path:</label>
            <input type="text" name="image_path" value="<?php echo htmlspecialchars($item['image_path']); ?>" required>

        <?php elseif ($type === "aboutus"): ?>
            <label>Image Path:</label>
            <input type="text" name="image" value="<?php echo htmlspecialchars($item['image']); ?>" required>

            <label>Description:</label>
            <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>

        <?php elseif ($type === "news"): ?>
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required>

            <label>Created At (Date and Time):</label>
            <input type="datetime-local" name="created_at" value="<?php echo htmlspecialchars($item['created_at']); ?>" required>

        <?php elseif ($type === "merchandise"): ?>
            <label>Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($item['title']); ?>" required>

    <label>Category:</label>
    <input type="text" name="category" value="<?php echo htmlspecialchars($item['category']); ?>" required>

    <label>Price (€):</label>
    <input type="number" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>

    <label>Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>

    <label>Image Path:</label>
    <input type="text" name="image" value="<?php echo htmlspecialchars($item['image']); ?>" required>

        <?php elseif ($type === "faq"): ?>
            <label>Question:</label>
            <input type="text" name="question" value="<?php echo htmlspecialchars($item['question']); ?>" required>

            <label>Answer:</label>
            <textarea name="answer" required><?php echo htmlspecialchars($item['answer']); ?></textarea>

        <?php endif; ?>

        <button type="submit">Update</button>
    </form>
    
    <a href="<?php 
        echo ($type === 'ticket') ? 'ShowTickets.php' : 
             (($type === 'lineup') ? 'ShowLineup.php' : 
             (($type === 'aboutus') ? 'ShowAboutUs.php' : 
             (($type === 'news') ? 'ShowNews.php' : 
             (($type === 'merchandise') ? 'ShowMerchandise.php' : 'ShowFAQ.php')))); 
    ?>">Back</a>
</body>
</html>