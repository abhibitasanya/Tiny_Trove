<?php
include 'db.php';
$products = tiny_trove_products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiny Trove - Products</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <a href="home.php">
        <img src="images/tiny-trove-logo.png" height="75px" width="150px" alt="Tiny Trove Logo" class="logo">
    </a>
    <a href="cart.php">🛒 Cart</a>
    <!---<a href="wishlist.php">💟 Wishlist</a>--->
</header>

<main class="products">
    <div class="product-grid">
        <?php foreach ($products as $row): ?>
            <div class="product">
                <img src="<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
                <h3><?= $row['name']; ?></h3>
				<a href="product.php?id=<?= $row['id']; ?>" class="product-view-details">View Details</a>
                <p>₹<?= $row['price']; ?></p>
                
                <button class="add-to-cart-button add-to-cart" data-id="<?= $row['id']; ?>" data-name="<?= htmlspecialchars($row['name']); ?>" data-price="<?= $row['price']; ?>" data-image="<?= $row['image']; ?>">🛒 Add to Cart</button>
                <!---<button onclick="addToWishlist(<?= $row['id']; ?>)">💟 Add to Wishlist</button>--->
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script src="script.js"></script>

</body>
</html>
