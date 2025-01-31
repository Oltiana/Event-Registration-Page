<?php
session_start();
$serverName = "localhost";
$dbUser = "root";
$password = "";
$dbName = "projekt";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($serverName, $dbUser, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$user_id = 1; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    $title = $_POST['title'];
    $price = (float)$_POST['price'];
    $image = $_POST['image'];
    $quantity = 1;

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] === $product_id) {
            $item['quantity'] += 1; 
            $found = true;

            $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("iii", $item['quantity'], $user_id, $product_id);
            $stmt->execute();
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'title' => $title,
            'price' => $price,
            'image' => $image,
            'quantity' => $quantity
        ];

        $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, added_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt->execute();
    }

    header('Location: view-cart.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove'])) {
    $index = (int)$_POST['index'];
    $product_id = $_SESSION['cart'][$index]['product_id'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); 

    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();

    header('Location: view-cart.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $index = (int)$_POST['index'];
    $quantity = max(1, (int)$_POST['quantity']);
    $product_id = $_SESSION['cart'][$index]['product_id'];
    $_SESSION['cart'][$index]['quantity'] = $quantity;

    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("iii", $quantity, $user_id, $product_id);
    $stmt->execute();

    header('Location: view-cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket - PINT Festival</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/view-cart.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Basket</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $index => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><img src="images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 80px;"></td>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td>
                                <form method="post" class="d-flex">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control w-50 me-2">
                                    <button type="submit" name="update_quantity" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>€<?php echo number_format($item['price'], 2); ?></td>
                            <td>€<?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <button type="submit" name="remove" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3 class="text-end">Total: €<?php echo number_format($total, 2); ?></h3>
            <div class="text-end">
                <a href="merchandise.php" class="btn btn-secondary">Continue Shopping</a>
                <button class="btn btn-success">Buy Now</button>
            </div>
        <?php else: ?>
            <p class="text-center">The cart is empty.</p>
            <div class="text-center">
                <a href="merchandise.php" class="btn btn-primary">Go back to Products</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
