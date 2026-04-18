<?php
include 'db.php';
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = (int) $_POST['id'];
    $quantity = max(1, (int) $_POST['quantity']);
    $_SESSION['cart'][$id] = $quantity;

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        http_response_code(200);
        exit('ok');
    }
}

$cart_items = [];
foreach ($_SESSION['cart'] as $id => $quantity) {
    $product = tiny_trove_get_product((int) $id);
    if ($product) {
        $product['quantity'] = (int) $quantity;
        $cart_items[] = $product;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <a href="home.php">
        <img src="images/tiny-trove-logo.png" height="75px" width="150px" alt="Tiny Trove Logo" class="logo">
    </a>
    <h1>Your Cart</h1>
    <a href="index.php">← Continue Shopping</a>
</header>

<main class="cart">
    <ul>
        <?php foreach ($cart_items as $item): ?>
            <li>
                <?= $item['name']; ?> - ₹<?= $item['price']; ?> x <?= $item['quantity']; ?>
                <form method="post" action="cart.php">
                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                    <input type="number" name="quantity" value="<?= $item['quantity']; ?>" min="1">
                    <button type="submit">Update</button>
                </form>
                <a href="remove.php?id=<?= $item['id']; ?>&type=cart">❌ Remove</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="cart-total">
        <p>Total: ₹<?= array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart_items)); ?></p>
        <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
    </div>
</main>

</body>
</html>
