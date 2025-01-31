<?php
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt"; // Këtu vendos emrin e databazës

// Krijo lidhjen me databazën
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

// Kontrollo lidhjen
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Merr të dhënat nga formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $confirm_email = mysqli_real_escape_string($connection, $_POST['confirm-email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $city = mysqli_real_escape_string($connection, $_POST['city']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);

    // Kontrollo nëse email-et janë të njëjta
    if ($email !== $confirm_email) {
        echo "Emails do not match!";
        exit();
    }

    // Fut të dhënat në databazë
    $sql = "INSERT INTO payinfo (first_name, last_name, email, phone, address, city, country, payment_status) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$country', 'pending')";

    if ($connection->query($sql) === TRUE) {
        echo "Payment information saved successfully!";
        // Mund të ridrejtohesh në një faqe tjetër (p.sh. falenderimi)
         header("Location: Your_Purchase.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Mbyll lidhjen me databazën
$connection->close();
?>
