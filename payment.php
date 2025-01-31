<?php
session_start();
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt"; 


$connection = new mysqli($serverName, $dbUser, $password);


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS projekt";
if ($connection->query($sql) === FALSE) {
    die("Error creating database: " . $connection->error);
}


$connection->select_db("projekt");

$sql = "CREATE TABLE IF NOT EXISTS payment_db (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cardNumber VARCHAR(16) NOT NULL,
    month VARCHAR(2) NOT NULL,
    year VARCHAR(4) NOT NULL,
    cardHolder VARCHAR(100) NOT NULL,
    cvv VARCHAR(3) NOT NULL,
    saveAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($connection->query($sql) === FALSE) {
    die("Error creating table: " . $connection->error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $cardNumber = mysqli_real_escape_string($connection, $_POST['cardNumber']);
    $month = mysqli_real_escape_string($connection, $_POST['month']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $cardHolder = mysqli_real_escape_string($connection, $_POST['cardHolder']);
    $cvv = mysqli_real_escape_string($connection, $_POST['cvv']);

    
    $sql = "INSERT INTO payment_db (cardNumber, month, year, cardHolder, cvv) 
            VALUES ('$cardNumber', '$month', '$year', '$cardHolder', '$cvv')";

    if ($connection->query($sql) === TRUE) {
        header("Location: Your_Purchase.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $connection->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/payment.css">
    <title>Payment Form</title>

</head>
<body>
    <div class="container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required maxlength="16">
            </div>

            <div class="card-details">
                <div class="form-group">
                    <label for="month">Month</label>
                    <input type="text" id="month" name="month" required maxlength="2">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" id="year" name="year" required maxlength="4">
                </div>
                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="password" id="cvv" name="cvv" required maxlength="3">
                </div>
            </div>

            <div class="form-group">
                <label for="cardHolder">Card Holder Name</label>
                <input type="text" id="cardHolder" name="cardHolder" required>
            </div>

            <div class="buttons">
                <button type="button" class="btn cancel" onclick="window.location.href='index.php'">Cancel</button>
                <button type="submit" class="btn proceed">Proceed</button>
            </div>
        </form>
    </div>

    <script>
       
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 16);
        });

        document.getElementById('month').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 2);
            if (parseInt(this.value) > 12) this.value = '12';
        });

        document.getElementById('year').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 4);
        });

        document.getElementById('cvv').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').substring(0, 3);
        });

       
        document.querySelector('form').addEventListener('submit', function(e) {
            const cardNumber = document.getElementById('cardNumber').value;
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            const cvv = document.getElementById('cvv').value;

            if (cardNumber.length !== 16) {
                alert('Card number must be 16 digits');
                e.preventDefault();
                return;
            }

            if (month.length !== 2 || month < 1 || month > 12) {
                alert('Invalid month');
                e.preventDefault();
                return;
            }

            if (year.length !== 4) {
                alert('Invalid year');
                e.preventDefault();
                return;
            }

            if (cvv.length !== 3) {
                alert('CVV must be 3 digits');
                e.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>

<?php
$connection->close();
?>