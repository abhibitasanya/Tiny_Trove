<?php
include 'db.php';
session_start();

// Get product details
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = tiny_trove_get_product($id);

if (!$product) {
    die("<h2>Product not found.</h2><a href='index.php'>Back to Shop</a>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?> - Details</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <h1>Product Details</h1>
    <a href="index.php">← Back to Shop</a>
</header>

<main class="product-details">
    <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>" width="300px" 
    onerror="this.onerror=null; this.src='images/default.jpg';">

    <h2><?= $product['name']; ?></h2>
    <p><?= $product['description']; ?></p>
    <p>₹<?= number_format($product['price'], 2); ?></p>

    <button class="add-to-cart" 
    data-id="<?= $product['id']; ?>" 
    data-name="<?= htmlspecialchars($product['name']); ?>" 
    data-price="<?= $product['price']; ?>" 
    data-image="<?= $product['image']; ?>">
    🛒 Add to Cart
</button>
</main>

<script src="script.js"></script>
</body>
</html>