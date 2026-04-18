<?php
include 'db.php';
session_start();

// Check if wishlist exists in the session, if not create one.
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Add item to wishlist
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    if (!in_array($id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $id;
    }
}

// Fetch wishlist items
$wishlist_items = [];
foreach ($_SESSION['wishlist'] as $id) {
    $product = tiny_trove_get_product((int) $id);
    if ($product) {
        $wishlist_items[] = $product;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>

<header>
    <h1>Your Wishlist</h1>
    <a href="index.php">← Back to Shop</a>
</header>

<main>
    <div id="wishlist-items">
        <?php foreach ($wishlist_items as $item): ?>
            <div class="wishlist-item">
                <img src="<?= $item['image']; ?>" alt="<?= $item['name']; ?>">
                <h3><?= $item['name']; ?></h3>
                <p>₹<?= $item['price']; ?></p>
                <a href="remove.php?id=<?= $item['id']; ?>&type=wishlist">❌ Remove</a>
            </div>
        <?php endforeach; ?>
    </div>
    <button onclick="clearWishlist()">🗑 Clear Wishlist</button>
</main>

<script>
    function clearWishlist() {
        window.location.href = 'clear_wishlist.php';  // Create this file to clear the wishlist session
    }
</script>

</body>
</html>
