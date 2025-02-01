<?php
$host = "localhost";
$user = "root";  
$password = "";
$database = "projekt"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}
?>
