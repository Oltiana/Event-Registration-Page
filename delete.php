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
    } elseif ($type == 'ticket') {
       
        $sql = "DELETE FROM tickets WHERE id = ?";
    } elseif ($type == 'ticket') {
        
        $sql = "DELETE FROM news WHERE id = ?";
    
        $sql = "DELETE FROM merchandise WHERE id = ?";
    }elseif ($type == 'merchandise') {

    }else {
        die("Invalid type");
    }

   
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Record deleted successfully";
       
        if ($type == 'lineup') {
            header("Location: ShowLineup.php");
        } else {
            header("Location: ShowTickets.php");
        }else {
            header("Location: ShowNews.php");
        }else{
            header("Location: ShowMerchandise.php");
        }
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>