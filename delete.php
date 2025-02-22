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

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == 'lineup') {
        $sql = "DELETE FROM line_up WHERE ID = ?";
    }
    elseif ($type == 'ticket') {
        $sql = "DELETE FROM tickets WHERE id = ?";
    }
    elseif ($type == 'merchandise') {
        $sql = "DELETE FROM merchandise WHERE ID = ?";
    }
    elseif ($type == 'aboutus') {
        $sql = "DELETE FROM aboutus WHERE ID = ?";
    }
    elseif ($type == 'news') {
        $sql = "DELETE FROM news WHERE id = ?";
    }
    else {
        die("Invalid type");
    }

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    
        if ($type == 'lineup') {
            header("Location: ShowLineup.php");
        } elseif ($type == 'ticket') {
            header("Location: ShowTickets.php");
        } elseif ($type == 'news') {
            header("Location: ShowNews.php");
        } elseif ($type == 'merchandise') {
            header("Location: ShowMerchandise.php");
        } elseif ($type == 'aboutus') {
            header("Location: ShowAboutUs.php");
        }
        
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
