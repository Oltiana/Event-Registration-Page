<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projekt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Gabim me lidhjen e databazës: " . $conn->connect_error);
}
$message = '';
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM faqs WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "FAQ u fshi me sukses!";
    } else {
        $message = "Gabim gjatë fshirjes së FAQ-së!";
    }
}
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        $stmt = $conn->prepare("UPDATE faqs SET question = ?, answer = ? WHERE id = ?");
        $stmt->bind_param("ssi", $question, $answer, $id);
        if ($stmt->execute()) {
            $message = "FAQ u përditësua me sukses!";
        } else {
            $message = "Gabim gjatë përditësimit të FAQ-së!";
        }
    }
}
if (isset($_POST['add'])) {
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        $stmt = $conn->prepare("INSERT INTO faqs (question, answer) VALUES (?, ?)");
        $stmt->bind_param("ss", $question, $answer);
        if ($stmt->execute()) {
            $message = "FAQ e re u shtua me sukses!";
        } else {
            $message = "Gabim gjatë shtimit të FAQ-së!";
        }
    }
}
$sql = "SELECT * FROM faqs";
$result = $conn->query($sql);

$faqs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $faqs[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage FAQs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1>Manage FAQs</h1>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form action="" method="POST" class="mb-5">
            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" id="question" name="question" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="answer" class="form-label">Answer</label>
                <textarea id="answer" name="answer" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add FAQ</button>
        </form>
        <h2>Existing FAQs</h2>
        <div class="accordion" id="faqAccordion">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?= $index + 1 ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index + 1 ?>" aria-expanded="false" aria-controls="collapse<?= $index + 1 ?>">
                            <?= htmlspecialchars($faq['question']) ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $index + 1 ?>" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p><?= htmlspecialchars($faq['answer']) ?></p>
                            <form action="" method="POST" class="mb-3">
                                <input type="hidden" name="id" value="<?= $faq['id'] ?>">
                                <div class="mb-2">
                                    <label for="question" class="form-label">Edit Question</label>
                                    <input type="text" name="question" value="<?= htmlspecialchars($faq['question']) ?>" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label for="answer" class="form-label">Edit Answer</label>
                                    <textarea name="answer" class="form-control" rows="3" required><?= htmlspecialchars($faq['answer']) ?></textarea>
                                </div>
                                <button type="submit" name="update" class="btn btn-success">Update</button>
                                <a href="?delete=<?= $faq['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
