<?php
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt"; 


$connection = new mysqli($serverName, $dbUser, $password, $dbName);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $confirm_email = mysqli_real_escape_string($connection, $_POST['confirm-email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);

    
    if ($email !== $confirm_email) {
        echo "Emails do not match!";
        exit();
    }
    $sql = "INSERT INTO payinfo (first_name, last_name, email, phone, address, city, country, payment_status) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$country', 'pending')";

    if ($connection->query($sql) === TRUE) {
        echo "Payment information saved successfully!";

         header("Location: payment.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
