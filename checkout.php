<?php
include 'db.php';
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("<h2>Your cart is empty! 🛒</h2><a href='index.php'>← Continue Shopping</a>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['cart'] = [];
    echo "<h2>🎉 Order Placed Successfully! 🎉</h2>";
    echo "<p>Thank you for shopping at Tiny Trove.</p>";
    echo "<a href='index.php'>← Back to Shop</a>";
    exit;
}

$cart_items = [];
$total_price = 0;

foreach ($_SESSION['cart'] as $id => $quantity) {
    $item = tiny_trove_get_product((int) $id);
    if ($item) {
        $item['quantity'] = (int) $quantity;
        $cart_items[] = $item;
        $total_price += $item['price'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <a href="home.php">
        <img src="images/tiny-trove-logo.png" height="75px" width="150px" alt="Tiny Trove Logo" class="logo">
    </a>
    <h1>Checkout</h1>
    <a href="cart.php">← Back to Cart</a>
</header>

<main class="checkout">
    <h2>🛒 Order Summary</h2>
    <ul>
        <?php foreach ($cart_items as $item): ?>
            <li>
                <img src="<?= $item['image']; ?>" width="50">
                <?= $item['name']; ?> - ₹<?= number_format($item['price'], 2); ?> x <?= $item['quantity']; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total: ₹<?= number_format($total_price, 2); ?></strong></p>

    <h2>📋 Billing Details</h2>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Address: <input type="text" name="address" required></label><br>
        <label>Payment Method:
            <select name="payment">
                <option>Cash on Delivery</option>
            </select>
        </label><br>
        <button type="submit" class="checkout-btn">✅ Place Order</button>
    </form>
</main>

</body>
</html><?php
include 'db.php';
session_start();

// Redirect if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("<h2>Your cart is empty! 🛒</h2><a href='index.php'>← Continue Shopping</a>");
}

// Process Order Submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<h2>🎉 Order Placed Successfully! 🎉</h2>";
    echo "<p>Thank you for shopping at Tiny Trove.</p>";
    $_SESSION['cart'] = []; // Clear cart after order is placed
    exit;
}

// Fetch Products from Database
$cart_items = [];
$total_price = 0;

foreach ($_SESSION['cart'] as $id => $quantity) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => (int)$id]);

    if ($item = $stmt->fetch()) {
        $item['quantity'] = $quantity;
        $cart_items[] = $item;
        $total_price += $item['price'] * $quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <a href="home.php">
        <img src="images/tiny-trove-logo.png" height="75px" width="150px" alt="Tiny Trove Logo" class="logo">
    </a>
    <h1>Checkout</h1>
    <a href="cart.php">← Back to Cart</a>
</header>

<main class="checkout">
    <h2>🛒 Order Summary</h2>
    <ul>
        <?php foreach ($cart_items as $item): ?>
            <li>
                <img src="<?= $item['image']; ?>" width="50">
                <?= $item['name']; ?> - ₹<?= number_format($item['price'], 2); ?> x <?= $item['quantity']; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total: ₹<?= number_format($total_price, 2); ?></strong></p>

    <h2>📋 Billing Details</h2>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Address: <input type="text" name="address" required></label><br>
        <label>Payment Method:
            <select name="payment">
                <option>Credit Card</option>
                <option>Debit Card</option>
                <option>Cash on Delivery</option>
            </select>
        </label><br>
        <button type="submit" class="checkout-btn">✅ Place Order</button>
    </form>
</main>

</body>
</html>
