<?php
session_start();
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: login.php");
//     exit();
// }

$errorMessage = "";
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";
$connection = new mysqli($serverName, $dbUser, $password, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($connection, $_POST['name']);

    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $fileTmpPath = $_FILES['image_file']['tmp_name'];
        $fileName = basename($_FILES['image_file']['name']);
        $fileSize = $_FILES['image_file']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadDir = "uploads/";

        // Krijo dosjen uploads/ nëse nuk ekziston
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Emër unik për skedarin
        $newFileName = uniqid() . "." . $fileType;
        $destPath = $uploadDir . $newFileName;

        // Kontrolli i formatit dhe madhësisë së skedarit (Max: 5MB)
        if (in_array(strtolower($fileType), $allowedExtensions) && $fileSize < 5 * 1024 * 1024) {
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Ruaj të dhënat në databazë
                $sql = "INSERT INTO line_up (name, image_path) VALUES ('$name', '$destPath')";
                if ($connection->query($sql) === TRUE) {
                    header("Location: ShowLineup.php");
                    exit();
                } else {
                    $errorMessage = "Error: " . $sql . "<br>" . $connection->error;
                }
            } else {
                $errorMessage = "Error uploading file.";
            }
        } else {
            $errorMessage = "Invalid file type or file too large!";
        }
    } else {
        $errorMessage = "Please select an image file!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lineup - Admin</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateLineup.php" class="active">Create Lineup</a></li>
            <li><a href="ShowLineup.php">Show Lineup</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create Lineup</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Name" required>
                <input type="file" name="image_file" required>
                <button type="submit">Create Lineup</button>
            </form>
        </div>
    </div>
</body>
</html>
