<?php
session_start();

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
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $description = mysqli_real_escape_string($connection, $description);

    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $fileTmpPath = $_FILES['image_file']['tmp_name'];
        $fileName = basename($_FILES['image_file']['name']);
        $fileSize = $_FILES['image_file']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadDir = "uploads/";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (in_array(strtolower($fileType), $allowedExtensions) && $fileSize < 5 * 1024 * 1024) {
            $newFileName = uniqid() . "." . $fileType;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $sql = "INSERT INTO aboutus (image, description) VALUES ('$destPath', '$description')";
                if ($connection->query($sql) === TRUE) {
                    header("Location: ShowAboutUs.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Create About Us - Admin</title>
    <style>
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        .image-container img {
            width: 100%;
            max-width: 300px;
            height: auto;
            object-fit: contain;
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/pintlogo.webp" alt="Pint Festival">
            <span>PINT FESTIVAL</span>
        </div>
        <ul class="nav-links">
            <li><a href="AdminCreateAboutUs.php" class="active">Create About Us</a></li>
            <li><a href="ShowAboutUs.php">Show About Us</a></li>
        </ul>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Create About Us</h2>
            <?php if (!empty($errorMessage)): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($errorMessage); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="file" name="image_file" required>
                <textarea name="description" placeholder="Enter description..." required></textarea>
                <button type="submit">Add Image & Description</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($destPath) && file_exists($destPath)) {
        echo "<div class='image-container'><img src='$destPath' alt='Uploaded Image'></div>";
    }
    ?>
</body>
</html>
